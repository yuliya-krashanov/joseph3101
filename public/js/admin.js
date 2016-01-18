"use strict";

$(document).ready(function(){

    $('select#product_id').on('change', function(){
        $.ajax({
            type: 'POST',
            url: '/admin/product/price',
            data: {'product_id': $(this).val(), '_token':$('input[name=_token]').val() },
            success: function(data) {
                var price = $('input[id="product.price"]').val(data.price);
                var sale = $('input#sale_price').val(),
                    percent;
                if (sale !== '') {
                    percent = sale/price * 100;
                    $('input#sale_percent').val(percent);
                }

            },
            error: function(data) { // the data parameter here is a jqXHR instance
                var errors = data.responseJSON;
                console.log('server errors',errors);
            }
        });
    });
});



$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
