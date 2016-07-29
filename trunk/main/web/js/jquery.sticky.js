// Sticky Plugin
// =============
// Author: Anthony Garand
// Date: 2/14/2011
// Website: http://labs.anthonygarand.com/sticky
// Description: Makes an element on the page stick on the screen

(function ($) {
    $.fn.sticky = function (options) {
        var defaults = {
            topSpacing: 0,
            buttomSpacing: 0,
            beforeclassName: 'is-sticky-before',
            afterclassName: 'is-sticky-after'
        };

        var options = $.extend(defaults, options);
        return this.each(function () {
            var topPadding = options.topSpacing,
                    buttomPadding = options.buttomSpacing,
                    stickyElement = $(this),
                    stickyElementHeight = stickyElement.outerHeight(),
                    stickyElementWidth = stickyElement.outerWidth(),
                    elementPosition = stickyElement.offset().top - $(window).scrollTop(),
                    regPosition = stickyElement.offset().top,
                    stickyId = stickyElement.attr("id");
            stickyElement.wrapAll('<div id="' + stickyId + 'StickyWrapper" class="clearfix"></div>');
            stickyElement.parent().css("height", stickyElementHeight).css("width", stickyElementWidth);
            $(window).scroll(function () {
                elementPosition = stickyElement.offset().top - $(window).scrollTop();
                if (elementPosition <= topPadding) {
                    stickyElement.css("position", "fixed").css("top", topPadding).removeClass(options.afterclassName).addClass(options.beforeclassName);
                }
                if ($(window).scrollTop() <= regPosition - topPadding) {
                    stickyElement.css("position", "static").css("top", $(window).scrollTop()).removeClass(options.beforeclassName).addClass(options.afterclassName);
                }
                if ($(document).height() - $(window).scrollTop() - stickyElement.height() <= buttomPadding) {
                    aheadPadding = -(buttomPadding - ($(document).height() - $(window).scrollTop() - stickyElement.height()));
                    stickyElement.css("position", "fixed").css("top", aheadPadding);
                }
            });
        });
    };
})(jQuery);