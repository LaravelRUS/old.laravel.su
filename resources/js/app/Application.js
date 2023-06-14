
import axios from 'axios';
import ko from 'knockout';

import {AxiosStatic} from "axios";

export default class Application {
    static boot(viewModels: string): void {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function (): void {
                Application.#run(viewModels);
            });
        } else {
            Application.#run(viewModels);
        }
    }

    static #run(viewModels: string): void {
        window.axios = Application.#bootAxios();
        window.ko = Application.#bootKnockout(viewModels);
    }

    static #bootKnockout(viewModels: string): KnockoutStatic {
        const nodes: NodeListOf<Element> = document.querySelectorAll('[data-vm]');

        for (let node: Element of nodes) {
            let vm = require(`../${viewModels}/${node.getAttribute('data-vm')}.js`).default;

            ko.applyBindings(new vm(node), node);
        }

        return ko;
    }

    /**
     * We'll load the axios HTTP library which allows us to easily issue requests
     * to our Laravel back-end. This library automatically handles sending the
     * CSRF token as a header based on the value of the "XSRF" token cookie.
     */
    static #bootAxios(): AxiosStatic {
        axios.defaults.headers.common = {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content')
        };

        return axios;
    }
}
