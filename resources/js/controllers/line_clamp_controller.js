import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['content'];

    connect() {
        this.applyLineClamp();
        window.addEventListener('resize', this.applyLineClamp.bind(this));
    }

    disconnect() {
        window.removeEventListener('resize', this.applyLineClamp.bind(this));
    }

    /**
     *
     */
    applyLineClamp() {
        const contentEl = this.hasContentTarget ? this.contentTarget : this.element;


        while (contentEl.scrollHeight > contentEl.offsetHeight && contentEl.childElementCount > 3) {
            if (contentEl.lastElementChild.length > 3) {
                contentEl.lastElementChild.textContent = contentEl.lastElementChild.textContent.replace(/\W*\s(\S)*$/, '...');
            } else {
                contentEl.lastElementChild.remove();
            }
        }
    }
}
