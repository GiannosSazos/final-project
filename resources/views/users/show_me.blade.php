@extends ('layouts.app')

@section ('page_title')
   Vendor Store | Details
@endsection

@section ('page_heading')
    <center>
   {{Auth::user()->name}}'s Profile
    </center>
@endsection

@section ('content')

    <div class="box" style="width: 500px; margin: 0 auto;" align="center">
        <table class="table is-striped is-fullwidth" >
            <tbody>
            <tr>
                <td>Name:</td>
                <td>{{  Auth::user() -> name }}</td>
            </tr>
            @if (isset (Auth::user() -> restaurant_name))
            <tr>
                <td>Restaurant Name:</td>
                <td>{{ Auth::user() -> restaurant_name }}</td>
            </tr>
            <tr>
                <td>Restaurant Address:</td>
                <td>{{ Auth::user() -> restaurant_address}}</td>
            </tr>
            <tr>
                <td>Restaurant Telephone:</td>
                <td>{{ Auth::user() -> restaurant_telephone }}</td>
            </tr>
            @endif
            <tr>
                <td>Personal Address:</td>
                <td>{{ Auth::user() -> personal_address }}</td>
            </tr>
            <tr>
                <td>Personal Telephone:</td>
                <td>{{Auth::user() -> personal_telephone }}</td>
            </tr>

                    <tr>
                        <td >E-Mail:</td>
                        <td style="word-break: break-all">{{ Auth::user()->email }}</td>
                    </tr>
            </tbody>

        </table>
             <a class="button is-rounded is-link" href="/final-project/public/edit_my_profile">Edit Details</a>
            <a class="button is-danger is-rounded" href="/final-project/public/delete_my_profile">Delete</a>
        <a class="button is-rounded" href="javascript:history.back()">Back</a>
    </div>




@endsection





