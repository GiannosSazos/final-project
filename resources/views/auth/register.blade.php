@extends('layouts.app')

@section ('page_heading')
    <center>
        Register to Car Dealership
    </center>
@endsection

@section('content')
    <div class="container">

        <div class="box">


            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="label">{{ __('Name') }}</label>

                        <div class="control has-icons-left">
                            <input id="name" type="text" class="input is-rounded @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <span class="icon is-small is-left">
                            <ion-icon name="person"></ion-icon>
                          </span>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                        <div class="control has-icons-left">
                            <input id="email" type="email" class="input is-rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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

                    <div class="form-group row">
                        <label for="password" class="label">{{ __('Password') }}</label>

                        <div class="control has-icons-left">
                            <input id="password" type="password" class="input is-rounded @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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

                    <div class="form-group row">
                        <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

                        <div class="control has-icons-left">
                            <input id="password-confirm" type="password" class="input is-rounded" name="password_confirmation" required autocomplete="new-password">
                            <span class="icon is-small is-left">
                            <ion-icon name="key"></ion-icon>
                          </span>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="button is-primary">
                                {{ __('Register') }}
                            </button>
                            <a class="button is-secondary" href="/awp-1-giannossazos/public/">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
