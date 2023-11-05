import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    /**
     *
     */
    connect() {
        this.observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        Turbo.renderStreamMessage(event.data);
                    }
                });
            },
            {
                root: null,
            }
        );

        this.observer.observe(this.element);
    }

    disconnect() {
        this.observer.disconnect();
    }
}
