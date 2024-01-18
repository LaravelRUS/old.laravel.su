// Initialize the service worker
//import { isMobileApp } from '../helpers/platform';

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/serviceworker.js').then(
        (registration) => {
            window.LaravelServiceWorker = registration;
            console.log('Laravel.su: ServiceWorker registration successful with scope: ', registration.scope);
        },
        (err) => console.log('Laravel.su: ServiceWorker registration failed: ', err)
    );

    navigator.serviceWorker.getRegistrations().then((registrations) => {
        for (let registration of registrations) {
            registration.update();
        }
    });
}
