<!DOCTYPE html>
@extends ('layouts.app')

@section ('page_title')
    Car Dealership
@endsection

@section ('page_heading')

    <center>
        E-Mail Verification
    </center>

@endsection


@section ('content')
<div class="container" style="width: 500px" align="center">

            <div class="card">


                <div class="card-body">
                    @if (session('resent'))
                        <div class="notification is-primary" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                        {{ __('Almost done! We sent an email to') }}<br>
                        <b>{{Auth::user() -> email}}</b><br><br>
                    {{ __('Click the link in the E-Mail to complete your registration.') }}<br><br>
                    {{ __('Still can\'t find the E-Mail?') }}
                    <form  method="POST" action="{{ route('verification.resend') }}">
                        @csrf

                        <button type="submit " class="button is-primary is-rounded">{{ __('Resend E-Mail') }}</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>

@endsection
