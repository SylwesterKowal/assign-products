var massProductsAction = function () {
    var checked = function () {
        displayContCheckedProduct();
        $('.checkboxes').on('click', function () {
            var count = 0;
            var ids = [];
            $('input.checkboxes[type=checkbox]').each(function () {
                var sThisVal = (this.checked ? $(this).attr('data-id') : "");
                if (sThisVal != '') {
                    count++;
                    ids.push(sThisVal);
                }
            });
            $('#selected-records').html(count);
            var userFirmId = $(this).attr('data-user-firm-id');
            var url = $(this).attr('data-url');
            setIds(count, ids, userFirmId, url);
        });

        $('.all-checkboxes').on('click', function () {
            var count = 0;
            var ids = [];
            var userFirmId = $(this).attr('data-user-firm-id');
            var url = $(this).attr('data-url');

            if (this.checked) {

                $('input.checkboxes[type=checkbox]').each(function () {
                    $(this).prop('checked', true);
                    $(this).parent().addClass('checked');
                    ids.push($(this).attr('data-id'));
                    count++;
                });
            } else {
                $('input.checkboxes[type=checkbox]').each(function () {
                    $(this).prop('checked', false);
                    $(this).parent().removeClass('checked');
                });
                count = 0;
            }
            $('#selected-records').html(count);
            setIds(count, ids, userFirmId, url);
        });

        function displayContCheckedProduct() {
            var count_ = 0;
            $('input.checkboxes[type=checkbox]').each(function () {
                if (this.checked) {
                    count_++;
                }
            });
            $('#selected-records').html(count_);
        }

        function setIds(count, ids, userFirmId, url) {
            if (count >= 1) {
                $('#selectedProductIds').val();

                App.blockUI({
                    target: 'body',
                    animate: true
                });

                $.ajax({
                    type: 'put',
                    url: url,
                    dataType: 'json',
                    data: {
                        user_firm_id: userFirmId,
                        product_ids: JSON.stringify(ids)
                    },
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        App.unblockUI();
                        if (data.error == 0 && data.success == 1) {
                            if (data.hasOwnProperty('ids')) {
                                for (var key in data.ids) {
                                    var product_checkbox = $("#product_id_" + data.ids[key]);
                                    console.log(product_checkbox);
                                    product_checkbox.prop("disabled", true);
                                    product_checkbox.addClass("disabled");

                                }
                            }
                        } else {
                            console.log("Przypisanie produktów nie powiodło się");
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(textStatus);
                        App.unblockUI();
                    }
                }).done(function () {
                    App.unblockUI();
                });
            } else {
                console.log("Proszę zaznaczyć produkty do przypisania");
            }
        }

    };

    return {
        init: function () {
            checked();
        }
    };
}();

jQuery(document).ready(function () {
    massProductsAction.init();
});