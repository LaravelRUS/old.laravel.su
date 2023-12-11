import {Controller} from '@hotwired/stimulus';
import Prism        from "prismjs";

export default class extends Controller {
    /**
     *
     */
    connect() {
        Prism.manual = true;

        [...this.element.querySelectorAll('pre code')].forEach((el) => {
            if (el.getAttribute('class') === null) {
                el.setAttribute('class', 'language-php');
            }

            Prism.highlightElement(el);
        });
    }
}
