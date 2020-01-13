<!DOCTYPE html>
@extends ('layouts.app')

@section ('page_title')
    Car Dealership
@endsection

@section ('page_heading')
    <center>
        Car Dealership
    </center>
@endsection

<!--Checks if someone who tries to access the webpage directly from the URL is logged in.-->
@if (Auth::check())



@section ('content')
    <center>


        <!--Filter Links-->
        <div  style="text-align: left;">
            Type:
            <a href="?type=small">Small</a> |
            <a href="?type=hatchback">Hatchback</a> |
            <a href="?type=sedan">Sedan</a> |
            <a href="?type=coupe">Coupe</a> |
            <a href="?type=SUV">SUV</a> |
            <a href="?type=MPV">MPV</a> |
            <a href="?type=Station Wagon">Station Wagon</a> |
            <a href="?type=convertible">Convertible</a><br>
            Transmission:
            <a href="?transmission=automatic">Automatic</a> |
            <a href="?transmission=manual">Manual</a>
            <br>
            Fuel Type:
            <a href="?fuel_type=diesel">Diesel</a> |
            <a href="?fuel_type=hybrid">Hybrid</a> |
            <a href="?fuel_type=gas">Gas</a> |
            <a href="?fuel_type=electric">Electric</a>
            <br>
            Doors:
            <a href="?doors=2">2</a> |
            <a href="?doors=4">4</a> |
            <a href="?doors=6">6</a>
        </div>

        <!--Sort Links-->
        <div style="text-align: right;">
            Ascending by:
            <a href="?price=asc">Price</a> |
            <a href="?year=asc">Year</a><br>
            Descending by:
            <a href="?price=desc">Price</a> |
            <a href="?year=desc">Year</a>
        </div>

        <!--Search Form-->
        <form action = "" method="POST">
            <fieldset>
                @csrf
                <input style="text-align:center;" class="input is-rounded" type="string" name="keyword" placeholder="Search Car by Model">
                <button style="margin:5px;"  class="button is-primary is-rounded"  type="submit"><ion-icon name="search"></ion-icon></button>
                <button style="margin:5px;" class="button is-secondary is-rounded" href="/"  >Show All Cars</button>
            </fieldset>
        </form>
        <br>

        <!--Making the table where all the data for the cars will be displayed-->
        <div class="box">

            <!--if there is data in the database, show the data...-->
            @if (count ($cars) > 0)

                <table class="table is-striped is-hoverable is-fullwidth">
                    <thead>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>

                    </thead>
                    <tbody>
                    @foreach ($cars as $c)
                        <tr>
                            <td>{{ $c -> model }}</td>
                            <td>{{ $c -> year }}</td>
                            <td>£{{$c -> price }}</td>

                            <!--View details button-->
                            <td>
                                <a class="button"
                                   href="car/{{ $c -> id }}/">
                                    <ion-icon name="eye"></ion-icon>
                                </a>
                            </td>

                            <!--Edit details button-->
                            <td>
                                <a class="button"
                                   href="car/{{ $c -> id }}/edit">
                                    <ion-icon name="create"></ion-icon>
                                </a>
                            </td>

                            <!--Delete Car from database button-->
                            <td>
                                <a class="button"
                                   href="car/{{ $c -> id }}/delete/">
                                    <ion-icon name="trash"></ion-icon>  </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!--Display the numbers for the pages-->
                {{$cars->links()}}


                <br>
                <!--Add car to database button-->
                <a style="margin:5px;" class="button is-primary is-rounded" href="add/">Add Car</a>

                <!--Log out button-->
                <a style="margin:5px;" class="button is-danger is-rounded" href="logout/">Log Out</a>

                <!--if there is not data in the database display this.-->
            @else


                <div class="notification is-info">
                    <p>
                        The inventroy is empty. Why not add a car?
                    </p>
                </div>
            @endif
        </div>
        </div>
        </div>
    </center>
@endsection

<!--If someone tries to access the webpage from the URL directly but is not logged in, he will be redirected to the login page.-->
@else
    <script>window.location='login/';</script>
@endif

