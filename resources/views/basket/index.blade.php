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

    @if(session()->has('negativeKg'))
        <div class="notification is-danger">
            {{ session()->get('negativeKg') }}
        </div>
    @endif
    @if(session()->has('zeroPrice'))
        <div class="notification is-danger">
            {{ session()->get('zeroPrice') }}
        </div>
    @endif
    @if(session()->has('removedItem'))
        <div class="notification is-danger">
            {{ session()->get('removedItem') }}
        </div>
    @endif
    <div class="box">
        <table class="table is-striped is-hoverable is-fullwidth">
            <thead>
            <th>Kind</th>
            <th>Cut</th>
            <th>Price Per Kilo</th>
            <th>Kg</th>
            <th>Price</th>
            <th>Increase/Decrease Kg</th>
            <th>Details</th>
            <th>Remove from Basket</th>
            </thead>
            <tbody>

            @foreach ($meats as $m)
                <td>{{ $m ['item'] ['kind']}}</td>
                <td>{{ $m ['item'] ['cut']}}</td>
                <td>£{{$m ['item'] ['price_per_kg'] }}</td>
                <td>{{$m ['kg']}}</td>
                <td>£{{$m ['totalPrice'] }}</td>
                <div>
                    <td>
                        <a class="button"
                           href="increase_kg/{{ $m ['item'] ['id']}}">
                            <ion-icon name="add"></ion-icon>
                        </a>
                    </td>
                    <td>
                        <a style="position:relative; right: 130px;" class="button"
                           href="decrease_kg/{{ $m ['item'] ['id']}}">
                            <ion-icon name="remove"></ion-icon>
                        </a>
                    </td>
                </div>
                <!--View details button-->
                <td>
                    <a style="position:relative; right: 90px;" class="button"
                       href="meat/{{ $m ['item'] ['id']}}/">
                        <ion-icon name="eye"></ion-icon>
                    </a>
                </td>
                <td>
                    <a style="position:relative; right: 155px;" class="button"
                       href="remove/{{ $m ['item'] ['id']}}">
                        <ion-icon name="trash"></ion-icon>
                    </a>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        Total Price: £{{$basketPrice}}
        <a class="button is-link" style="position:relative;left: 67%" href="checkout">Checkout</a>
    </div>
@endsection










