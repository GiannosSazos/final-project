@extends ('layouts.app')

@section ('page_title')
    Vendor Shop
@endsection

@section ('page_heading')
    <center>
        Checkout
    </center>
@endsection
@section ('content')

    <form method="post">
        @csrf
        <div class="box">
            <div class="row">
                @if (Session::has('error'))
                <div id="charge-error" class="notification is-danger">
                    {{Session::get('error')}}
                </div>
                @endif
                <div class="form-group" id="checkout-form">
                    <label>Card Holder Name</label>
                    <input type="text" id="card-name" class="input is-rounded" name="name" value="{{Auth::user()->name}}"  required>
                </div>
                    <div class="form-group" id="checkout-form">
                        <label>Restaurant Address</label>
                        <input type="text" id="restaurant-address" class="input is-rounded" name="restaurant_address" value="{{Auth::user()->restaurant_address}}" readonly required>
                    </div>
                    <div class="form-group" id="checkout-form">
                        <label>Delivery Date</label>
                        <input type="text" id="date" class="input is-rounded" name="date" required>
                    </div>
                    <div class="form-group" id="checkout-form">
                        <label>Delivery Time</label>
                        <input type="text" id="time" class="input is-rounded" name="time"required>
                    </div>
                <div class="form-group">
                    <label>Card Number</label>
                    <input type="text" id="card-number" class="input is-rounded" required>
                </div>
                <div class="form-group">
                    <label>Expiration Month</label>
                    <input type="text" id="card-month" class="input is-rounded" required>
                </div>
                <div class="form-group">
                    <label>Expiration Year</label>
                    <input type="text" id="card-year" class="input is-rounded" required>
                </div>
                <div class="form-group">
                    <label>CVC</label>
                    <input type="text" id="card-cvc" class="input is-rounded" required>
                </div>
            </div>
            <br>
            Total Price: £{{$total}}
            <button type="submit" style="position:relative;left: 67%" href="checkout"
                    class="button is-rounded is-link">  {{ __('Submit') }}</button>
        </div>
    </form>
@endsection
@section('scripts')
    <script type="text/javascript" src="/javascripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{URL::to('/src/js/checkout.js')}}"></script>
@endsection










