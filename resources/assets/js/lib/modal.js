import {tools_utils} from './utils.js';

export const tools_modal = {
    init: function () {
        this.confirmDeleteBS($('#modal-confirm-delete'));
        this.confirmDeleteNotify($('.btn-confirm-delete'));
    },
    confirmDeleteBS: function ($tag) {
        $tag.on('shown.bs.modal', function (e) {
            $(this).find('#btn-confirm-delete-ok').on('click', function () {

                $tag.modal('hide');
                $.busyLoadFull("show");

                $.ajax({
                    url: $(e.relatedTarget).data('href'),
                    data: {_method: "DELETE"},
                    type: "DELETE",
                    dataType: "json",
                    success: function (result) {
                        $.busyLoadFull("hide");
                        tools_utils.handleResult(result, tools_utils.reload);
                    },
                    error: function (xhr, textStatus, thrownError) {
                        tools_utils.notfiyError(textStatus + '<br>' + thrownError);
                    }
                });

            });
        });
    },
    confirmDeleteNotify: function ($tag) {
        $tag.on('click', function (e) {

            let deleteCallback = function() {
                $.busyLoadFull("show");

                $.ajax({
                    url: $(e.currentTarget).data('href'),
                    data: {_method: "DELETE"},
                    type: "DELETE",
                    dataType: "json",
                    success: function (result) {
                        $.busyLoadFull("hide");
                        tools_utils.handleResult(result, tools_utils.reload);
                    },
                    error: function (xhr, textStatus, thrownError) {
                        tools_utils.notfiyError(textStatus + '<br>' + thrownError);
                    }
                });
            };

            tools_utils.notifyConfirm(deleteCallback);

        });
    }
}