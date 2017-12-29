export const tools_utils = {

    init: function () {
        iziToast.settings({
            timeout: 1000,
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            position: 'topRight'
        });

        this.addCsrf();
    },
    addCsrf: function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    },
    notfiySuccess: function (message, cb) {
        iziToast.success({
            message: message,
            onClosing: function () {
                tools_utils.callback(cb);
            }
        });
    },
    notfiyWarning: function (message, cb) {
        iziToast.warning({
            message: message,
            onClosing: function () {
                tools_utils.callback(cb);
            }
        });
    },
    notfiyError: function (message, cb) {
        iziToast.error({
            message: message,
            onClosing: function () {
                tools_utils.callback(cb);
            }
        });
    },
    notfiyInfo: function (message, cb) {
        iziToast.info({
            message: message,
            onClosing: function () {
                tools_utils.callback(cb);
            }
        });
    },
    callback: function(cb) {
        if (!this.isUndefined(cb)) {
            cb();
        }
    },
    getCallback: function(cb) {
        if (this.isUndefined(cb)) {
            cb = this.emptyFn();
        }
        return cb;
    },
    notifyConfirm: function (cb) {
        iziToast.question({
            timeout: 10000,
            close: false,
            overlay: true,
            toastOnce: true,
            id: 'question',
            zindex: 999,
            message: 'Are you sure about that?',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {
                    instance.hide(toast, {transitionOut: 'fadeOut'}, 'button');
                    tools_utils.callback(cb);
                }, true],
                ['<button>NO</button>', function (instance, toast) {
                    instance.hide(toast, {transitionOut: 'fadeOut'}, 'button');
                }]
            ]
        });
    },
    handleResult: function (result, cb) {
        if (result.success) {
            if (result && result.message) {
                this.notfiySuccess(result.message, this.getCallback(cb));
            }
        } else {
            this.notfiyError(result.message, this.emptyFn());
        }
    },
    isUndefined: function (val) {
        return typeof val === 'undefined' ? true : false;
    },
    emptyFn: function () {
    },
    reload: function () {
        location.reload(true);
    }
}