jQuery(function($) {
    $('.card-from form').submit(function(event) {
        var $form = $(this);

        // Before passing data to Stripe, trigger Parsley Client side validation
        $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
            formInstance.submitEvent.preventDefault();
            return false;
        });

        // Disable the submit button to prevent repeated clicks
        $form.find('#submitBtn').prop('disabled', true);

        Stripe.card.createToken($form, stripeResponseHandler);

        // Prevent the form from submitting with the default action
        return false;
    });
});

function stripeResponseHandler(status, response) {
    var $form = $('.card-from form');

    if (response.error) {
        // Show the errors on the form
        $form.find('.payment-errors').text(response.error.message);
        $form.find('.payment-errors').addClass('alert alert-danger');
        $form.find('#submitBtn').prop('disabled', false);
        $('#submitBtn').button('reset');
    } else {
        // response contains id and card, which contains additional card details
        var token = response.id;
        // Insert the token into the form so it gets submitted to the server
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        // and submit
        $form.get(0).submit();
    }
};