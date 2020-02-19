@extends ('layouts.app')

@section ('page_title')
    Car Dealership | Edit
@endsection

@section ('page_heading')
    <center>
        Edit details
    </center>
@endsection

@section ('content')

    <div class="box">

        <form action = "" method="POST">

            <fieldset>

                @csrf
                <div class="field">
                    <label class="label">
                        Seller
                    </label>
                    <div class="control">
                        <input class="input is-rounded" type="String" name="model" value="{{$car->user->name}}" readonly>
                    </div>
                </div>
                <div class="field">
                    <label class="label">
                        Model
                    </label>
                    <div class="control">
                        <input class="input is-rounded" type="String" name="model" value="{{$car->model}}" readonly>
                    </div>
                </div>


                <div class="field">
                    <label class="label">
                        Year
                    </label>
                    <div class="control">
                        <input class="input is-rounded" type="integer" name="year" value="{{$car->year}}" placeholder="Enter Year of Make">
                    </div>
                </div>

                @error ('year')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
                <div class="field">
                    <label class="label">
                        Type
                    </label>
                    <div class="control">
                        <input class="input is-rounded" type="string" name="type" value="{{$car->type}}" placeholder="Enter Car Type">
                    </div>
                </div>

                @error ('type')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
                <div class="field">
                    <label class="label">
                        Fuel
                    </label>
                    <div class="control">
                        <input class="input is-rounded" type="string" name="fuel_type" value="{{$car->fuel_type}}" placeholder="Enter Car's Fuel Type">
                    </div>
                </div>

                @error ('fuel_type')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
                <div class="field">
                    <label class="label">
                        Gearbox
                    </label>
                    <div class="control">
                        <input class="input is-rounded" type="string" name="transmission" value="{{$car->transmission}}" placeholder="Enter Gearbox Type">
                    </div>
                </div>

                @error ('transmission')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
                <div class="field">
                    <label class="label">
                        Doors
                    </label>
                    <div class="control">
                        <input class="input is-rounded" type="integer" name="doors" value="{{$car->doors}}" placeholder="Enter Number of Doors">
                    </div>
                </div>

                @error ('doors')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
                <div class="field">
                    <label class="label">
                        Price
                    </label>
                    <div class="control">
                        <input class="input is-rounded" type="integer" name="price" value="{{$car->price}}" placeholder="Enter Price">
                    </div>
                </div>

                @error ('price')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
                @if (isset ($car -> updating_user))
                    <tr>
                        <td class="table-row-label">Last Updated By:</td>
                        <td>{{ $car -> updating_user-> name }}</td>
                    </tr><br>
                @endif
                <div class="field">
                    <button  style="margin:5px;" class="button is-primary is-rounded" type="submit">Update Details</button>
                    <button style="margin:5px;" class="button is-secondary is-rounded" href="/awp-1-giannossazos/public/home">Back</button>
                </div>


            </fieldset>
        </form>
    </div>





@endsection

