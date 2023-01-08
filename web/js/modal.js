$(function(){
    $(document).on('click', '.showModalButton', function(){
        triggerModal($(this));
    });
    $(document).on('click', '#close-modal', function(){
        $(`#main-modal`).modal('hide');
    });
});

function triggerModal(e) {
    let modal = "#main-modal";
    let content = $(`${modal} .modal-content`);
    let dialog = $(`${modal} .modal-dialog`);
    dialog.removeClass('modal-fullscreen').removeClass('modal-dialog-full');
    content.removeClass('modal-content-full');
    if(e.hasClass('full')) {
        dialog.addClass('modal-fullscreen').addClass('modal-dialog-full');
        content.addClass('modal-content-full');
    }
    if ($(modal).hasClass('show')) {
        $(modal).find('#mainModalContent').load(e.attr('value'), function() {
            select2Toggle(content);
        });
        setModalContent(e);
    } else {
        $(modal).modal('show').find('#mainModalContent').load(e.attr('value'), function() {
            select2Toggle(content);
        });
        setModalContent(e);
    }
}

function setModalContent(e) {
    let closeBtnCls = '';
    // if(e.hasClass('full')) {
    //     closeBtnCls = 'display-4';
    // }
    document.getElementById('main-modalHeader')
        .innerHTML = '<h4 class="' + closeBtnCls + '">' + e.attr('title') + '</h4>' +
        '        <button type="button" id="close-modal" class="close" data-dismiss="modal" aria-label="Close">\n' +
        '          <span aria-hidden="true">&times;</span>\n' +
        '        </button>';
}

function select2Toggle(content) {
    $(`.select2-dropdown-single`).select2({
        multiple: false,
        dropdownParent: content,
    });
    $(`.select2-dropdown-multiple`).select2({
        multiple: true,
        dropdownParent: content,
    });
}
