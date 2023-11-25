import { Controller } from '@hotwired/stimulus';
import { Tooltip } from 'bootstrap';

export default class extends Controller {

    static values = {
        title: {
            type: String,
            default: this.elemet.getAttribute("title"),
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
            title: this.titleValue,
        });
    }

    /**
     *
     */
    disconnect() {
        this.tooltip.dispose();
    }
}
