Stripe.setPublishableKey('pk_test_qc0dt1IQEp2J11F3VMphragx00J37DUcbl');

var $form = $('#checkout-form');

$form.submit(function (event){
    $form.find('button').prop('disabled',true);
Stripe.card.createToken({
    number: $('#card-number').val(),
    cvc: $('#card-cvc').val(),
    exp_month: $('#card-month').val(),
    exp_year: $('#card-year').val(),
    name: $('#card-name').val(),
    address: $('#restaurant-address').val()
},stripeResponseHandler);
return false;
});

function  stripeResponseHandler(status,response) {
    if(response.error){
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled',false);
    }else{
        var token= response.id;
        $form.append($('<input type="hidden" name="stripeToken"/>').val(token));
        $form.get(0).submit();
    }
}
