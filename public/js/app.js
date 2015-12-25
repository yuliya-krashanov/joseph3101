"use strict";

var cartRowTemp = {
    id: '',
    title: '',
    price: '',
    quantity: 1,
    options: {

    }
};

$(document).ready(function(){

    changeActiveItemMenu();

    autocompleteCityandStreet();

    var phoneInput = $('.auth_popup form .mobile_number_box input');

    phoneInput.keypress(function(e) {
      e = e || event;
      var chr = getChar(e);

      if (e.ctrlKey || e.altKey || chr == null) return; // специальная клавиша
      if ( ! ((chr >= '0' && chr <= '9') || chr == '(' || chr == ')' || chr == '.' || chr == ' ' || chr == '+') ) return false;
    });

    // клавиатура, вставить/вырезать клавиатурой
    phoneInput.keyup(function(e){
      var phoneValue = $(this).val();
      var phone = phoneValue.replace(/[^0-9]/g, '');
      if (phone.length > 9){
        $.ajax({
            type: 'PUT',
            url: '/auth',
            data: { 'phone' : phone },
            success: function(data) {
                if (data.success){
                    $('.auth_popup form').find('#auth_first_name').val(data.first_name);
                    $('.auth_popup form').find('#auth_last_name').val(data.last_name);
                    $('.auth_popup form').find('#auth_city').val(data.city);
                    $('.auth_popup form').find('#auth_street').val(data.street);
                    $('.auth_popup form').find('#auth_street_number').val(data.street_number);
                    $('.auth_popup form').find('#auth_home_number').val(data.home_number);
                    $('.auth_popup form').find('#auth_floor').val(data.floor);
                }
            },
            error: function(data) { // the data parameter here is a jqXHR instance
                var errors = data.responseJSON;
                console.log('server errors',errors);
            }
        });
      }
    });

    //// любые действия, кроме IE. В IE9 также работает, кроме удаления
    //phoneInput.input = calculate;
    //
    //phoneInput.onpropertychange = function() { // для IE8- изменение значения, кроме удаления
    //  event.propertyName == "value" && calculate();
    //}

    $('.navbar li.order a').on('click', function(){
        $('body').is('.auth_popup') ? $('.auth_popup').addClass('show') :  window.location.pathname = '/menu';
    });

    $(document).on('click', '.add_to_cart_popup', function(e){
        if (e.target.className == 'add_to_cart_popup show'){
            cartRowTemp = {
                id: '',
                title: '',
                price: '',
                quantity: 1,
                options: {
                }
            };
            $('.add_to_cart_popup').removeClass('show').remove();
        }
    });

    $(document).on('click', '.comments_popup', function(e){
        if (e.target.className == 'comments_popup show'){
            $('.comments_popup').removeClass('show').remove();
        }
    });

    $('.order_button').on('click', function(e){

        checkAuth($(this), function(el, data){

            console.log(data);
            if (data == 1){

                 var id = el.parents('.item').attr('data-id'),
                     category = $('.menu-tab.active').attr('id').replace('-tab', ''),
                     price = el.attr('data-size');

                 $.ajax({
                    type: 'POST',
                    url: '/menu/product',
                    data: {
                        'id': id,
                        'category': category,
                        'price': price
                    },
                    success: function(data) {
                        if (data.popup){
                           $('body').prepend(data.popup);
                           cartRowTemp.id = data.product.id;
                           cartRowTemp.title = data.product.title;
                           cartRowTemp.price = data.product['price_' + price];

                           if (category == 'pizzas') cartRowTemp.options.size = price;
                        }
                    },
                    error: function(data) { // the data parameter here is a jqXHR instance
                        var errors = data.responseJSON;
                        console.log('server errors',errors);
                    }
                });
               
            }
            else  $('.auth_popup').addClass('show');
        });

    });

    $(document).on('click', '.ingredient .item_list li button', function(e){
        var side = $(this).attr('data-side'),
            id = $(this).parent().attr('data-id');

        $.ajax({
            type: 'POST',
            url: '/menu/ingredient',
            data: {
                'id': id
            },
            success: function(data) {
                if (data.ingredient){
                    var price = (side == 'full') ?   data.ingredient.price : data.ingredient.price / 2;
                    (cartRowTemp.options.ingredients) ? cartRowTemp.options.ingredients.push( { "id": id, "price": price, "side": side } ) : cartRowTemp.options.ingredients = [ { "id": id, "price": price, "side": side } ];
                    $('.price_menu ul').append('<li class="other_price">$' + price +'<small>Add on '+ side +'</small><span>' + data.ingredient.title + '</span></li>');
                    $('.add_to_cart_popup .add_to_cart .total .number').text(totalItemPrice());
                }
            },
            error: function(data) { // the data parameter here is a jqXHR instance
                var errors = data.responseJSON;
                console.log('server errors',errors);
            }
        });
    });

    $(document).on('click', '.add_to_cart_popup .cart_btn', function(e){

        addToCart(cartRowTemp, function(data){
            if (data)
               window.location.pathname = '/menu';
        });

    });

    $('.place_my_order').on('click', function(e){
        $.ajax({
            type: 'POST',
            url: '/menu/add-to-go',
            success: function(data) {
                if (data.popup){
                    $('body').prepend(data.popup);
                    cartRowTemp.id = data.product.id;
                    cartRowTemp.title = data.product.title;
                    cartRowTemp.price = data.product['price_s'];
                    cartRowTemp.options.size = 's';
                }
            },
            error: function(data) { // the data parameter here is a jqXHR instance
                var errors = data.responseJSON;
                console.log('server errors',errors);
            }
        });
    });

    $('.payment_bg button.cash').on('click', function(e){
        $.ajax({
            type: 'POST',
            url: '/order/send-sms',
            success: function(data) {
                if (data.success){
                    $('.payment_bg > p').remove();
                    $('.payment_bg').append('<p class="checking-code-wrap"><input name="number" type="text" id="checking-code" placeholder="Number"><span></span><button class="check-code">Check code</button></p>');
                }
            },
            error: function(data) { // the data parameter here is a jqXHR instance
                var errors = data.responseJSON;
                console.log('server errors',errors);
            }
        });
    });

    $(document).on('click', '.payment_bg button.check-code', function(){

        var code = $('.payment_bg #checking-code').val();

        if(!code){
            return false;
        }
        else{
            $.ajax({
                type: 'POST',
                url: '/order/cash',
                data: {'code': code},
                success: function(data) {
                    if (data.code){
                        window.location.pathname = 'order/thank-you/' + data.order;
                    }
                    else{
                        $('.checking-code-wrap input').val('');
                        $('.checking-code-wrap span').text('Wrong code. Try again');
                    }
                },
                error: function(data) { // the data parameter here is a jqXHR instance
                    var errors = data.responseJSON;
                    console.log('server errors',errors);
                }
            });
        }
    });

    $(document).on('click', '.add_to_go_popup button.no-thank', function(e){

        $('.add_to_go_popup').remove();
        cartRowTemp = {
            id: '',
            title: '',
            price: '',
            quantity: 1,
            options: {
            }
        };

        $.ajax({
            type: 'POST',
            url: '/menu/comment',
            success: function(data) {
                if (data.popup){
                    $('body').prepend(data.popup);
                }
            },
            error: function(data) { // the data parameter here is a jqXHR instance
                var errors = data.responseJSON;
                console.log('server errors',errors);
            }
        });


    });
    $(document).on('click', '.add_to_go_popup button.yes-add', function(e){
        $('.add_to_go_popup').remove();

        addToCart(cartRowTemp, function(data){
            $.ajax({
                type: 'POST',
                url: '/menu/comment',
                success: function(data) {
                    if (data){
                        $('body').prepend(data.popup);
                    }
                },
                error: function(data) { // the data parameter here is a jqXHR instance
                    var errors = data.responseJSON;
                    console.log('server errors',errors);
                }
            });
        });

    });

    $(document).on('click', '.comments_popup button', function(e){
        var comment = $('.comments_popup textarea').val();

        if (comment !== ''){

            $.ajax({
                type: 'PUT',
                url: '/menu/comment',
                data: {'comment': comment},
                success: function(data) {
                    if (data.success){
                        window.location.pathname = '/cart';
                    }
                },
                error: function(data) { // the data parameter here is a jqXHR instance
                    var errors = data.responseJSON;
                    console.log('server errors',errors);
                }
            });
        }else{
            window.location.pathname = '/cart';
        }
    });

    $('.auth_popup form').on('submit', function(e){

        $.ajax({
            type: 'POST',
            url: '/auth',
            data: $(this).serialize(),
            success: function(data) {
                if (data.success){
                    window.location.pathname = '/menu';
                }
            },
            error: function(data) { // the data parameter here is a jqXHR instance
                var errors = data.responseJSON;
                console.log('server errors',errors);
            }
        });
        e.preventDefault();

    })

    $('.home-popup-button').on('click', function(){

        var todo = $(this).attr('data-value');

        $.ajax({
            type: 'POST',
            url: '/',
            data: {'todo': todo},
            success: function(data) {
                if (data.todo = 'no'){
                    $('.deal.popup').removeClass('show');
                }
            },
            error: function(data) { // the data parameter here is a jqXHR instance
                var errors = data.responseJSON;
                console.log('server errors',errors);
            }
        });

        e.preventDefault();
    });

    $('.friend_from select#status').on('change', function(){

        if ($(this).val() == 'married')
            $('.friend_from .friend-register.partner').show();
        else
            $('.friend_from .friend-register.partner').hide();

    });

    $('.menu_page_color .sub_menu li a').on('click', function(e){
        e.preventDefault();
        var category = $(this).attr('id');
        var categ_name = $(this).text();
        $(this).parent().addClass('active').siblings('li').removeClass('active');
        $('.main-menu-page .menu-tab').removeClass('active');
        $('.main-menu-page .top_red h3').text(categ_name);
        $('#' + category + '-tab').addClass('active');
    });

});

function addToCart(cartRow, handleData){
    $.ajax({
        type: 'POST',
        url: '/cart/add',
        data: {
            'row': cartRow,
            'total': totalItemPrice()
        },
        success: function(data) {
            handleData(data);
        },
        error: function(data) { // the data parameter here is a jqXHR instance
            var errors = data.responseJSON;
            console.log('server errors',errors);
        }
    });
}

// event.type must be keypress
function getChar(event) {
  if (event.which == null) {
    return String.fromCharCode(event.keyCode) // IE
  } else if (event.which!=0 && event.charCode!=0) {
    return String.fromCharCode(event.which)   // the rest
  } else {
    return null // special key
  }
}

function checkAuth(el, handleData){
    $.ajax({
        type: 'POST',
        url: '/auth/check',
        success: function(data){
            handleData(el, data);
        },
        error: function(data) { // the data parameter here is a jqXHR instance
            var errors = data.responseJSON;
            console.log('server errors',errors);
        }
    });
}

function changeActiveItemMenu(){

    var href = ( window.location.pathname == '/') ? window.location.origin : window.location.href;

    $('#navbar ul li a').each(function(){
        if ( $(this).attr('href') == href ){
            $(this).parent().addClass('act');
        }
    });
}

function totalItemPrice(){
    var total = cartRowTemp.price;
    if (cartRowTemp.options.ingredients){
        cartRowTemp.options.ingredients.forEach(function(ingredient, i, arr) {
            total += ingredient.price;
        });
    }
    return total;
}

function autocompleteCityandStreet(){

    var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substringRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str) {
                if (substringRegex.test(str)) {
                    matches.push(str);
                }
            });

            cb(matches);
        };
    };

    var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
        'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
        'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
        'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
        'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
        'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
        'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
        'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
        'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
    ];

    $(".friend_from #address_city").typeahead({
            hint: false,
            highlight: true,
            minLength: 1
        },
        {
            name: 'states',
            source: substringMatcher(states)
        });

    $(".friend_from #address_street").typeahead({
            hint: false,
            highlight: true,
            minLength: 1
        },
        {
            name: 'states',
            source: substringMatcher(states)
        });

}
