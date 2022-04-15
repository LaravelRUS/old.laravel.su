import Application from "./app/Application";

const app = new Application();

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function (event) {
        app.boot();
    });
} else {
    app.boot();
}


