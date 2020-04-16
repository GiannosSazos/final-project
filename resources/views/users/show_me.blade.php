@extends ('layouts.app')

@section ('page_title')
   Vendor Store | Details
@endsection

@section ('page_heading')
    <center>
   Your Profile
    </center>
@endsection

@section ('content')

    <div class="box" style="width: 500px; margin: 0 auto;" align="center">
        @if(session()->has('success'))
            <div class="notification is-primary">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table is-striped is-fullwidth" >
            <tbody>
            <tr>
                <td>Name:</td>
                <td>{{  Auth::user() -> name }}</td>
            </tr>
            @if (isset (Auth::user() -> restaurant_name))
            <tr>
                <td>Restaurant Name:</td>
                <td>{{ Auth::user() -> restaurant_name }}</td>
            </tr>
            <tr>
                <td>Restaurant Address:</td>
                <td>{{ Auth::user() -> restaurant_address}}</td>
            </tr>
            <tr>
                <td>Restaurant Telephone:</td>
                <td>{{ Auth::user() -> restaurant_telephone }}</td>
            </tr>
            @endif
            <tr>
                <td>Personal Address:</td>
                <td>{{ Auth::user() -> personal_address }}</td>
            </tr>
            <tr>
                <td>Personal Telephone:</td>
                <td>{{Auth::user() -> personal_telephone }}</td>
            </tr>

                    <tr>
                        <td >E-Mail:</td>
                        <td style="word-break: break-all">{{ Auth::user()->email }}</td>
                    </tr>
            </tbody>
        </table>
            <a class="button is-rounded is-link" href="/final-project/public/edit_my_profile">Edit Details</a>
            <a class="button is-rounded" href="javascript:history.back()">Back</a><br><br>

                <b>My orders</b>
                <hr style="border-top: 1px solid black;">
                @foreach($orders as $order)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="list-group">
                    @foreach($order->basket->basketItem as $meat)

                        <li class="list-group-item">
                            <span class="badge">{{$meat['item']['kind']}} {{$meat['item']['cut']}} | £{{  $meat['totalPrice']}}</span>
                        </li>
                                    Delivery Address: {{$order->restaurant_address}}<br>
                                    Delivery Date:{{$order->date}}<br>
                                    Delivery Time:{{$order->time}}
                        @endforeach
                        </ul>
                        </div>
                   <div class="panel-footer">
                    <strong>Total Price: £{{$order->basket->basketPrice}}<br>Date: {{$order->created_at->format('l jS F')}} at {{$order->created_at->format('H:i')}}
                    </strong>
                        <hr style="border-top: 1px solid black;">
                   </div>
                    </div>
                @endforeach
            @endsection
    </div>






