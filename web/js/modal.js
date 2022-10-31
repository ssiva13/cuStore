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
    if ($(modal).hasClass('in')) {
        $(modal).find('#mainModalContent').load(e.attr('value'));
        document.getElementById('main-modalHeader')
            .innerHTML = '<h4>' + e.attr('title') + '</h4>' +
            '        <button type="button" id="close-modal" class="close" data-dismiss="modal" aria-label="Close">\n' +
            '          <span aria-hidden="true">&times;</span>\n' +
            '        </button>';
    } else {
        $(modal).modal('show').find('#mainModalContent').load(e.attr('value'));
        document.getElementById('main-modalHeader')
            .innerHTML = '<h4>' + e.attr('title') + '</h4>' +
            '        <button type="button" id="close-modal" class="close" data-dismiss="modal" aria-label="Close">\n' +
            '          <span aria-hidden="true">&times;</span>\n' +
            '        </button>';
    }
}