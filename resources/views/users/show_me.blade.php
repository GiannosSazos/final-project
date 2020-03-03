@extends ('layouts.app')

@section ('page_title')
   Vendor Store | Details
@endsection

@section ('page_heading')
    <center>
   {{$user->name}}'s Profile
    </center>
@endsection

@section ('content')

    <div class="box" style="width: 500px; margin: 0 auto;" align="center">
        <table class="table is-striped is-fullwidth" >
            <tbody>
            <tr>
                <td>Name:</td>
                <td>{{  $user -> name }}</td>
            </tr>
            @if (isset ($user -> restaurant_name))
            <tr>
                <td>Restaurant Name:</td>
                <td>{{ $user -> restaurant_name }}</td>
            </tr>
            <tr>
                <td>Restaurant Address:</td>
                <td>{{ $user -> restaurant_address}}</td>
            </tr>
            <tr>
                <td>Restaurant Telephone:</td>
                <td>{{ $user -> restaurant_telephone }}</td>
            </tr>
            @endif
            <tr>
                <td>Personal Address:</td>
                <td>{{ $user -> personal_address }}</td>
            </tr>
            <tr>
                <td>Personal Telephone:</td>
                <td>{{$user -> personal_telephone }}</td>
            </tr>

                    <tr>
                        <td >E-Mail:</td>
                        <td style="word-break: break-all">{{ $user->email }}</td>
                    </tr>
            </tbody>

        </table>
        <a class="button is-rounded is-link" href="edit_details">Edit Details</a>
        <a class="button is-rounded" href="javascript:history.back()">Back</a>
    </div>




@endsection




