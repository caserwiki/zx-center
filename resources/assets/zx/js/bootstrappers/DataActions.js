import Dropdown from "../../../adminlte/js/Dropdown";

let $document = $(document);

let defaultActions = {
    // 刷新按钮
    refresh (action, Zx) {
        $document.on('click', action, function () {
            Zx.reload($(this).data('url'));
        });
    },
    // 删除按钮初始化
    delete (action, Zx) {
        let lang = Zx.lang;

        $document.on('click', action, function() {
            let url = $(this).data('url'),
                redirect = $(this).data('redirect'),
                msg = $(this).data('message');

            Zx.confirm(lang.delete_confirm, msg, function () {
                Zx.NP.start();
                $.delete({
                    url: url,
                    success: function (response) {
                        Zx.NP.done();

                        response.data.detail = msg;

                        if (redirect && ! response.data.then) {
                            response.data.then = {action: 'redirect', value: redirect}
                        }

                        Zx.handleJsonResponse(response);
                    }
                });
            });
        });
    },
    // 批量删除按钮初始化
    'batch-delete' (action, Zx) {
        $document.on('click', action, function() {
            let url = $(this).data('url'),
                name = $(this).data('name'),
                redirect = $(this).data('redirect'),
                keys = Zx.grid.selected(name),
                lang = Zx.lang;

            if (! keys.length) {
                return;
            }
            let msg = 'ID - ' + keys.join(', ');

            Zx.confirm(lang.delete_confirm, msg, function () {
                Zx.NP.start();
                $.delete({
                    url: url + '/' + keys.join(','),
                    success: function (response) {
                        Zx.NP.done();

                        if (redirect && ! response.data.then) {
                            response.data.then = {action: 'redirect', value: redirect}
                        }

                        Zx.handleJsonResponse(response);
                    }
                });
            });
        });
    },

    // 图片预览
    'preview-img' (action, Zx) {
        $document.on('click', action, function () {
            return Zx.helpers.previewImage($(this).attr('src'));
        });
    },

    'popover' (action, Zx) {
        Zx.onPjaxComplete(function () {
            $('.popover').remove();
        }, false);

        $document.on('click', action, function () {
            $(this).popover()
        });
    },

    'box-actions' () {
        $document.on('click', '.box [data-action="collapse"]', function (e) {
            e.preventDefault();

            $(this).find('i').toggleClass('icon-minus icon-plus');

            $(this).closest('.box').find('.box-body').first().collapse("toggle");
        });

        // Close box
        $document.on('click', '.box [data-action="remove"]', function () {
            $(this).closest(".box").removeClass().slideUp("fast");
        });
    },

    dropdown () {
        function hide() {
            $('.dropdown-menu').removeClass('show')
        }
        $document.off('click', document, hide)
        $document.on('click', hide);

        function toggle(event) {
            var $this = $(this);

            $('.dropdown-menu').each(function () {
                if ($this.next()[0] !== this) {
                    $(this).removeClass('show');
                }
            });

            $this.Dropdown('toggleSubmenu')
        }

        function fix(event) {
            event.preventDefault()
            event.stopPropagation()

            let $this = $(this);

            setTimeout(function() {
                $this.Dropdown('fixPosition')
            }, 1)
        }

        let selector = '[data-toggle="dropdown"]';

        $document.off('click',selector).on('click', selector, toggle).on('click', selector, fix);
    },
};

export default class ZxActions {
    constructor(Zx) {
        let actions = $.extend(defaultActions, Zx.actions()),
            name;

        for (name in actions) {
            actions[name](`[data-action="${name}"]`, Zx);
        }
    }
}
