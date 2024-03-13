import { Controller } from '@hotwired/stimulus';
import { copyText } from '../helpers/clipboard.js';
export default class extends Controller {
    static targets = ['source'];

    static classes = ['done'];

    copy(event) {
        event.preventDefault();
        copyText(this.sourceTarget.innerText);

        this.element.classList.add(this.doneClass);

        setTimeout(() => {
            this.element.classList.remove(this.doneClass);
        }, 840);
    }
}
