import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        url: {
            type: String,
            default: null,
        },
        cursor: {
            type: String,
            default: null,
        },
    };

    initialize() {
        this.scroll = this.scroll.bind(this);
    }

    connect() {
        document.addEventListener('scroll', this.scroll);
    }

    scroll() {
        if (this.scrollReachedEnd && !this.hasLastPageTarget && this.urlValue != '') {
            this.getNewPage();
        }
    }

    getNewPage() {
        if (this.urlValue == 'null') {
            return;
        }
        /*

        fetch(this.urlValue, {
            method: 'POST',
            body: 'UrlSearchParams',
            headers: {
                'X-CSRF-Token': document.head.querySelector('[name~=csrf-token][content]').content,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                this.urlValue = data.url;
                this.element.innerHTML+=data.view;
            })
        */

        let xhr = new XMLHttpRequest();
        xhr.open('POST', this.urlValue, true);
        this.urlValue = '';
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-Token', document.head.querySelector('[name~=csrf-token][content]').content);
        xhr.responseType = 'json';

        xhr.send();

        xhr.onload = () => {
            if (xhr.status != 200) {
            } else {
                console.log(xhr.response);
                this.urlValue = xhr.response.url;
                this.element.innerHTML += xhr.response.view;
            }
        };
    }

    get scrollReachedEnd() {
        const { scrollHeight, scrollTop, clientHeight } = document.documentElement;
        const distanceFromBottom = scrollHeight - scrollTop - clientHeight;
        return distanceFromBottom < 20; // adjust the number 20 yourself
    }
}
