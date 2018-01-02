import {tools_utils} from './utils.js';

export const tools_modal = {
    init: function () {
        this.confirmDeleteBS($('#modal-confirm-delete'));
        this.confirmDeleteNotify($('.btn-confirm-delete'));
        this.showDescriptionBS($('#modal-book-description'));
    },
    confirmDeleteBS: function ($tag) {
        $tag.on('shown.bs.modal', function (e) {
            $(this).find('#btn-confirm-delete-ok').one('click', function () {
                $tag.modal('hide');
                $.busyLoadFull("show");

                $.ajax({
                    url: $(e.relatedTarget).data('href'),
                    data: {_method: "DELETE"},
                    type: "DELETE",
                    dataType: "json",
                    success: function (result) {
                        tools_utils.handleResult(result);
                        $(e.relatedTarget).parents('.list-group-item').remove()
                    },
                    error: function (xhr, textStatus, thrownError) {
                        tools_utils.notfiyError(textStatus + '<br>' + thrownError);
                    }
                })
                    .always(function () {
                        $.busyLoadFull("hide");
                    });

            });
        });
        $tag.on('hide.bs.modal', function (e) {
            $(this).find('#btn-confirm-delete-ok').off('click');
        });
    },
    confirmDeleteNotify: function ($tag) {
        $tag.on('click', function (e) {
            let $currentTag = $(this);
            let deleteCallback = function () {
                $.busyLoadFull("show");

                $.ajax({
                    url: $(e.currentTarget).data('href'),
                    data: {_method: "DELETE"},
                    type: "DELETE",
                    dataType: "json",
                    success: function (result) {
                        tools_utils.handleResult(result);
                        let lgi = $currentTag.parents('.list-group-item');
                        lgi.slideUp(1000, function () {
                            lgi.remove();
                        });
                    },
                    error: function (xhr, textStatus, thrownError) {
                        tools_utils.notfiyError(textStatus + '<br>' + thrownError);
                    }
                })
                    .always(function () {
                        $.busyLoadFull("hide");
                    });
            };

            tools_utils.notifyConfirm(deleteCallback);

        });
    },
    showDescriptionBS: function ($tag) {
        $tag.on('shown.bs.modal', function (e) {
            let desc = $(e.relatedTarget).data('description');
            console.info(desc);
            $(this).find('.modal-body .book-description').html(desc);
        });
    },
}