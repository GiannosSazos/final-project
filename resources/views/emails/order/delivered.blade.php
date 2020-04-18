@component('mail::message')
Hello, {{$order->name}}

Your order has been completed.

Time and Date delivered: {{\Carbon\Carbon::now()->toDateTimeString()}}

Thank you for choosing us!
@endcomponent
