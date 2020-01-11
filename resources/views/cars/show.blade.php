@extends ('layouts.app')

@section ('page_title')
   Car Dealership | Details
@endsection
@if (Auth::check())
@section ('page_heading')
    <center>
    Car: {{ $car -> model }}
    </center>
@endsection

@section ('content')

    <div class="box">
        <table class="table is-striped is-fullwidth">
            <tbody>
            <tr>
                <td>Year:</td>
                <td>{{ $car -> year }}</td>
            </tr>
            <tr>
                <td>Type:</td>
                <td>{{ $car -> type }}</td>
            </tr>
            <tr>
                <td>Fuel:</td>
                <td>{{ $car -> fuel_type }}</td>
            </tr>
            <tr>
                <td>Gearbox:</td>
                <td>{{ $car -> transmission }}</td>
            </tr>
            <tr>
                <td>Doors:</td>
                <td>{{ $car -> doors}}</td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>£{{ $car -> price }}</td>
            </tr>
            </tbody>

        </table>
        <a class="button" href="/awp-1-giannossazos/public/home">Back</a>
    </div>




@endsection
@else
    <script>window.location='/awp-1-giannossazos/public/login/';</script>
@endif
