import ko from 'knockout';

if (!requestAnimationFrame) {
    function requestAnimationFrame(callback) {
        callback();
    }
}

export default class VersionsPanelViewModel {
    /**
     * @type {*}
     */
    fixed = ko.observable(false);

    /**
     * @type {*}
     */
    scrollDirectionDown = ko.observable(true);

    /**
     * @type {number}
     */
    #previousTop = 0;

    /**
     * @type {number}
     */
    #currentTop = 0;

    constructor(context) {
        const self = this;

        window.addEventListener('scroll', function (e) {
            const rect = context.getBoundingClientRect();

            requestAnimationFrame(function () {
                self.#currentTop = window.pageYOffset || document.documentElement.scrollTop;
                self.scrollDirectionDown(self.#currentTop > self.#previousTop);
                self.#previousTop = self.#currentTop;

                self.fixed(rect.top < 0);
            });
        });
    }
}
