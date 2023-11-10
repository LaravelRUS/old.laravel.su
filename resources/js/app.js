import * as Turbo from '@hotwired/turbo';
import { Application } from '@hotwired/stimulus';
import Prism from 'prismjs';
import 'prismjs/components/prism-php';

import 'bootstrap';

window.Turbo = Turbo;

document.addEventListener('turbo:before-frame-render', (event) => {
    if (document.startViewTransition) {
        event.preventDefault();

        document.startViewTransition(() => {
            event.detail.resume();
        });
    }
});

const application = (window.application = Application.start());

import ThemeController from './controllers/theme_controller';
import ViewportEntranceToggleController from './controllers/viewport-entrance-toggle_controller.js';
import ScrollController from './controllers/scroll_controller.js';
import FormLoadController from './controllers/form-load_controller';
import Clipboard from './controllers/clipboard_controller';

application.register('theme', ThemeController);
application.register('viewport-entrance-toggle', ViewportEntranceToggleController);
application.register('scroll', ScrollController);
application.register('form-load', FormLoadController);
application.register('clipboard', Clipboard);

import LoadMoreController from './controllers/load-more_controller';
application.register('load-more', LoadMoreController);

Prism.manual = true;

document.addEventListener('turbo:load', () => {
    [...document.querySelectorAll('pre code')].forEach((el) => {
        if (el.getAttribute('class') === null) {
            el.setAttribute('class', 'language-php');
        }

        Prism.highlightElement(el);
    });
});








window.highlightSupportPolicyTable = () => {

    function highlightCells(table) {
        const currentDate = new Date().valueOf();

        Array.from(table.rows).forEach((row, rowIndex) => {
            if (rowIndex > 0) {
                const cells = row.cells;
                const versionCell = cells[0];
                const bugDateCell = getCellDate(cells[cells.length - 2]);
                const securityDateCell = getCellDate(cells[cells.length - 1]);

                if (currentDate > securityDateCell) {
                    // End of life.
                    versionCell.classList.add('bg-danger', 'support-policy-highlight');
                } else if ((currentDate <= securityDateCell) && (currentDate > bugDateCell)) {
                    // Security fixes only.
                    versionCell.classList.add('bg-warning', 'support-policy-highlight');
                }
            }
        });
    }

    const table = document.querySelector('.documentations #support-policy ~ div table:first-of-type');

    if (table) {
        highlightCells(table);

        return;
    }

    // <=v9 documentation branches use the old dom structure which doesn't contain the table overflow fix. It's easier to maintain backwards compatibility than to go back and change all the <=v9 branches.
    const oldTable = document.querySelector('.documentations #support-policy table') || document.querySelector('.documentations table:first-of-type');

    if (oldTable) {
        highlightCells(oldTable);
    }

}

function getCellDate(cell) {
    return Date.parse(cell.innerHTML.replace(/(\d+)(st|nd|rd|th)/, '$1'));
}

document.addEventListener('turbo:load', () => {
    window.highlightSupportPolicyTable();
})
