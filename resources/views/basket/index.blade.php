@extends ('layouts.app')

@section ('page_title')
    Vendor Shop
@endsection

@section ('page_heading')
    <center>
         Your Basket
    </center>
@endsection


@section ('content')
    @foreach ($meats as $m)
    <tr>
        <td>{{$m ['item']['kind']}}
        </td>
        <td>{{$m['qty']}}
        </td>
    </tr>
    @endforeach
@endsection










