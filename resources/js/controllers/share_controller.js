import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        title: {
            type: String,
            default: document.title,
        },
        url: {
            type: String,
            default: window.location.origin,
        },
    };

    /**
     *
     * @param event
     * @returns {boolean}
     */
    dialog(event) {
        event.preventDefault();

        try {
            navigator
                .share({
                    title: this.titleValue,
                    url: this.urlValue,
                })
                .then(() => {
                    console.log('Thanks for sharing!');
                })
                .catch(() => {
                    navigator.clipboard.writeText(this.urlValue);
                    console.error('Error sharing!');
                });
        } catch (e) {
            console.error('Error sharing!');
            console.warn(e);
            navigator.clipboard.writeText(this.urlValue);
        }

        return false;
    }
}
