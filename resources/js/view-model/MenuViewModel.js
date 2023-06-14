
const uri: string = window.location.pathname;

export default class MenuViewModel {
    constructor(node: Element) {
        const selected: ?Element = node.querySelector(`a[href="${uri}"]`);

        selected?.classList.add('active');
    }
}
