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

$('.slider').each(function(){
    var $this = $(this);
    if (!$this.data('type')) {
        var type = 'single'
    } else {
        var type = $this.data('type')
    }

    $this.ionRangeSlider({
        type: type,
        hasGrid: true,
        min: $this.data('min'),
        max: $this.data('max'),
        from: $this.attr('value')
    });
});
