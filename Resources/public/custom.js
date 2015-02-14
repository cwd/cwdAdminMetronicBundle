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
