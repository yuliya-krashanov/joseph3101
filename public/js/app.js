"use strict";

$(document).ready(function(){

    changeActiveItemMenu();

    autocompleteCityandStreet();

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
        console.log($(this).val());
        if ($(this).val() == 'married')
            $('.friend_from .friend-register.partner').show();
        else
            $('.friend_from .friend-register.partner').hide();

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
