var Charts = function () {

    if (!jQuery().easyPieChart) {
        return;
    }

    // IE8 Fix: function.bind polyfill
    if (Metronic.isIE8() && !Function.prototype.bind) {
        Function.prototype.bind = function (oThis) {
            if (typeof this !== "function") {
                // closest thing possible to the ECMAScript 5 internal IsCallable function
                throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
            }

            var aArgs = Array.prototype.slice.call(arguments, 1),
                fToBind = this,
                fNOP = function () {
                },
                fBound = function () {
                    return fToBind.apply(this instanceof fNOP && oThis ? this : oThis,
                        aArgs.concat(Array.prototype.slice.call(arguments)));
                };

            fNOP.prototype = this.prototype;
            fBound.prototype = new fNOP();

            return fBound;
        };
    }

    $('.easy-pie-chart .pie-value').each(function(){
        var $this = $(this);
        var color  = $this.data('color');

        $this.easyPieChart({
            animate: 1000,
            size: 75,
            lineWidth: 3,
            barColor: Metronic.getBrandColor(color)
        });
    });

}

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
