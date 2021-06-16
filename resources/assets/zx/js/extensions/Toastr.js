
export default class Toastr {
    constructor(Zx) {
        let _this = this;

        Zx.success = _this.success;
        Zx.error = _this.error;
        Zx.info = _this.info;
        Zx.warning = _this.warning;
    }

    success(message, title, options) {
        toastr.success(message, title, options);
    }

    error(message, title, options) {
        toastr.error(message, title, options);
    }

    info(message, title, options) {
        toastr.info(message, title, options);
    }

    warning(message, title, options) {
        toastr.warning(message, title, options);
    }
}
