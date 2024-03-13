import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        url: {
            type: String,
            default: '/',
        },
    };

    back() {
        if (history.length > 2) {
            // if history is not empty, go back:
            history.back();
        } else {
            // go to specified fallback url:
            Turbo.visit(this.urlValue);
        }
    }
}
