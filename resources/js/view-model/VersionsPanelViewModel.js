import ko from "@tko/build.reference";

export default class VersionsPanelViewModel {
    /**
     * @type {*}
     */
    fixed = ko.observable(false);

    constructor(context) {
        const self = this;
        window.addEventListener("scroll", function () {
            const rect = context.getBoundingClientRect();

            self.fixed(rect.top < 0);
        });
    }
}