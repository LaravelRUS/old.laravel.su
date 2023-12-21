import * as Turbo            from '@hotwired/turbo';
import {Application}         from '@hotwired/stimulus';
import Prism                 from 'prismjs';
import {registerControllers} from 'stimulus-vite-helpers';
import TextareaAutogrow      from 'stimulus-textarea-autogrow'
import 'bootstrap';

window.Turbo = Turbo;

const application = (window.application = Application.start());


/**
const viewTransitionsHandler = (event) => {
    if (document.startViewTransition) {
        event.preventDefault();

        document.startViewTransition(() => {
            event.detail.resume();
        });
    }
};

document.addEventListener("turbo:before-render", viewTransitionsHandler);
document.addEventListener('turbo:before-frame-render', viewTransitionsHandler)
*/


const controllers = import.meta.globEager('./**/*_controller.js')
registerControllers(application, controllers)
application.register('textarea-autogrow', TextareaAutogrow)

Prism.manual = true;

document.addEventListener('turbo:load', () => {
    [...document.querySelectorAll('pre code')].forEach((el) => {
        if (el.getAttribute('class') === null) {
            el.setAttribute('class', 'language-php');
        }

        Prism.highlightElement(el);
    });
});

document.addEventListener('turbo:frame-load', () => {
    [...document.querySelectorAll('pre code')].forEach((el) => {
        if (el.getAttribute('class') === null) {
            el.setAttribute('class', 'language-php');
        }

        Prism.highlightElement(el);
    });
});

