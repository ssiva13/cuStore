/**
 Created by ssiva on 27/12/2022
 */

$(document).ready(function () {
    'use strict';
    // Initialize datatables
    let DataTable = $.fn.dataTable;
    $.extend(DataTable.defaults, {
        responsive: true,
        aaSorting: [[1, 'desc']],
        lengthChange: true,
        paging: true,
        orderMulti: true,
        info: true,
        rowReorder: true,

        dom: "<'row' " +
            "<'col-sm-12 col-md-6 mt-2 pr-2 align-content-left float-left' f> " +
            "<'col-sm-12 col-md-6 mt-2 pl-2 align-content-right float-right text-right' B <'actions-toolbar'> > " +
            ">" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row' " +
            "<'col-sm-12 col-md-4 mt-2 text-left'l> " +
            "<'col-sm-12 col-md-4 text-center'i> " +
            "<'col-sm-12 col-md-4 text-right'p> " +
            ">",
        columnDefs: [
            {
                targets: [0],
                sortable: false,
                searchable: false,
                title: "#",
                name: "",
            },
            {
                targets: [-1],
                searchable: false,
                sortable: false,
                title: "Actions",
                name: "Actions",
            },
        ],
        fnInitComplete: function (settings, json) {
            if($(settings.nTable).parents(`#main-modal`).length) {
                let sUrl = $(settings.nTable).data('source-url');
                let sTitle = $(settings.nTable).data('source-title');
                $(`div.actions-toolbar`).append(`
                <button class="btn btn-link mr-2 showModalButton" title="Create ${sTitle}" value="${sUrl}/create" >
                    <i class='fa fa-plus-square fa-lg' aria-hidden='true'></i>
                 </button>
            `);
            }
        }
    });
    $.extend(DataTable.Buttons.defaults, {
        buttons: [],
    });
});
