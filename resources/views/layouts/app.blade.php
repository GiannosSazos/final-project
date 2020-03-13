<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-color: whitesmoke !important;
            min-height: 100vh;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="icon" type="image/png" href="{{ asset ('images/vendorfavicon.png') }}"/>
    <br><br>
    <title>
        @yield ('page_title', 'Vendor Store')
    </title>
    <link rel="stylesheet" href="{{ asset ('css/design.css') }}"/>
</head>
<body>
@if(Auth::check())
    <nav class="navbar is-dark is-fixed-top " role="navigation" aria-label="dropdown-navigation">
        <div class="navbar-start">
            <a class="navbar-item" href="{{url('home')}}"><img src="{{ asset ('images/vendornavbar.png') }}"></a>
            <a class="navbar-item" href="/final-project/public/home">Home</a>
            <a class="navbar-item">Contact Us</a>
            <a class="navbar-item">Report an Issue</a>
            @if ((Auth::user()->hasAnyRole('admin')))
                <a class="navbar-item" href="{{url('admin_panel')}}">Admin Panel</a>
            @endif
        </div>
        <nav class="navbar-end">
        @if (Auth::user()->restaurant_name !=null)
            <a class="navbar-item" href="basket" >
            <ion-icon style="color:white; height: 35px; width: 35px;" size="large" name="basket"></ion-icon>
        <span class="badge" style="color: white">{{Session::has('basket') ? Session::get('basket')->totalQty:'0'}}</span>
        </a>
        @endif
        </nav>
        <div class="navbar-item is-hoverable has-dropdown">
            <a style="color: white" class="navbar-link is-arrowless"> <ion-icon style="color:white; height: 40px; width: 40px;" size="large" name="person"></ion-icon>{{Auth::user()->name}}

            </a>
            <div class="navbar-dropdown is-right is-boxed ">

                <a class="navbar-item" href="/final-project/public/my_profile/">Profile</a>
                <hr class="navbar-divider">
                <a class="navbar-item" style="color:red" href="/final-project/public/logout">Log out</a>
            </div>

        </div>
    </nav>
    <br>
@endif
<div class="container">
    <h1 class="title">
        @yield ('page_heading', 'Vendor Store')
    </h1>
    @yield ('content')
</div>
</body>
</html>
