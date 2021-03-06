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
        <div class="select is-rounded" style=" display: inline-block; margin-right: 950px;">
            <select id="xx"
                    onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">Filter by Kind</option>
                <option value="home">All Meats</option>
                <option value="?kind=beef">Beef</option>
                <option value="?kind=lamb">Lamb</option>
                <option value="?kind=pork">Pork</option>
                <option value="?kind=poultry">Poultry</option>
                <option value="?kind=sausage">Sausage</option>
                <option value="?kind=steak">Steak</option>
                <option value="?kind=burger">Burger</option>
            </select>
        </div>

        <!--Sort Links-->
        <div class="select is-rounded"
             style="text-align: right; display: inline-block; margin-left: 950px; position:relative; bottom: 40px; ">
            <select
                onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <a>Price</a>
                <option value="">Sort by Price</option>
                <option value="home">Reset</option>
                <option value="?price_per_kg=asc">Ascending</option>
                |
                <option value="?price_per_kg=desc">Descending</option>
                <br>
            </select>
        </div>


        <!--Search Form-->
        <form method="POST">
            @csrf
            <div class="field has-addons" style="position: absolute;left: 38%; top: 60px;">
                <p class="control">
                    <input class="input is-rounded" type="text" name="keyword" placeholder="Search Inventory">
                </p>
                <p class="control">
                    <button class="button is-link is-rounded" type="submit">
                        <ion-icon name="search"></ion-icon>
                    </button>
                </p>

            </div>
        </form>
        <br>


        <div class="box">

            @if(session()->has('alreadyBasket'))
                <div class="notification is-danger">
                    {{ session()->get('alreadyBasket') }}
                </div>
            @endif
                @if(session()->has('charged'))
                    <div class="notification is-primary">
                        {{ session()->get('charged') }}
                    </div>
                @endif
            @if(session()->has('noItems'))
                <div class="notification is-danger">
                    {{ session()->get('noItems') }}
                </div>
            @endif

            @if(session()->has('added'))
                <div class="notification is-primary">
                    {{ session()->get('added') }}
                </div>
            @endif

            @if(session()->has('emptyBasket'))
                <div class="notification is-danger">
                    {{ session()->get('emptyBasket') }}
                </div>
            @endif
            @if(session()->has('addBasket'))
                <div class="notification is-primary">
                    {{ session()->get('addBasket') }}
                </div>
            @endif
            @if(session()->has('deleted'))
                <div class="notification is-danger">
                    {{ session()->get('deleted') }}
                </div>
            @endif
        <!--Making the table where all the data for the meats will be displayed-->
            <!--if there is data in the database, show the data...-->
            @if (count ($meat) > 0)

                <table class="table is-striped is-hoverable is-fullwidth">
                    <thead>
                    <th>Kind</th>
                    <th>Cut</th>
                    <th>Price Per Kilo</th>
                    <th>Details</th>
                    @if (Auth::user()->restaurant_name !==(NULL))
                        <th style="position:relative; right: 20px">Add to Basket</th>
                    @endif

                    @if ((Auth::user()->hasAnyRole('admin')))
                        <th>Edit</th>
                        <th>Delete</th>
                    @endif

                    </thead>
                    <tbody>
                    @foreach ($meat as $m)
                        <tr>
                            <td>{{ $m -> kind }}</td>
                            <td>{{ $m -> cut }}</td>
                            <td>£{{$m -> price_per_kg }}</td>

                            <!--View details button-->
                            <td>
                                <a class="button"
                                   href="meat/{{ $m -> id }}/">
                                    <ion-icon name="eye"></ion-icon>
                                </a>
                            </td>
                            @if (Auth::user()->restaurant_name !==(NULL))

                                <td>
                                    <a class="button"
                                       href="add_to_basket/{{$m->id}}">
                                        <ion-icon name="basket"></ion-icon>
                                    </a>
                                </td>
                            @endif


                        <!--Edit details button-->
                            @if ((Auth::user()->hasAnyRole('admin')))
                                <td>
                                    <a class="button"
                                       href="meat/{{ $m -> id }}/edit">
                                        <ion-icon name="create"></ion-icon>
                                    </a>
                                </td>


                                <!--Delete meat from database button-->
                                <td>
                                    <a class="button"
                                       href="meat/{{ $m -> id }}/delete/">
                                        <ion-icon name="trash"></ion-icon>
                                    </a></td>


                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!--Display the numbers for the pages-->
                {{$meat->links()}}

            <!--Add meat to database button-->
                @if ((Auth::user()->hasAnyRole('admin')))
                    <a class="button is-link is-rounded" href="add/">Add Meat</a>
                @endif
            <!--if there is not data in the database display this.-->
            @else
                <div class="notification is-dark">
                    <p>The inventroy is empty. Why not add a meat?</p>
                </div>
                @if ((Auth::user()->hasAnyRole('admin')))
                    <a class="button is-link is-rounded" href="add/">Add Meat</a>
                @endif
            @endif
        </div>
    </center>
@endsection










