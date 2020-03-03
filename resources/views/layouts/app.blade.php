
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{ asset ('images/vendorfavicon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />
    <br><br>
    <title>
        @yield ('page_title', 'Vendor Store')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset ('images/vendorfavicon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />

    <link rel="stylesheet" href="{{ asset ('css/design.css') }}" />

    @if(Auth::check())
    <nav class="navbar is-dark is-fixed-top" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">


            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">

                <a class="navbar-item" href="/final-project/public/home">
                    Home
                </a>
                <a class="navbar-item">
                    Contact Us
                </a>

                <a class="navbar-item">
                   About Us
                </a>
                <a class="navbar-item">
                    Report an Issue
                </a>
                @if ((Auth::user()->hasAnyRole('admin')))
                <a class="navbar-item" href="/final-project/public/admin_panel">
                    Admin Panel
                </a>
                    @endif
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-link is-round" href="/final-project/public/user/{{Auth::user()-> id}}">
                           Profile
                        </a>
                        <a class="button is-secondary is-round" href="/final-project/public/logout">
                            Log out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
        <br>
        @endif
</head>
<body>

<div class="container">
    <h1 class="title">
        @yield ('page_heading', 'Vendor Store')
    </h1>

    @yield ('content')

</div>

<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>
</html>
