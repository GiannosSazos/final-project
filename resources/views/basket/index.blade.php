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
    <div class="box">
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
        <th>Kind</th>
        <th>Cut</th>
        <th>Price Per Kilo</th>
        <th>Details</th>
        <th style="position: relative;right: 35px;">Remove from Basket</th>
        </thead>
        <tbody>
        @foreach ($meats as $m)
            <tr>
                <td>{{ $m ['item'] ['kind']}}</td>
                <td>{{ $m ['item'] ['cut']}}</td>
                <td>£{{$m ['item'] ['price_per_kg'] }}</td>

                <!--View details button-->
                <td>
                    <a class="button"
                       href="meat/{{ $m ['item'] ['id']}}/">
                        <ion-icon name="eye"></ion-icon>
                    </a>
                </td>
                    <td>
                        <a class="button"
                           href="#">
                            <ion-icon name="trash"></ion-icon>
                        </a>
                    </td>
            </tr>

    @endforeach
        </tbody>
    </table>
    </div>
@endsection










