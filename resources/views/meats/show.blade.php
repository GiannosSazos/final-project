@extends ('layouts.app')

@section ('page_title')
   Vendor Store | Details
@endsection

@section ('page_heading')
    <center>
    Meat: {{ $meats -> model }}
    </center>
@endsection

@section ('content')

    <div class="box">
        <table class="table is-striped is-fullwidth">
            <tbody>
            <tr>
                <td>Year:</td>
                <td>{{ $meats -> year }}</td>
            </tr>
            <tr>
                <td>Type:</td>
                <td>{{ $meats -> type }}</td>
            </tr>
            <tr>
                <td>Fuel:</td>
                <td>{{ $meats -> fuel_type }}</td>
            </tr>
            <tr>
                <td>Gearbox:</td>
                <td>{{ $meats -> transmission }}</td>
            </tr>
            <tr>
                <td>Doors:</td>
                <td>{{ $meats -> doors}}</td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>£{{ $meats -> price }}</td>
            </tr>
            <tr>
                <td>Seller:</td>
                <td>{{ $meats -> user -> name}}</td>
            </tr>
            </tbody>

        </table>
        <a class="button" href="/final-project/public/home">Back</a>
    </div>




@endsection

