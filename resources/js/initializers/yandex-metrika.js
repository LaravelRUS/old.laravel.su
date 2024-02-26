try {
    (function (m, e, t, r, i, k, a) {
        m[i] =
            m[i] ||
            function () {
                (m[i].a = m[i].a || []).push(arguments);
            };
        m[i].l = 1 * new Date();
        for (var j = 0; j < document.scripts.length; j++) {
            if (document.scripts[j].src === r) {
                return;
            }
        }
        (k = e.createElement(t)),
            (a = e.getElementsByTagName(t)[0]),
            (k.async = 1),
            (k.src = r),
            a.parentNode.insertBefore(k, a);
    })(window, document, 'script', 'https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js', 'ym');

    window.ym(96430041, 'init', {
        defer: true,
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true,
    });
} catch (e) {
    console.warn(e);
}

document.addEventListener('turbo:load', (e) => {
    if (window.ym === null) {
        return;
    }
    ym(96430041, 'hit', e.detail.url);
});

/*

const isYandexMetrikaEnabled = import.meta.env.VITE_YANDEX_METRIKA_ENABLE;
const yandexMetrikaId = import.meta.env.VITE_YANDEX_METRIKA_ID;

if (isYandexMetrikaEnabled) {
    const scriptElement = document.createElement('script');
    scriptElement.async = 1;
    scriptElement.src = 'https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js';

    scriptElement.onload = function () {
        window.ym = window.ym || function () {
            (window.ym.a = window.ym.a || []).push(arguments);
        };
        window.ym.l = 1 * new Date();

        window.ym(yandexMetrikaId, 'init', {
            defer: true,
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true,
        });

        document.addEventListener('turbo:load', (event) => {
            if (window.ym === null) {
                return;
            }
            const url = event.detail.url;
            window.ym(yandexMetrikaId, 'hit', url);
        });
    };

    scriptElement.onerror = function () {
        console.error('Ошибка загрузки скрипта метрики.');
    };

    const headElement = document.head || document.getElementsByTagName('head')[0];
    document.body.appendChild(scriptElement);
}


 */
