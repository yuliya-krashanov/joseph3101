"use strict";

$(document).ready(function(){

    changeActiveItemMenu();

    autocompleteCityandStreet();

    $('.navbar li.order a').on('click', function(){
        var orderPopup = '<div class="big_popup">' +
        + '<div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="left-image">
                    <h2>Delivery Details</h2>
                    <img src="img/pizza-pack.png" class="img-responsive"/>
                </div>
            </div>
            <!-------->
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="mobile_number_box">
                    <input id="author" class="popup_input" name="name" type="text" placeholder="Mobile/Phone Number"/>
                </div>
                <!------------>
                <div class="first_last">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <input id="author" class="name_input" name="name" type="text" placeholder="Last Name"/>
                    </div>
                    <!------>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <input id="author" class="name_input" name="name" type="text" placeholder="First Name"/>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!------------>
                <div class="contineue">
                    <!------>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                        <input id="author" class="name_input" name="name" type="text" placeholder="Last Name"/>
                    </div>
                    <!------>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                        <input id="author" class="name_input" name="name" type="text" placeholder="City"/>
                    </div>
                    
                    <!------>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                        <input id="author" class="name_input" name="name" type="text" placeholder="Street Number"/>
                    </div>
                    <!------>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                        <input id="author" class="name_input" name="name" type="text" placeholder="Street"/>
                    </div>
                    
                    <!------>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                        <input id="author" class="name_input" name="name" type="text" placeholder="Floor"/>
                    </div>
                    <!------>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                        <input id="author" class="name_input" name="name" type="text" placeholder="Entrance"/>
                    </div>
                    <!------>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea id="comment" rows="8" class="aqua_input_comments" name="message" placeholder="Comments"></textarea>
                    <div style="text-align:center">
                        <a href="#" class="contineue_btn">Continue</a>
                    </div>    
                    </div>
                    <!------>  
                </div>';
    });

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
