/**
 Core script to handle the entire layout and base functions
 **/
var App = function () {
    "use strict";
    // IE mode
    var isIE8 = false;
    var isIE9 = false;
    var isIE10 = false;
    var responsiveHandlers = [];
    var layoutColorCodes = {
        'blue': '#54728c',
        'red': '#e25856',
        'green': '#94B86E',
        'purple': '#852b99',
        'grey': '#555555',
        'yellow': '#ffb848'
    };
    var sidebarWidth = '250px';

    var handleResponsive = function () {
        var isIE8 = (navigator.userAgent.match(/msie [8]/i));
        var isIE9 = (navigator.userAgent.match(/msie [9]/i));
        var isIE10 = !!navigator.userAgent.match(/MSIE 10/);
        if (isIE10) {
            $('html').addClass('ie10'); // detect IE10 version
        }
        $('.navbar li.nav-toggle').click(function () {
            $('body').toggleClass('nav-open');
        });

        $('.toggle-sidebar').click(function (e) {
            e.preventDefault();
            $('#sidebar').css('width', '');
            $('#sidebar > #divider').css('margin-left', '');
            $('#content').css('margin-left', '');
            $('#container').toggleClass('sidebar-closed');
        });

        var handleElements = function () {
            $('.crumbs .crumb-buttons > li').removeClass('first');
            $('.crumbs .crumb-buttons > li:visible:first').addClass('first');
            if ($('body').hasClass('nav-open')) {
                $('body').toggleClass('nav-open');
            }
            handleScrollbars();
            handleProjectSwitcherWidth();
        }
        $(window).setBreakpoints({
            breakpoints: [320, 480, 768, 979, 1200]
        });
        $(window).bind('exitBreakpoint320', function () {
            handleElements();
        });
        $(window).bind('enterBreakpoint320', function () {
            handleElements();
        });
        $(window).bind('exitBreakpoint480', function () {
            handleElements();
        });
        $(window).bind('enterBreakpoint480', function () {
            handleElements();
        });
        $(window).bind('exitBreakpoint768', function () {
            handleElements();
        });
        $(window).bind('enterBreakpoint768', function () {
            handleElements();
        });
        $(window).bind('exitBreakpoint979', function () {
            handleElements();
        });
        $(window).bind('enterBreakpoint979', function () {
            handleElements();
        });
        $(window).bind('exitBreakpoint1200', function () {
            handleElements();
        });
        $(window).bind('enterBreakpoint1200', function () {
            handleElements();
        });
    }

    var calculateHeight = function () {
        $('body').height('100%');
        var $header = $('.header');
        var header_height = $header.outerHeight();
        var document_height = $(document).height();
        var window_height = $(window).height();
        var doc_win_diff = document_height - window_height;
        if (doc_win_diff <= header_height) {
            var new_height = document_height - doc_win_diff;
        } else {
            var new_height = document_height;
        }
        new_height = new_height - header_height;
        var document_height = $(document).height();
        $('body').height(new_height);
    }

    var handleLayout = function () {
        calculateHeight();
        if ($('.header').hasClass('navbar-fixed-top')) {
            $('#container').addClass('fixed-header');
        }
    }

    var handleResizeEvents = function () {
        var resizeLayout = debounce(_resizeEvents, 30);
        $(window).resize(resizeLayout);
    }

    var _resizeEvents = function () {
        calculateHeight();
        if ($.fn.dataTable) {
            var tables = $.fn.dataTable.fnTables(true);
            $(tables).each(function () {
                if (typeof $(this).data('horizontalWidth') != 'undefined') {
                    $(this).dataTable().fnAdjustColumnSizing();
                }
            });
        }
    }

    var debounce = function (func, wait, immediate) {
        var timeout, args, context, timestamp, result;
        return function () {
            context = this;
            args = arguments;
            timestamp = new Date();
            var later = function () {
                var last = (new Date()) - timestamp;
                if (last < wait) {
                    timeout = setTimeout(later, wait - last);
                } else {
                    timeout = null;
                    if (!immediate)
                        result = func.apply(context, args);
                }
            };
            var callNow = immediate && !timeout;
            if (!timeout) {
                timeout = setTimeout(later, wait);
            }
            if (callNow)
                result = func.apply(context, args);
            return result;
        };
    };

    var handleSwipeEvents = function () {
        if ($(window).width() <= 767) {
            $('body').on('movestart', function (e) {
                if ((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
                    e.preventDefault();
                }
                var $parentClass = $(e.target).parents('#project-switcher');
                if ($parentClass.length) {
                    e.preventDefault();
                }
            }).on('swipeleft', function (e) {
                $('body').toggleClass('nav-open');
            }).on('swiperight', function (e) {
                $('body').toggleClass('nav-open');
            });
        }
    }

    var handleSidebarMenu = function () {
        var arrow_class_open = 'icon-angle-down',
                arrow_class_closed = 'icon-angle-left';
        $('li:has(ul)', '#sidebar-content ul').each(function () {
            if ($(this).hasClass('current') || $(this).hasClass('open-default')) {
                $('>a', this).append("<i class='arrow " + arrow_class_open + "'></i>");
            } else {
                $('>a', this).append("<i class='arrow " + arrow_class_closed + "'></i>");
            }
        });
        if ($('#sidebar').hasClass('sidebar-fixed')) {
            $('#sidebar-content').append('<div class="fill-nav-space"></div>');
        }
        $('#sidebar-content ul > li > a').on('click', function (e) {
            if ($(this).next().hasClass('sub-menu') == false) {
                return;
            }
            if ($(window).width() > 767) {
                var parent = $(this).parent().parent();
                parent.children('li.open').children('a').children('i.arrow').removeClass(arrow_class_open).addClass(arrow_class_closed);
                parent.children('li.open').children('.sub-menu').slideUp(200);
                parent.children('li.open-default').children('.sub-menu').slideUp(200);
                parent.children('li.open').removeClass('open').removeClass('open-default');
            }

            var sub = $(this).next();
            if (sub.is(":visible")) {
                $('i.arrow', $(this)).removeClass(arrow_class_open).addClass(arrow_class_closed);
                $(this).parent().removeClass('open');
                sub.slideUp(200, function () {
                    $(this).parent().removeClass('open-fixed').removeClass('open-default');
                    calculateHeight();
                });
            } else {
                $('i.arrow', $(this)).removeClass(arrow_class_closed).addClass(arrow_class_open);
                $(this).parent().addClass('open');
                sub.slideDown(200, function () {
                    calculateHeight();
                });
            }
            e.preventDefault();
        });

        var _handleResizeable = function () {
            $('#divider.resizeable').mousedown(function (e) {
                e.preventDefault();
                var divider_width = $('#divider').width();
                $(document).mousemove(function (e) {
                    var sidebar_width = e.pageX + divider_width;
                    if (sidebar_width <= 300 && sidebar_width >= (divider_width * 2 - 3)) {
                        if (sidebar_width >= 240 && sidebar_width <= 260) {
                            $('#sidebar').css("width", 250);
                            $('#sidebar-content').css("width", 250);
                            $('#content').css("margin-left", 250);
                            $('#divider').css("margin-left", 250);
                        } else {
                            $('#sidebar').css("width", sidebar_width);
                            $('#sidebar-content').css("width", sidebar_width);
                            $('#content').css("margin-left", sidebar_width);
                            $('#divider').css("margin-left", sidebar_width);
                        }

                    }

                })
            });
            $(document).mouseup(function (e) {
                $(document).unbind('mousemove');
            });
        }

        _handleResizeable();
    }

    var handleScrollbars = function () {
        var android_chrome = /android.*chrom(e|ium)/.test(navigator.userAgent.toLowerCase());
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) && android_chrome == false) {
            $('#sidebar').css('overflow-y', 'auto');
        } else {
            if ($('#sidebar').hasClass('sidebar-fixed') || $(window).width() <= 767) {
                if (android_chrome) {
                    var wheelStepInt = 100;
                    $('#sidebar').attr('style', 'position: absolute !important;');
                    if ($(window).width() > 979) {
                        $('#sidebar').css('margin-top', '-52px');
                    }
                    if ($(window).width() <= 767) {
                        $('#sidebar').css('margin-left', '-250px').css('margin-top', '-52px');
                    }
                } else {
                    var wheelStepInt = 7;
                }
            }
        }
    }

    var handleThemeSwitcher = function () {
        function _changeTheme(theme) {
            $('body').removeClass(function (index, css) {
                return (css.match(/\btheme-\S+/g) || []).join(' ');
            });
            $('body').addClass('theme-' + theme);
            $.cookie('theme', theme, {path: '/'});
            if (theme == 'dark') {
                _toggleBtnInverse('add');
            } else {
                _toggleBtnInverse('remove');
            }
        }
        function _toggleBtnInverse(state) {
            $('#theme-switcher .btn').each(function () {
                if (state == 'add') {
                    $(this).addClass('btn-inverse');
                } else {
                    $(this).removeClass('btn-inverse');
                }
            });
        }

        if ($.cookie) {
            $('#theme-switcher label').click(function () {
                var self = $(this).find('input');
                var theme = self.data('theme');
                _changeTheme(theme);
            });
            if ($.cookie('theme')) {
                var cookie_theme = $.cookie('theme');
                _changeTheme(cookie_theme);
                $('#theme-switcher input').each(function () {
                    var self = $(this);
                    var theme = self.data('theme');
                    if (theme == cookie_theme) {
                        self.parent().addClass('active');
                    } else {
                        self.parent().removeClass('active');
                    }
                });
                if (cookie_theme == 'dark') {
                    _toggleBtnInverse('add');
                } else {
                    _toggleBtnInverse('remove');
                }
            }
        }
    }

    var handleWidgets = function () {
        $('.widget .toolbar .widget-collapse').click(function () {
            var widget = $(this).parents(".widget");
            var widget_content = widget.children(".widget-content");
            var widget_chart = widget.children(".widget-chart");
            var divider = widget.children(".divider");
            if (widget.hasClass('widget-closed')) {
                $(this).children('i').removeClass('icon-angle-up').addClass('icon-angle-down');
                widget_content.slideDown(200, function () {
                    widget.removeClass('widget-closed');
                });
                widget_chart.slideDown(200);
                divider.slideDown(200);
            } else {
                $(this).children('i').removeClass('icon-angle-down').addClass('icon-angle-up');
                widget_content.slideUp(200, function () {
                    widget.addClass('widget-closed');
                });
                widget_chart.slideUp(200);
                divider.slideUp(200);
            }
        });
    }

    var handleCheckableTables = function () {
        $('.table-checkable thead th.checkbox-column :checkbox').on('change', function () {
            var checked = $(this).prop('checked');
            var data_horizontalWidth = $(this).parents('table.table-checkable').data('horizontalWidth');
            if (typeof data_horizontalWidth != 'undefined') {
                var $checkable_table_body = $(this).parents('.dataTables_scroll').find('.dataTables_scrollBody tbody');
            } else {
                var $checkable_table_body = $(this).parents('table').children('tbody');
            }
            $checkable_table_body.each(function (i, tbody) {
                $(tbody).find('.checkbox-column').each(function (j, cb) {
                    var cb_self = $(':checkbox', $(cb)).prop("checked", checked).trigger('change');
                    if (cb_self.hasClass('uniform')) {
                        $.uniform.update(cb_self);
                    }
                    $(cb).closest('tr').toggleClass('checked', checked);
                });
            });
        });
        $('.table-checkable tbody tr td.checkbox-column :checkbox').on('change', function () {
            var checked = $(this).prop('checked');
            $(this).closest('tr').toggleClass('checked', checked);
        });
    }

    var handleTabs = function () {
        var fixTabHeight = function (tab) {
            $(tab).each(function () {
                var content = $($($(this).attr("href")));
                var tab = $(this).parent().parent();
                if (tab.height() > content.height()) {
                    content.css('min-height', tab.height());
                }
            });
        }
        $('body').on('click', '.nav.nav-tabs.tabs-left a[data-toggle="tab"], .nav.nav-tabs.tabs-right a[data-toggle="tab"]', function () {
            fixTabHeight($(this));
        });
        fixTabHeight('.nav.nav-tabs.tabs-left > li.active > a[data-toggle="tab"], .nav.nav-tabs.tabs-right > li.active > a[data-toggle="tab"]');
        if (location.hash) {
            var tabid = location.hash.substr(1);
            $('a[href="#' + tabid + '"]').click();
        }
    }

    var handleScrollers = function () {
        $('.scroller').each(function () {
            $(this).slimScroll({
                size: '7px',
                opacity: '0.2',
                position: 'right',
                height: $(this).attr('data-height'),
                alwaysVisible: ($(this).attr('data-always-visible') == '1' ? true : false),
                railVisible: ($(this).attr('data-rail-visible') == '1' ? true : false),
                disableFadeOut: true
            });
        });
    }

    var handleProjectSwitcher = function () {
        handleProjectSwitcherWidth();
        $('.project-switcher-btn').click(function (e) {
            e.preventDefault();
            _hideVisibleProjectSwitcher(this);
            $(this).parent().toggleClass('open');
            var data_projectSwitcher = _getProjectSwitcherID(this);
            $(data_projectSwitcher).slideToggle(200, function () {
                $(this).toggleClass('open');
            });
        });
        $('body').click(function (e) {
            var classes = e.target.className.split(' ');
            if ($.inArray('project-switcher', classes) == -1 && $.inArray('project-switcher-btn', classes) == -1
                    && $(e.target).parents().index($('.project-switcher')) == -1 && $(e.target).parents('.project-switcher-btn').length == 0) {
                _hideVisibleProjectSwitcher();

            }
        });

        $('.project-switcher #frame').each(function () {
            $(this).slimScrollHorizontal({
                width: '100%',
                alwaysVisible: true,
                color: '#fff',
                opacity: '0.2',
                size: '5px'
            });
        });
        
        $('#sidebar-content').each(function () {
            $(this).slimScrollHorizontal({
                height: '100%',
                alwaysVisible: true,
                color: '#fff',
                opacity: '0.2',
                size: '5px'
            });
        });

        var _hideVisibleProjectSwitcher = function (el) {
            $('.project-switcher').each(function () {
                var $projectswitcher = $(this);
                if ($projectswitcher.is(':visible')) {
                    var data_projectSwitcher = _getProjectSwitcherID(el);
                    if (data_projectSwitcher != ('#' + $projectswitcher.attr('id'))) {
                        $(this).slideUp(200, function () {
                            $(this).toggleClass('open');
                            $('.project-switcher-btn').each(function () {
                                var data_projectSwitcher = _getProjectSwitcherID(this);
                                if (data_projectSwitcher == ('#' + $projectswitcher.attr('id'))) {
                                    $(this).parent().removeClass('open');
                                }
                            });
                        });
                    }
                }
            });
        }

        var _getProjectSwitcherID = function (el) {
            var data_projectSwitcher = $(el).data('projectSwitcher');
            if (typeof data_projectSwitcher == 'undefined') {
                data_projectSwitcher = '#project-switcher';
            }
            return data_projectSwitcher;
        }
    }

    var handleProjectSwitcherWidth = function () {
        $('.project-switcher').each(function () {
            var $projectswitcher = $(this);
            $projectswitcher.css('position', 'absolute').css('margin-top', '-1000px').show();
            var total_width = 0;
            $('ul li', this).each(function () {
                total_width += $(this).outerWidth(true) + 15;
            });
            $projectswitcher.css('position', 'relative').css('margin-top', '0').hide();
            $('ul', this).width(total_width);
        });
    }

    return {
        init: function () {
            handleResponsive();
            handleLayout();
            handleResizeEvents();
            handleSwipeEvents();
            handleSidebarMenu();
            handleScrollbars();
            handleThemeSwitcher();
            handleWidgets();
            handleCheckableTables();
            handleTabs();
            handleScrollers();
            handleProjectSwitcher();
        },
        getLayoutColorCode: function (name) {
            if (layoutColorCodes[name]) {
                return layoutColorCodes[name];
            } else {
                return '';
            }
        },
        blockUI: function (el, centerY) {
            var el = $(el);
            el.block({
                message: '<img src="/images/common/loader/12.gif" alt="">',
                centerY: centerY != undefined ? centerY : true,
                css: {
                    top: '10%',
                    border: 'none',
                    padding: '2px',
                    backgroundColor: 'none'
                },
                overlayCSS: {
                    backgroundColor: '#000',
                    opacity: 0.05,
                    cursor: 'wait'
                }
            });
        },
        unblockUI: function (el) {
            $(el).unblock({
                onUnblock: function () {
                    $(el).removeAttr("style");
                }
            });
        }
    };
}();