import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['textarea', 'button'];

    connect() {
        this.toggleSubmitButton();
    }

    toggleSubmitButton() {
        const isTextareaEmpty = this.textareaTarget.value.length !== 0;

        this.buttonTarget.disabled = !isTextareaEmpty;
        this.buttonTarget.classList.toggle('show', isTextareaEmpty);
    }

    send() {
        this.element.querySelector('button[type="submit"]').click();
    }
}
