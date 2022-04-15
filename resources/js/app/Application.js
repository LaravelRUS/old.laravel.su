
import axios from 'axios';
import ko from '@tko/build.reference';

export default class Application {
    boot() {
        window.axios || (window.axios = Application.#bootAxios());
        window.ko || (window.ko = Application.#bootKnockout());
    }

    /**
     * @returns {*}
     */
    static #bootKnockout() {
        const nodes = document.querySelectorAll('[data-vm]');

        for (let node of nodes) {
            let vm = require(`../view-model/${node.getAttribute('data-vm')}.js`).default;

            ko.applyBindings(new vm(node), node);
        }

        return ko;
    }

    /**
     * We'll load the axios HTTP library which allows us to easily issue requests
     * to our Laravel back-end. This library automatically handles sending the
     * CSRF token as a header based on the value of the "XSRF" token cookie.
     *
     * @returns {AxiosStatic}
     */
    static #bootAxios() {
        axios.defaults.headers.common = {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content')
        };

        return axios;
    }
}