@component('mail::message')
Hello, {{$order->name}}

Your order scheduled to be delivered at {{$order->date}} has been cancelled. If you did not make such a request, please contact us at this email.

    Thank you for choosing us!

@endcomponent
