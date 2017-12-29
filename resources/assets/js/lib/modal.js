import {tools_utils} from './utils.js';

export const tools_modal = {
	init: function () {
		this.confirmDelete($('#modal-confirm-delete'));
	},
	confirmDelete: function ($tag) {

		$tag.on('shown.bs.modal', function (e) {

			$(this).find('#btn-confirm-delete-ok').on('click', function () {

				$(".modal-content").busyLoad("show");

				$.ajax({
					url: $(e.relatedTarget).data('href'),
					data: {_method: "DELETE"},
					type: "DELETE",
					dataType: "json",
					success: function (result) {

						$(".modal-content").busyLoad("hide");
						$('#modal-confirm-delete').modal('hide');

						tools_utils.handleResult(result, tools_utils.reload);
					},
					error: function (xhr, textStatus, thrownError) {
						tools_utils.notfiyError(textStatus + '<br>' + thrownError);
					}
				});

			});
		});
	}
}