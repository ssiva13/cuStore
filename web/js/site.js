$(document).ready( function () {
    'use strict';
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