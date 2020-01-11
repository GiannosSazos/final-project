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


@if (Auth::check())



@section ('content')
    <center>
        <div class="box">

            <div style="text-align: left;">
                Type:
                <a href="?type=small">Small</a> |
                <a href="?type=hatchback">Hatchback</a> |
                <a href="?type=sedan">Sedan</a> |
                <a href="?type=coupe">Coupe</a> |
                <a href="?type=SUV">SUV</a> |
                <a href="?type=convertible">Convertible</a><br>
                Transmission:
                <a href="?transmission=automatic">Automatic</a> |
                <a href="?transmission=manual">Manual</a>
                <br>
                Fuel Type:
                <a href="?fuel_type=diesel">Diesel</a> |
                <a href="?fuel_Type=petrol">Petrol</a>
                <br>
                Doors:
                <a href="?doors=2">2</a> |
                <a href="?doors=4">4</a>
            </div>
            <div style="text-align: right;">
                Sort by Price:
                <a href="?price=asc">Ascending</a> |
                <a href="?price=desc">Descending</a><br>
                Sort by Year:
                <a href="?year=asc">Ascending</a> |
                <a href="?year=desc">Descending</a>
            </div>
            <form action = "" method="POST">

                <fieldset>

                    @csrf
                    <input style="text-align:center;" class="input is-rounded" type="string" name="keyword" placeholder="Search Car by Model">
                    <button style="margin:5px;"  class="button is-primary is-rounded"  type="submit"><ion-icon name="search"></ion-icon></button>
                    <button style="margin:5px;" class="button is-secondary is-rounded" href="/"  >Show All Cars</button>




                </fieldset>
            </form>
        </div>
        <div class="box">
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
                            <td>
                                <a class="button"
                                   href="car/{{ $c -> id }}/">
                                    <ion-icon name="eye"></ion-icon>
                                </a>
                            </td>
                            <td>
                                <a class="button"
                                   href="car/{{ $c -> id }}/edit">
                                    <ion-icon name="create"></ion-icon>
                                </a>
                            </td>
                            <td>
                                <a class="button"
                                   href="car/{{ $c -> id }}/delete/">
                                    <ion-icon name="trash"></ion-icon>  </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


                {{$cars->links()}}

                <br>
                <a style="margin:5px;" class="button is-primary is-rounded" href="add/">Add Car</a>
                <a style="margin:5px;" class="button is-danger is-rounded" href="logout/">Log Out</a>
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
@else
    <script>window.location='login/';</script>
@endif

