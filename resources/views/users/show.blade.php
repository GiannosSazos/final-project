@extends ('layouts.app')

@section ('page_title')
    Vendor Store | Details
@endsection

@section ('page_heading')
    <center>
        {{$user->name}}'s Profile
    </center>
@endsection

@section ('content')

    <div class="box" style="width: 500px; margin: 0 auto;" align="center">
        @if(session()->has('success'))
            <div class="notification is-primary">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table is-striped is-fullwidth">
            <tbody>
            <tr>
                <td>Name:</td>
                <td>{{  $user -> name }}</td>
            </tr>
            @if (isset ($user -> restaurant_name))
                <tr>
                    <td>Restaurant Name:</td>
                    <td>{{ $user -> restaurant_name }}</td>
                </tr>
                <tr>
                    <td>Restaurant Address:</td>
                    <td>{{ $user -> restaurant_address}}</td>
                </tr>
                <tr>
                    <td>Restaurant Telephone:</td>
                    <td>{{ $user -> restaurant_telephone }}</td>
                </tr>
            @endif
            <tr>
                <td>Personal Address:</td>
                <td>{{ $user -> personal_address }}</td>
            </tr>
            <tr>
                <td>Personal Telephone:</td>
                <td>{{$user -> personal_telephone }}</td>
            </tr>

            <tr>
                <td>E-Mail:</td>
                <td style="word-break: break-all">{{ $user->email }}</td>
            </tr>

            <tr>
                <td>Role:</td>
                <td style="word-break: break-all">{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</td>
            </tr>
            </tbody>

        </table>
            @if ((Auth::user()->hasAnyRole('admin')))
        <a class="button is-rounded is-link" href="/final-project/public/user/{{$user->id}}/edit">Edit Details</a>
        @if(Auth::user()->id !== $user->id)
            <a class="button is-danger is-rounded"
               href="/final-project/public/user/{{ $user -> id }}/delete/">Delete</a>
        @endif
            @endif
        <a class="button is-rounded" href="javascript:history.back()">Back</a>
        @if (isset($user -> restaurant_name))<br><br>
        <b>{{$user->name}} Orders</b>
        <hr style="border-top: 1px solid black;">
        @if ($orders->contains('user_id',$user->id))
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->basket->basketItem as $meat)

                                <li class="list-group-item">
                                    <span
                                        class="badge">{{$meat['item']['kind']}} {{$meat['item']['cut']}} | £{{  $meat['totalPrice']}}</span>
                                </li>
                            @endforeach
                            Delivery Address: {{$order->restaurant_address}}<br>
                            Delivery Date:{{$order->date}}<br>
                            Delivery Time:{{$order->time}}
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price: £{{$order->basket->basketPrice}}
                            <br>Date: {{$order->created_at->format('l jS F')}} at {{$order->created_at->format('H:i')}}
                        </strong><br>
                        <a class="button is-rounded is-link" href="/final-project/public/delivered/order/{{$order->id}}">Delivered</a>
                        @if ((Auth::user()->hasAnyRole('admin')))
                        <a class="button is-rounded is-danger" href="/final-project/public/cancel/order/{{$order->id}}">Cancel Order</a>
                        @endif
                        <hr style="border-top: 1px solid black;">
                    </div>
                </div>
            @endforeach
        @else No pending orders from this customer
        @endif
        @endif
        @endsection
    </div>









