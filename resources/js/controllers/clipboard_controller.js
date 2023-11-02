import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = [ "source" ]

    static classes = [ "done" ]

    copy(event) {
        event.preventDefault()
        navigator.clipboard.writeText(this.sourceTarget.innerText)


        this.element.classList.add(this.doneClass);

        setTimeout( () => {
            this.element.classList.remove(this.doneClass);
        }, 840)
    }
}
