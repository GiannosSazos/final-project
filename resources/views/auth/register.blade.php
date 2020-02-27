@extends('layouts.app')

@section ('page_heading')
    <center>
        Register to Vendor Store
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
                        <label for="restaurant_name" class="label">{{ __('Restaurant Name') }}</label>

                        <div class="control has-icons-left">
                            <input id="restaurant_name" type="text" class="input is-rounded @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" autocomplete="restaurant_name" >
                            <span class="icon is-small is-left">
                                <ion-icon name="restaurant"></ion-icon>
                            </span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="restaurant_address" class="label">{{ __('Restaurant Address') }}</label>

                        <div class="control has-icons-left">
                            <input id="restaurant_address" type="string" class="input is-rounded @error('restaurant_address') is-invalid @enderror" name="restaurant_address" value="{{ old('restaurant_address') }}"  autocomplete="restaurant_address" >
                            <span class="icon is-small is-left">
                                <ion-icon name="briefcase"></ion-icon>
                            </span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="restaurant_telephone" class="label">{{ __('Work Telephone') }}</label>

                        <div class="control has-icons-left">
                            <input id="restaurant_telephone" type="text" class="input is-rounded @error('restaurant_telephone') is-invalid @enderror" name="restaurant_telephone" value="{{ old('restaurant_telephone') }}"  autocomplete="restaurant_telephone" >
                            <span class="icon is-small is-left">
                                <ion-icon name="call"></ion-icon>
                            </span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="personal_address" class="label">{{ __('Personal Address') }}</label>

                        <div class="control has-icons-left">
                            <input id="personal_address" type="text" class="input is-rounded @error('personal_address') is-invalid @enderror" name="personal_address" value="{{ old('personal_address') }}" required autocomplete="personal_address" >
                            <span class="icon is-small is-left">
                                <ion-icon name="home"></ion-icon>
                            </span>
                            @error('personal_address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="personal_telephone" class="label">{{ __('Personal Telephone') }}</label>

                        <div class="control has-icons-left">
                            <input id="personal_telephone" type="text" class="input is-rounded @error('personal_telephone') is-invalid @enderror" name="personal_telephone" value="{{ old('personal_telephone') }}" required autocomplete="personal_telephone" >
                            <span class="icon is-small is-left">
                                <ion-icon name="phone-portrait"></ion-icon>
                            </span>
                            @error('personal_telephone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="label">{{ __('E-Mail') }}</label>

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
                    <br>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="button is-primary">
                                {{ __('Register') }}
                            </button>
                            <a class="button is-secondary" href="/final-project/public/">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
