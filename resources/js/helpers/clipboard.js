export async function copyText(text) {
    if ('clipboard' in navigator) {
        try {
            await navigator.clipboard.writeText(text);
            return true;
        } catch {
            // Android WebView does not support the clipboard API fully and will throw an exception
        }
    }
    const node = createNode(text);
    document.body.append(node);
    const result = copyNode(node);
    node.remove();
    return result;
}

function createNode(text) {
    const node = document.createElement('pre');
    node.style = 'width: 1px; height: 1px; position: fixed; top: 50%';
    node.textContent = text;
    return node;
}

function copyNode(node) {
    const selection = document.getSelection();
    const range = document.createRange();
    range.selectNodeContents(node);
    selection.removeAllRanges();
    selection.addRange(range);
    return document.execCommand('copy');
}
