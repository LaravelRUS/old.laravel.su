import * as Turbo from '@hotwired/turbo';
import { Application } from '@hotwired/stimulus';
import Prism from 'prismjs';

/*
import 'prismjs/components/prism-php';
import 'prismjs/components/prism-bash';
import 'prismjs/components/prism-haml';
*/

import 'bootstrap';

window.Turbo = Turbo;

document.addEventListener('turbo:before-frame-render', (event) => {
    if (document.startViewTransition) {
        event.preventDefault()

        document.startViewTransition(() => {
            event.detail.resume()
        })
    }
})


const application = (window.application = Application.start());

import ThemeController from "./controllers/theme_controller";
import ViewportEntranceToggleController from "./controllers/viewport-entrance-toggle_controller.js";
import ScrollController from "./controllers/scroll_controller.js";
import FormLoadController from "./controllers/form-load_controller";
import Clipboard from "./controllers/clipboard_controller";


application.register("theme", ThemeController);
application.register("viewport-entrance-toggle", ViewportEntranceToggleController)
application.register("scroll", ScrollController)
application.register("form-load", FormLoadController);
application.register("clipboard", Clipboard);

import LoadMoreController from "./controllers/load-more_controller";
application.register("load-more", LoadMoreController);


Prism.manual = true;

document.addEventListener("turbo:load", () => {
    [...document.querySelectorAll('pre code')].forEach(el => {
        Prism.highlightElement(el);
    });
});
