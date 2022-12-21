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

    // Initialize datatables
    let DataTable = $.fn.dataTable;
    $.extend( DataTable.defaults, {
        responsive: true,
        lengthChange: true,
        paging: true,
        orderMulti: true,
        info: true,
        rowReorder: true,
        dom: "<'row'<'col-sm-12 col-md-4 mt-2'l><'col-sm-12 col-md-4 mt-2'B><'col-sm-12 col-md-4 mt-2'f>>" +
                "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [
            'excel', 'pdf'
        ],
        columnDefs: [
            {
                targets: [ 0 ],
                sortable: false,
                title: "",
                name: "",
            },
            {
                targets: [ -1 ],
                searchable: false,
                sortable: false,
                title: "Actions",
                name: "Actions",
            },
        ]
    });
});