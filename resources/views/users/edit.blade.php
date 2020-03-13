@extends('layouts.app')

@section ('page_heading')
    <center>
        Edit {{$user -> name}}'s Details
    </center>
@endsection

@section('content')
    <div class="container">

        <div class="box">


            <div class="card-body">
                <form method="POST" action="">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="label">{{ __('Name') }}</label>

                        <div class="control has-icons-left">
                            <input id="name" type="text" class="input is-rounded @error('name') is-invalid @enderror" name="name" value="{{ $user -> name }}" required autocomplete="name" readonly>
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
                            <input id="restaurant_name" type="text" class="input is-rounded @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{$user -> restaurant_name }}" autocomplete="restaurant_name" >
                            <span class="icon is-small is-left">
                                <ion-icon name="restaurant"></ion-icon>
                            </span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="restaurant_address" class="label">{{ __('Restaurant Address') }}</label>

                        <div class="control has-icons-left">
                            <input id="restaurant_address" type="string" class="input is-rounded @error('restaurant_address') is-invalid @enderror" name="restaurant_address" value="{{ $user -> restaurant_address}}"  autocomplete="restaurant_address" >
                            <span class="icon is-small is-left">
                                <ion-icon name="briefcase"></ion-icon>
                            </span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="restaurant_telephone" class="label">{{ __('Restaurant Telephone') }}</label>

                        <div class="control has-icons-left">
                            <input id="restaurant_telephone" type="text" class="input is-rounded @error('restaurant_telephone') is-invalid @enderror" name="restaurant_telephone" value="{{ $user -> restaurant_telephone }}"  autocomplete="restaurant_telephone" >
                            <span class="icon is-small is-left">
                                <ion-icon name="call"></ion-icon>
                            </span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="personal_address" class="label">{{ __('Personal Address') }}</label>

                        <div class="control has-icons-left">
                            <input id="personal_address" type="text" class="input is-rounded @error('personal_address') is-invalid @enderror" name="personal_address" value="{{ $user -> personal_address }}" required autocomplete="personal_address" >
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
                            <input id="personal_telephone" type="text" class="input is-rounded @error('personal_telephone') is-invalid @enderror" name="personal_telephone" value="{{ $user -> personal_telephone }}" required autocomplete="personal_telephone" >
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
                            <input id="email" type="email" class="input is-rounded @error('email') is-invalid @enderror" name="email" value="{{ $user -> email }}" required autocomplete="email">
                            <span class="icon is-small is-left">
                            <ion-icon name="mail"></ion-icon>
                          </span>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div><br>
                    @if (Auth::user()->id !== $user->id)
                    <div class="form-group row">
                        <label class="label">{{__('Role')}}</label>
                        @foreach($roles as $role)
                            <input value="{{$role->id}}" name="role" class="role" type="radio" {{$user->hasAnyRole($role->name)?'checked':''}}>
                            {{$role->name}}&nbsp;
                        @endforeach
                    </div>
                    <br>
                    @endif
                    <div class="form-group row">
                        <label for="password" class="label">{{ __('Please enter your password to confirm the changes') }}</label>
                        <div class="control has-icons-left">
                            <input id="current_password" type="password" class="input is-rounded @error('password') is-invalid @enderror" name="current_password" required>
                            <span class="icon is-small is-left">
                            <ion-icon name="key"></ion-icon>
                          </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            @if(session()->has('failure'))
                                <div class="notification is-danger">
                                    {{ session()->get('failure') }}
                                </div>
                            @endif

                        </div>
                    </div>
                    <br>
                            <button type="submit" class="button is-link is-rounded">
                                {{ __('Submit Changes') }}
                            </button>
                            <a class="button is-rounded" href="javascript:history.back()">
                                {{ __('Back') }}
                            </a>
                </form>
            </div>
        </div>
        @endsection
    </div>


