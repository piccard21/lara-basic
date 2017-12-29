export const tools_utils = {

	init: function () {
		iziToast.settings({
			timeout: 5000,
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
	notfiySuccess: function (message, callback) {
		iziToast.success({
			message: message,
			onClosing: function () {
				callback();
			}
		});
	},
	notfiyWarning: function (message, callback) {
		iziToast.warning({
			message: message,
			onClosing: function () {
				callback();
			}
		});
	},
	notfiyError: function (message, callback) {
		iziToast.error({
			message: message,
			onClosing: function () {
				callback();
			}
		});
	},
	notfiyInfo: function (message, callback) {
		iziToast.info({
			message: message,
			onClosing: function () {
				callback();
			}
		});
	},
	handleResult: function (result, callback) {
		if (this.isUndefined(callback)) {
			callback = this.emptyFn();
		}

		if (result.success) {
			if (result && result.message) {
				tools_utils.notfiySuccess(result.message, callback);
			}
		} else {
			tools_utils.notfiyError(result.message, this.emptyFn());
		}
	},
	isUndefined: function (val) {
		return typeof val === 'undefined' ? true : false;
	},
	emptyFn: function () {},
	reload: function () {
		location.reload(true);
	}

}