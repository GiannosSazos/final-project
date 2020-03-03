@extends ('layouts.app')

@section ('page_title')
   Vendor Store | Details
@endsection

@section ('page_heading')
    <center>
    Meat: {{ $meat -> cut }}
        {{ $meat -> kind }}
    </center>
@endsection

@section ('content')

    <div class="box" style="width: 500px; margin: 0 auto;" align="center">
        @if(session()->has('updated'))
            <div class="notification is-primary">
                {{ session()->get('updated') }}
            </div>
        @endif
        <table class="table is-striped is-fullwidth" >
            <tbody>
            <tr>
                <td>Kind:</td>
                <td>{{ $meat -> kind }}</td>
            </tr>
            <tr>
                <td>Cut:</td>
                <td>{{ $meat -> cut }}</td>
            </tr>
            <tr>
                <td>Price per Kilo:</td>
                <td>£{{ $meat -> price_per_kg }}</td>
            </tr>
            @if (isset ($meat -> description))
                    <tr>
                        <td >Description:</td>
                        <td style="word-break: break-all">{{ $meat->description }}</td>
                    </tr>
            @endif
            </tbody>

        </table>
        <a class="button  is-rounded" href="javascript:history.back()">Back</a>
    </div>




@endsection





