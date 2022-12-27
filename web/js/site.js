$(document).ready( function () {
    'use strict';
    // iniialize all select2 field options
    let Select2 = $.fn.select2;
    Select2.defaults.set("theme", 'bootstrap-5');
    Select2.defaults.set("allowClear", true);
    Select2.defaults.set("placeholder", '-- Select --');
    $(`.select2-dropdown-single`).select2({
        multiple: false,
    });
    $(`.select2-dropdown-multiple`).select2({
        multiple: true,
    });
});
