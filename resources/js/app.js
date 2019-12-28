//require('./bootstrap');

import $ from "jquery";

$(document).ready(function () {
    $('.docs_content').find('a[name]').each(function () {
        var anchor = $('<a href="#' + this.name + '">');
        alert(anchor);
        $(this).parent().next('h2').wrapInner(anchor);
    });
});
