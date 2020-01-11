<!DOCTYPE html>
@extends ('layouts.app')

@section ('page_title')
    Car Dealership
@endsection

@if (Auth::check())

@section ('page_heading')
    Inventory
@endsection

@section ('content')
    <div class="box">

        <form action = "" method="POST">

            <fieldset>

                @csrf

                <div class="field">
                    <label class="label">
                      Search Inventory
                    </label>

                        <input class="keyword" type="string" name="keyword" placeholder="Search Car by Model">
                        <button class="button is-primary"  type="submit"><ion-icon name="search"></ion-icon></button>
                    <button class="button is-secondary" href="home/"  >Show All Cars</button>

                </div>
            </fieldset>
        </form>
    </div>
    <div class="box">
            @if (count ($cars) > 0)


                <table class="table is-striped is-hoverable">
                    <thead>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Price</th>
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
            @else
                <div class="notification is-info">
                    <p>
                        The inventroy is empty. Why not add a car?
                    </p>
                </div>
            @endif
        </div>

            <a class="button is-primary" href="add/">Add Car</a>
            <a class="button is-secondary" href="logout/">Log Out</a>

    </div>
    </div>
@endsection
@else
    <script>window.location='login/';</script>
@endif

