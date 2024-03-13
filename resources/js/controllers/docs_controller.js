import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    /**
     * Port for laravel.com
     */
    connect() {
        this.highlightSupportPolicyTable();
    }

    highlightSupportPolicyTable() {
        let highlightCells = (table) => {
            const currentDate = new Date().valueOf();

            Array.from(table.rows).forEach((row, rowIndex) => {
                if (rowIndex > 0) {
                    const cells = row.cells;
                    const versionCell = cells[0];
                    const bugDateCell = this.getCellDate(cells[cells.length - 2]);
                    const securityDateCell = this.getCellDate(cells[cells.length - 1]);

                    if (currentDate > securityDateCell) {
                        // End of life.
                        versionCell.classList.add('bg-danger', 'support-policy-highlight', 'bg-opacity-50');
                    } else if (currentDate <= securityDateCell && currentDate > bugDateCell) {
                        // Security fixes only.
                        versionCell.classList.add('bg-warning', 'support-policy-highlight', 'bg-opacity-50');
                    }
                }
            });
        };

        const table = document.querySelector('.documentations #support-policy ~ div table:first-of-type');

        if (table) {
            highlightCells(table);

            return;
        }

        // <=v9 documentation branches use the old dom structure which doesn't contain the table overflow fix.
        // It's easier to maintain backwards compatibility than to go back and change all the <=v9 branches.
        const oldTable =
            document.querySelector('.documentations #support-policy table') ||
            document.querySelector('.documentations table:first-of-type');

        if (oldTable) {
            highlightCells(oldTable);
        }
    }

    getCellDate(cell) {
        return Date.parse(cell.innerHTML.replace(/(\d+)(st|nd|rd|th)/, '$1'));
    }
}
