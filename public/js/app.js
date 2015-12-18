"use strict";

$(document).ready(function(){

    changeActiveItemMenu();

    autocompleteCityandStreet();

    $('.navbar li.order a').on('click', function(){
        $('.auth_popup').addClass('show');
    });

    $('.auth_popup form').on('submit', function(e){

        $.ajax({
            type: 'POST',
            url: '/menu',
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
