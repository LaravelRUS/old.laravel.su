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
const application = (window.application = Application.start());

import ThemeController from "./controllers/theme_controller";
application.register("theme", ThemeController);

import LoadMoreController from "./controllers/load-more_controller";
application.register("load-more", LoadMoreController);


Prism.manual = true;

document.addEventListener("turbo:load", () => {
    [...document.querySelectorAll('pre code')].forEach(el => {
        Prism.highlightElement(el);
    });
});
