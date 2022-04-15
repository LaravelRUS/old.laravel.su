
const uri = window.location.pathname;

export default class MenuViewModel {
    constructor(node) {
        const selected = node.querySelector(`a[href="${uri}"]`);

        if (selected) {
            selected.classList.add('active');
        }
    }
}