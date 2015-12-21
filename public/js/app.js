"use strict";

var cartRowTemp = {
    id: '',
    title: '',
    price: '',
    quantity: 1,
    options: {
        size: 's',
        ingredients: {
            
        }
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
                    $('.auth_popup form').find('#auth_first_name').value(data.first_name);
                    $('.auth_popup form').find('#auth_last_name').value(data.last_name);
                    $('.auth_popup form').find('#auth_city').value(data.city);
                    $('.auth_popup form').find('#auth_street').value(data.street);
                    $('.auth_popup form').find('#auth_street_number').value(data.street_number);
                    $('.auth_popup form').find('#auth_home_number').value(data.home_number);
                    $('.auth_popup form').find('#auth_floor').value(data.floor);
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
        $('.auth_popup').is('.auth_popup') ? $('.auth_popup').addClass('show') :  window.location.pathname = '/menu';
    });

    $('.order_button').on('click', function(e){

        checkAuth(function(data){
            if (data){
                 $.ajax({
                    type: 'POST',
                    url: '/menu/single',
                    data: {
                        'id': $(this).parents('.item').attr('data-id'),
                        'category': $('.menu-tab.active').attr('id').replace('-tab', ''),
                        'price': $(this).attr('data-size')
                    },
                    success: function(data) {
                        if (data){
                            
                           data.prepend('body');
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

function checkAuth(handleData){
    $.ajax({
        type: 'POST',
        url: '/auth/check',
        success: function(data){
            handleData(data);
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
