import { Controller } from '@hotwired/stimulus';
import { Tooltip } from 'bootstrap';

export default class extends Controller {
    static values = {
        title: {
            type: String,
            default: '',
        },
    };

    /**
     *
     */
    connect() {
        this.tooltip = Tooltip.getOrCreateInstance(this.element, {
            html: true,
            delay: {
                show: 500,
                hide: 100,
            },
            title:
                this.titleValue ||
                this.element.getAttribute('title') ||
                this.element.getAttribute('data-bs-original-title'),
        });
    }

    /**
     *
     */
    disconnect() {
        this.tooltip.dispose();
    }
}
