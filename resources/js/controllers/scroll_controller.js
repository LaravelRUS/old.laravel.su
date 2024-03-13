import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    /**
     *
     */
    connect() {
        this.element.addEventListener('click', (event) => {
            let element = document.querySelector(this.element.dataset.to);

            event.preventDefault();

            if (element !== null) {
                element.scrollIntoView({
                    behavior: 'smooth',
                });
            } else {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth',
                });
            }

            return false;
        });
    }
}
