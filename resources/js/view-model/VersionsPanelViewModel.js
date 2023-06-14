import ko from 'knockout';

if (!requestAnimationFrame) {
    function requestAnimationFrame(callback) {
        callback();
    }
}

export default class VersionsPanelViewModel {
    fixed: KnockoutObservable<boolean> = ko.observable(false);

    scrollDirectionDown: KnockoutObservable<boolean> = ko.observable(true);

    #previousTop: number = 0;

    #currentTop: number = 0;

    constructor(context: Element) {
        const self: VersionsPanelViewModel = this;

        window.addEventListener('scroll', function (): void {
            const rect: DOMRect = context.getBoundingClientRect();

            requestAnimationFrame(function (): void {
                self.#currentTop = window.pageYOffset || document.documentElement.scrollTop;
                self.scrollDirectionDown(self.#currentTop > self.#previousTop);
                self.#previousTop = self.#currentTop;

                self.fixed(rect.top < 0);
            });
        });
    }
}
