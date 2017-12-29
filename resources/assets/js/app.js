/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
	el: '#app'
});



$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function () {
	$('#modal-confirm-delete').on('shown.bs.modal', function (e) {

		$(this).find('#btn-confirm-delete-ok').on('click', function () {

			$(".modal-content").busyLoad("show");
			$.ajax({
				url: $(e.relatedTarget).data('href'),
				data: {_method: "DELETE"},
				type: "DELETE",
				dataType: "json",
			})
				.done(function (json) {
					$('#modal-confirm-delete').modal('hide');
					location.reload(true);
				})
				.fail(function (xhr, status, errorThrown) {
					alert("Sorry, there was a problem!");
					console.log("Error: " + errorThrown);
					console.log("Status: " + status);
					console.dir(xhr);
				})
				.always(function (xhr, status) {
					// alert( "The request is complete!" );
					$(".modal-content").busyLoad("hide");
				});
		});
	});
});