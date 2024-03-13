export function back(url) {
    if (history.length > 2) {
        // if history is not empty, go back:
        history.back();
    } else if (url) {
        // go to specified fallback url:
        history.replaceState(null, null, url);
    } else {
        // go home:
        history.replaceState(null, null, '/');
    }
}
