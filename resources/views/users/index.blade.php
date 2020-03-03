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
            <a href="?kind=beef">Beef</a> |
            <a href="?kind=lamb">Lamb</a> |
            <a href="?kind=pork">Pork</a> |
            <a href="?kind=poultry">Poultry</a> |
            <a href="?kind=sausage">Sausage</a> |
            <a href="?kind=steak">Steak</a> |
            <a href="?kind=burger">Burger</a> |

        </div>

        <!--Sort Links-->
        <div style="text-align: right; overflow: hidden; ">
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
            @if(session()->has('deleted'))
                <div class="notification is-danger">
                    {{ session()->get('deleted') }}
                </div>
            @endif

            <!--if there is data in the database, show the data...-->
            @if (count ($user) > 0)

                <table class="table is-striped is-hoverable is-fullwidth">
                    <thead>
                    <th>Kind</th>
                    <th>Cut</th>
                    <th>Price Per Kilo</th>
                    <th>Details</th>
                    @if ((Auth::user()->hasAnyRole('admin')))
                    <th>Delete</th>
                        @endif

                    </thead>
                    <tbody>
                    @foreach ($user as $u)
                        <tr>
                            <td>{{ $u -> name }}</td>
                            <td>{{ $u -> cut }}</td>
                            <td>£{{$u -> price_per_kg }}</td>

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
                    <a style="margin:5px;" class="button is-link is-rounded" href="add_user/">Add New User</a>
                @endif
                @endif

        </div>
        </div>
        </div>
    </center>
@endsection


