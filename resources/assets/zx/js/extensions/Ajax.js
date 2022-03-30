
export default class Ajax {
    constructor(Zx) {
        this.zx = Zx;

        Zx.handleAjaxError = this.handleAjaxError.bind(this);
        Zx.handleJsonResponse = this.handleJsonResponse.bind(this);

        this.init(Zx)
    }

    init(Zx) {
        $.get = function (url, data, success, dataType) {
            let options = {
                type: 'GET',
                url: url,
            };

            if (typeof data === 'function') {
                dataType = success;
                success = data;
                data = null
            }

            if (typeof success === 'function') {
                options.success = success;
            }

            if (typeof data === 'object') {
                options.data = data
            }

            if (dataType) {
                options.dataType = dataType;
            }

            return $.ajax(options)
        };

        $.post = function (options) {
            options.type = 'POST';
            Object.assign(options.data, {_token: Zx.token});

            return $.ajax(options);
        };

        $.delete = function (options) {
            options.type = 'POST';
            options.data = {_method: 'DELETE', _token: Zx.token};

            return $.ajax(options);
        };

        $.put = function (options) {
            options.type = 'POST';
            Object.assign(options.data, {_method: 'PUT', _token: Zx.token});

            return $.ajax(options);
        };
    }

    handleAjaxError(xhr, text, msg) {
        let Zx = this.zx,
            json = xhr.responseJSON || {},
            _msg = json.message;

        Zx.NP.done();
        Zx.loading(false);// 关闭所有loading效果
        $('.btn-loading').buttonLoading(false);

        switch (xhr.status) {
            case 500:
                return Zx.error(_msg || (Zx.lang['500'] || 'Server internal error.'));
            case 403:
                return Zx.error(_msg || (Zx.lang['403'] || 'Permission deny!'));
            case 401:
                if (json.redirect) {
                    return location.href = json.redirect;
                }
                return Zx.error(Zx.lang['401'] || 'Unauthorized.');
            case 301:
            case 302:
                console.log('admin redirect', json);
                if (json.redirect) {
                    return location.href = json.redirect;
                }
                return;
            case 419:
                return Zx.error(Zx.lang['419'] || 'Sorry, your page has expired.');

            case 422:
                if (json.errors) {
                    try {
                        var err = [], i;
                        for (i in json.errors) {
                            err.push(json.errors[i].join('<br/>'));
                        }
                        Zx.error(err.join('<br/>'));
                    } catch (e) {}
                    return;
                }
                break;
            case 0:
                return;
        }

        Zx.error(_msg || (xhr.status + ' ' + msg));
    }

    // 处理接口返回数据
    handleJsonResponse(response, options) {
        let Zx = this.zx,
            data = response.data;

        if (! response) {
            return;
        }

        if (typeof response !== 'object') {
            return Zx.error('error', 'Oops!');
        }

        var then = function (then) {
            switch (then.action) {
                case 'refresh':
                    Zx.reload();
                    break;
                case 'download':
                    window.open(then.value, '_blank');
                    break;
                case 'redirect':
                    Zx.reload(then.value || null);
                    break;
                case 'location':
                    setTimeout(function () {
                        if (then.value) {
                            window.location = then.value;
                        } else {
                            window.location.reload();
                        }
                    }, 1000);
                    break;
                case 'script':
                    (function () {
                        eval(then.value);
                    })();
                    break;
            }
        };

        if (typeof response.html === 'string' && response.html && options.target) {
            if (typeof options.html === 'function') {
                // 处理api返回的HTML代码
                options.html(options.target, response.html, response);
            } else {
                $(target).html(response.html);
            }
        }

        let message = data.message || response.message;

        // 判断默认弹窗类型.
        if (! data.type) {
            data.type = response.status ? 'success' : 'error';
        }

        if (typeof message === 'string' && data.type && message) {
            if (data.alert) {
                Zx.swal[data.type](message, data.detail);
            } else {
                Zx[data.type](message, null, data.timeout ? {timeOut: data.timeout*1000} : {});
            }
        }

        if (data.then) {
            then(data.then);
        }
    }
}
