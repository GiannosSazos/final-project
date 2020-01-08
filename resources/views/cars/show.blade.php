@extends ('layouts.app')

@section ('page_title')
   Car Dealership | Details
@endsection
@if (Auth::check())
@section ('page_heading')
    Car: {{ $car -> model }}
@endsection

@section ('content')

    <div class="box">
        <table class="table is-striped">
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
    </div>
    <p>
        <a class="button" href="/awp-1-giannossazos/public/">Back</a>
    </p>

@endsection
@else
    <script>window.location='/awp-1-giannossazos/public/login/';</script>
@endif
