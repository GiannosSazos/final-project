@component('mail::message')
    Hello, {{Auth::user()->name}}

    Your order has been placed successfully. We will keep you updated!

    You can click the button below to review your order. In order to make changes or cancel it, you will need to contact us via email.

    Thank you for choosing us!
    @component('mail::button', ['url' => 'http://localhost/final-project/public/my_profile/'])
        View My Order
    @endcomponent
@endcomponent
