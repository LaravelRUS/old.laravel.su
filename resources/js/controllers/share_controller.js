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

        navigator
            .share({
                title: this.TitleValue,
                url: this.UrlValue,
            })
            .then(() => {
                console.log('Thanks for sharing!');
            })
            .catch(()=>{
                navigator.clipboard.writeText(this.UrlValue);
                console.error('Error sharing!');
            });

        return false;
    }
}
