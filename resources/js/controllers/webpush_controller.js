import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        key: {
            type: String,
            default: import.meta.env.VITE_VAPID_PUBLIC_KEY,
        },
        errorSupported: {
            type: String,
            default: 'Push messaging is not supported',
        },
        errorPermission: {
            type: String,
            default: 'Permission denied',
        },
    };

    static targets = ['status'];

    connect() {
        this.checkSubscription();
    }

    switching() {
        if (this.statusTarget.checked) {
            this.request();
        } else {
            this.disablePushNotifications();
        }
    }

    checkSubscription() {
        let switcher = this.statusTarget;
        navigator.serviceWorker.ready.then((registration) => {
            registration.pushManager.getSubscription().then((subscription) => {
                if (!subscription) {
                    switcher.checked = false;
                    return;
                }

                fetch('/push/check', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                    },
                    body: JSON.stringify({
                        endpoint: subscription.endpoint,
                    }),
                })
                    .then((response) => response.json())
                    .then((data) => {
                        switcher.checked = data.exists;
                    })
                    .catch((error) => {
                        switcher.checked = false;
                    });
            });
        });
    }

    // Entry point for push subscription
    request(showAlertPermission = true) {
        // Check if the service worker is ready
        navigator.serviceWorker.ready
            .then((register) => {
                // Check if push messaging is supported and enabled
                if (!register.pushManager) {
                    alert(this.errorSupportedValue);
                    return;
                }

                register.pushManager.getSubscription().then((subscription) => {
                    // If a subscription exists, store it in the backend
                    if (subscription) {
                        this.storePushSubscription(subscription);
                        return;
                    }

                    // Request permission to show notifications
                    Notification.requestPermission().then((permissionResult) => {
                        if (permissionResult !== 'granted') {
                            if (showAlertPermission) {
                                alert(this.errorPermissionValue);
                            }

                            return;
                        }

                        // Subscribe the user
                        this.subscribeUser(register);
                    });
                });
            })
            .catch((error) => {
                alert(this.errorSupportedValue);
                console.log('Error registering service worker:', error);
            });
    }

    // Request permission to show notifications
    requestPermission() {
        return new Promise((resolve) => {
            const permissionResult = Notification.requestPermission((result) => {
                resolve(result);
            });

            if (permissionResult) {
                permissionResult.then(resolve);
            }
        });
    }

    // Subscribe the user
    subscribeUser(register) {
        const options = {
            userVisibleOnly: true,
            applicationServerKey: this.urlBase64ToUint8Array(this.keyValue),
        };

        register.pushManager
            .subscribe(options)
            .then((subscription) => {
                this.storePushSubscription(subscription);
            })
            .catch((error) => {
                console.log('Error subscribing to push notifications:', error);
            });
    }

    // Convert a base64 string to a Uint8Array
    urlBase64ToUint8Array(base64String) {
        const padding = '='.repeat((4 - (base64String.length % 4)) % 4);
        const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');

        const rawData = window.atob(base64);
        const outputArray = new Uint8Array(rawData.length);

        for (let i = 0; i < rawData.length; ++i) {
            outputArray[i] = rawData.charCodeAt(i);
        }

        return outputArray;
    }

    // Subscribe the user
    disablePushNotifications() {
        navigator.serviceWorker.ready.then((registration) => {
            registration.pushManager.getSubscription().then((subscription) => {
                if (!subscription) {
                    return;
                }

                subscription.unsubscribe().then(() => {
                    fetch('/push/unsubscribe', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                        },
                        body: JSON.stringify({
                            endpoint: subscription.endpoint,
                        }),
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            console.log('Success:', data);
                        })
                        .catch((error) => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    }

    // Store the push subscription in the backend
    storePushSubscription(subscription) {
        fetch('/push', {
            method: 'POST',
            body: JSON.stringify(subscription),
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-Token': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
            },
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Failed to store push subscription');
                }
            })
            .catch((error) => {
                console.log('Error storing push subscription:', error);
            });
    }
}
