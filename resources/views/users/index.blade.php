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


        <!--Filter Links-->

        <div  style="text-align: left; float: left;">
            <a href="?role=Admin">Admin</a> |
            <a href="?role=Employee">Employee</a> |
            <a href="?role=Customer">Customer</a> |


        </div>

        <!--Sort Links-->
        <div style="text-align: right; o ">
            Price:
            <a href="?price_per_kg=asc">Ascending</a> |
            <a href="?price_per_kg=desc">Descending</a><br>
        </div>


        <!--Search Form-->
        <form action = "" method="POST">
            <fieldset>
                @csrf
                <input style="text-align:center;" class="input is-rounded" type="string" name="keyword" placeholder="Search Inventory">
                <button style="margin:5px;"  class="button is-link is-rounded"  type="submit"><ion-icon name="search"></ion-icon></button>
                <a style="margin:5px;" class="button is-secondary is-rounded" href="/final-project/public/home"  >Show Full Inventory</a>
            </fieldset>
        </form>
        <br>

        <!--Making the table where all the data for the meats will be displayed-->
        <div class="box">
            @if(session()->has('added'))
                <div class="notification is-primary">
                    {{ session()->get('added') }}
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

        </div>
        </div>
        </div>
    </center>
@endsection



