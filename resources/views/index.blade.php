<!DOCTYPE html>
@extends ('layouts.app')

@section ('page_title')
    Car Dealership
@endsection

@if (Auth::check())



@section ('content')
    <center>
        <div class="box">

            <form action = "" method="POST">

                <fieldset>

                    @csrf
                    <input style="text-align:center;" class="input is-rounded" type="string" name="keyword" placeholder="Search Car by Model">
                    <button style="margin:5px;"  class="button is-primary is-rounded"  type="submit"><ion-icon name="search"></ion-icon></button>
                    <button style="margin:5px;" class="button is-secondary is-rounded" href="home/"  >Show All Cars</button>




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

                <div class="pagination-center">
                    {{$cars->links()}}
                </div>
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

