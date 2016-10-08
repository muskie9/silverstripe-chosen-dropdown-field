;(function ($) {

    $.fn.extend({
        ssChosenDropdown: function (opts) {
            return $(this).each(function () {
                var config = $.extend(opts || {}, $(this).data(), $(this).data('data-ss-chosen-config'), {});
                if ($(this).hasClass('ss-chosen-config-applied')) return; // already applied
                $(this).addClass('ss-chosen-config-applied').chosen(config);
                $(this).blur().focus(); // trigger show
            });
        }
    });

    $(window).on('load', function () {
        $('.chosen-select').ssChosenDropdown();
    });

})(jQuery);