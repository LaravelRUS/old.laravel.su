import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    /**
     *
     */
    connect() {
        this.element.addEventListener('click', (event) => {
            let element =
                document.querySelector(this.element.dataset.to) || document.body.getElementsByTagName('header')[0];

            event.preventDefault();

            element.scrollIntoView({
                behavior: 'smooth',
            });

            return false;
        });
    }
}
