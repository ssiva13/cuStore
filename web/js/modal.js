$(function(){
    $(document).on('click', '.showModalButton', function(){
        triggerModal($(this));
    });
    $(document).on('click', '#close-modal', function(){
        $(`#main-modal`).modal('hide');
    });
});

function triggerModal(e)
{
    let modal = "#main-modal";
    let content = $(`${modal} .modal-content`);
    let dialog = $(`${modal} .modal-dialog`);
    if(e.hasClass('full')) {
        dialog.addClass('modal-fullscreen').addClass('modal-dialog-full');
        content.addClass('modal-content-full');
    }
    if ($(modal).hasClass('in')) {
        $(modal).find('#mainModalContent').load(e.attr('value'), function() {
            $(`.select2-dropdown-single`).select2({
                multiple: false,
                dropdownParent: content,
            });
            $(`.select2-dropdown-multiple`).select2({
                multiple: true,
                dropdownParent: content,
            });
        });
        document.getElementById('main-modalHeader')
            .innerHTML = '<h4>' + e.attr('title') + '</h4>' +
            '        <button type="button" id="close-modal" class="close" data-dismiss="modal" aria-label="Close">\n' +
            '          <span aria-hidden="true">&times;</span>\n' +
            '        </button>';
    } else {
        $(modal).modal('show').find('#mainModalContent').load(e.attr('value'), function() {
            $(`.select2-dropdown-single`).select2({
                multiple: false,
                dropdownParent: content,
            });
            $(`.select2-dropdown-multiple`).select2({
                multiple: true,
                dropdownParent: content,
            });
        });
        document.getElementById('main-modalHeader')
            .innerHTML = '<h4>' + e.attr('title') + '</h4>' +
            '        <button type="button" id="close-modal" class="close" data-dismiss="modal" aria-label="Close">\n' +
            '          <span aria-hidden="true">&times;</span>\n' +
            '        </button>';
    }
}