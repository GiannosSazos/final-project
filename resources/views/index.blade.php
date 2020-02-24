<!DOCTYPE html>
@extends ('layouts.app')

@section ('page_title')
    Vendor Shop
@endsection

@section ('page_heading')
    <center>
        Vendor Shop
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
            <a href="?kind=sausages">Sausages</a> |
            <a href="?kind=steaks">Steaks</a> |
            <a href="?kind=burgers">Burgers</a> |

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
                <button style="margin:5px;"  class="button is-primary is-rounded"  type="submit"><ion-icon name="search"></ion-icon></button>
                <a style="margin:5px;" class="button is-secondary is-rounded" href="/final-project/public/home"  >Show Full Inventory</a>
            </fieldset>
        </form>
        <br>

        <!--Making the table where all the data for the meats will be displayed-->
        <div class="box">

            <!--if there is data in the database, show the data...-->
            @if (count ($meats) > 0)

                <table class="table is-striped is-hoverable is-fullwidth">
                    <thead>
                    <th>Cut</th>
                    <th>Kind</th>
                    <th>Price Per Kilo</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Delete</th>

                    </thead>
                    <tbody>
                    @foreach ($meats as $c)
                        <tr>
                            <td>{{ $c -> cut }}</td>
                            <td>{{ $c -> kind }}</td>
                            <td>£{{$c -> price_per_kg }}</td>

                            <!--View details button-->
                            <td>
                                <a class="button"
                                   href="meat/{{ $c -> id }}/">
                                    <ion-icon name="eye"></ion-icon>
                                </a>
                            </td>

                            <!--Edit details button-->
                            <td>
                                <a class="button"
                                   href="meat/{{ $c -> id }}/edit">
                                    <ion-icon name="create"></ion-icon>
                                </a>
                            </td>

                            <!--Delete meat from database button-->
                            <td>
                                <a class="button"
                                   href="meat/{{ $c -> id }}/delete/">
                                    <ion-icon name="trash"></ion-icon>  </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!--Display the numbers for the pages-->
                {{$meats->links()}}


                <br>
                <!--Add meat to database button-->
                <a style="margin:5px;" class="button is-primary is-rounded" href="add/">Add Meat</a>

                <!--Log out button-->
                <a style="margin:5px;" class="button is-danger is-rounded" href="logout/">Log Out</a>

                <!--if there is not data in the database display this.-->
            @else


                <div class="notification is-info">
                    <p>
                        The inventroy is empty. Why not add a meat?
                    </p>

                </div>
                <a style="margin:5px;" class="button is-primary is-rounded" href="add/">Add Meat</a>
                <a style="margin:5px;" class="button is-danger is-rounded" href="logout/">Log Out</a>
            @endif
        </div>
        </div>
        </div>
    </center>
@endsection



