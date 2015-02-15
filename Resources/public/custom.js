var handleColorPicker = function () {
    if (!jQuery().colorpicker) {
        return;
    }
    $('.colorpicker-default').colorpicker({
        format: 'hex'
    });
    $('.colorpicker-rgba').colorpicker();
}
handleColorPicker();


$(document).on('click', 'a.modal-open', function(e){
    e.preventDefault();

    var $modal = $('#helper-modal');
    $modal.load($(this).attr('href'), '', function(){
        $modal.modal();
    });
});
