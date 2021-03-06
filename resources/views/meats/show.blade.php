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
                    @if (Auth::user()->hasAnyRole('admin'))

                        <div style="text-align:center">
                            <tr>
                                <td class="table-row-label">Item Added By:</td>
                                <td>{{ $meat -> user-> name }}</td>
                                <td class="table-row-label">on {{ $meat -> created_at-> format ('l jS F') }}
                                    at {{ $meat -> created_at-> format ('H:i') }} </td>

                            </tr>
                            @if (isset ($meat -> updating_user))
                                <tr>
                                    <td class="table-row-label">Last Updated By:</td>
                                    <td>{{ $meat -> updating_user-> name }}</td>
                                    <td class="table-row-label">on {{ $meat -> updated_at-> format ('l jS F') }}
                                        at {{ $meat -> updated_at-> format ('H:i') }} </td>

                                </tr>
                        </div><br>
                    @endif
                    @endif
        <table class="table is-striped is-fullwidth">

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
                    <td>Description:</td>
                    <td style="word-break: break-all">{{ $meat->description }}</td>
                </tr>
            @endif
            </tbody>

        </table> @if (Auth::user()->hasAnyRole('admin'))
            <a class="button is-rounded is-link" href="/final-project/public/meat/{{$meat->id}}/edit">Edit Details</a>
            <a class="button is-danger is-rounded"
               href="/final-project/public/meat/{{ $meat -> id }}/delete/">Delete</a>
        @endif
        <a class="button  is-rounded" href="javascript:history.back()">Back</a>
        @endsection
    </div>










