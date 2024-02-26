import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        url: String,
        refreshInterval: Number,
    };

    connect() {
        this.load();

        if (this.hasRefreshIntervalValue) {
            this.startRefreshing();
        }
    }

    disconnect() {
        this.stopRefreshing();
    }

    load() {
        fetch(this.urlValue, {
            redirect: 'error',
            headers: {
                'Turbo-Frame': this.element.id,
            },
        })
            .then((response) => (response.ok && response.status === 200 ? response.text() : null))
            .then((html) => {
                if (this.element.innerHTML !== html && html !== null) {
                    this.element.innerHTML = html;
                    this.element.classList.add('fade-in');
                }
            });
    }

    startRefreshing() {
        this.refreshTimer = setInterval(() => {
            this.load();
        }, this.refreshIntervalValue);
    }

    stopRefreshing() {
        if (this.refreshTimer) {
            clearInterval(this.refreshTimer);
        }
    }
}
