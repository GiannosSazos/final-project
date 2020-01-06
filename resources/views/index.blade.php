<!DOCTYPE html>
@extends ('layouts.app')

@section ('page_title')
    Car Dealership
@endsection

@section ('page_heading')
    Inventory
@endsection

@section ('content')

    <div class="container main-table">
        <div class="box">

            @if (count ($cars) > 0)


<table class="table is-striped is-hoverable">
    <thead>
    <th>Car</th>
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
        <div class="box">
            <a class="button is-primary" href="add/">Add Car</a>
        </div>
    </div>
    @endsection

