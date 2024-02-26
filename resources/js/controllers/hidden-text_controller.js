import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        let spoiler = this.element;

        spoiler.addEventListener('click', () => {
            spoiler.classList.remove('hidden-text');
            this.disconnect();
        });
    }
}
