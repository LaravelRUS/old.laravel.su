export default (function () {

    // выборка активного пункта меню
    let menuPlace = document.querySelector('.documentation-menu');

    if (menuPlace) {
        let path = window.location.pathname,
            link = menuPlace.querySelector('a[href="' + path + '"]'),
            parent = link.closest('li')
        ;

        // присваивание классов активному пункту меню
        link.classList.add('link-active');
        parent.classList.add('item-active');
    }

    return {}
})();
