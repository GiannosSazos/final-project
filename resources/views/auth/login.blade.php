@extends('layouts.app')
@section ('page_heading')
    <center>
        Login to Car Dealership
    </center>
@endsection
@section('content')
    <div class="container">

        <div class="box">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                    <div class="control has-icons-left">
                        <input id="email" type="email" class="input is-rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="icon is-small is-left">
                            <ion-icon name="mail"></ion-icon>
                          </span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="password" class="label">{{ __('Password') }}</label>

                    <div class="control has-icons-left">
                        <input id="password" type="password" class="input is-rounded @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="icon is-small is-left">
                            <ion-icon name="key"></ion-icon>
                          </span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="button is-primary">
                            {{ __('Login') }}
                        </button>


                        <a class="button is-secondary" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
