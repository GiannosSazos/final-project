<!DOCTYPE html>
@extends ('layouts.app')

@section ('page_title')
    Vendor Shop
@endsection

@section ('page_heading')
    <center>
        Admin Panel
    </center>
@endsection
@section ('content')
    <center>
        <!--Making the table where all the data for the meats will be displayed-->
        <div class="box">
            @if(session()->has('added'))
                <div class="notification is-primary">
                    {{ session()->get('added') }}
                </div>
            @endif
                @if(session()->has('orderDelivered'))
                    <div class="notification is-primary">
                        {{ session()->get('orderDelivered') }}
                    </div>
                @endif
                @if(session()->has('failure'))
                    <div class="notification is-danger">
                        {{ session()->get('failure') }}
                    </div>
                @endif
                @if(session()->has('orderCancelled'))
                    <div class="notification is-danger">
                        {{ session()->get('orderCancelled') }}
                    </div>
                @endif
            @if(session()->has('deleted'))
                <div class="notification is-danger">
                    {{ session()->get('deleted') }}
                </div>
            @endif

            <!--if there is data in the database, show the data...-->
            @if (count ($user) > 0)

                <table class="table is-striped is-hoverable is-fullwidth">
                    <thead>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Personal Telephone</th>
                    <th>Email</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Delete</th>


                    </thead>
                    <tbody>
                    @foreach ($user as $u)
                        <tr>

                            <td>{{ implode(', ',$u->roles()->get()->pluck('name')->toArray())}}</td>
                            <td>{{ $u -> name }}</td>
                            <td>{{ $u -> personal_telephone }}</td>
                            <td>{{$u -> email }}</td>

                            <!--View details button-->
                            <td>
                                <a class="button"
                                   href="user/{{ $u -> id }}/">
                                    <ion-icon name="eye"></ion-icon>
                                </a>
                            </td>

                            <!--Delete meat from database button-->

                                <td>
                                    <a class="button"
                                       href="user/{{ $u -> id }}/edit">
                                        <ion-icon name="create"></ion-icon>
                                    </a>
                                </td>


                                <!--Delete meat from database button-->
                                <td>
                                    <a class="button"
                                       href="user/{{ $u -> id }}/delete/">
                                        <ion-icon name="trash"></ion-icon>  </a></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

                <!--Display the numbers for the pages-->
                {{$user->links()}}


                <br>
                <!--Add meat to database button-->
                @if ((Auth::user()->hasAnyRole('admin')))
                        <a class="button is-link is-rounded" href="register">
                            {{ __('Add New User') }}
                        </a>
                @endif
                @endif
                @endsection
        </div>
    </center>




