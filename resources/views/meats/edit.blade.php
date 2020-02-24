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

    <div class="box" align="center" style="width: 500px; margin: 0 auto;">

        <form action = "" method="POST">

            <fieldset>

                @csrf
                <div class="field">
                    <label class="label">
                        Seller
                    </label>

                        <input class="input is-rounded" type="String" name="model" value="{{$car->user->name}}" readonly style="width: 250px; text-align: center">

                </div>
                <div class="field">
                    <label class="label">
                        Model
                    </label>

                        <input class="input is-rounded" type="String" name="model" value="{{$car->model}}" readonly style="width: 250px; text-align: center">
                </div>


                <div class="field">
                    <label class="label">
                        Year
                    </label>
                    <div class="select is-rounded">
                        <select name="year" style="width: 250px;text-align-last: center;">
                            <option>2000</option>
                            <option>2001</option>
                            <option>2002</option>
                            <option>2003</option>
                            <option>2004</option>
                            <option>2005</option>
                            <option>2006</option>
                            <option>2007</option>
                            <option>2008</option>
                            <option>2009</option>
                            <option>2010</option>
                            <option>2011</option>
                            <option>2012</option>
                            <option>2013</option>
                            <option>2014</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>

                        </select>
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
                    <div class="select is-rounded">
                        <select name="type" style="width: 250px;text-align-last: center;">
                            <option>Convertible</option>
                            <option>Coupe</option>
                            <option>Hatchback</option>
                            <option>MPV</option>
                            <option>Sedan</option>
                            <option>Small</option>
                            <option>SUV</option>
                        </select>
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
                    <div class="select is-rounded">
                        <select name="fuel_type" style="width: 250px;text-align-last: center;">
                            <option>Gas</option>
                            <option>Diesel</option>
                            <option>Hybrid</option>
                            <option>Electric</option>
                        </select>
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
                    <div class="select is-rounded">
                        <select name="transmission"style="width: 250px;text-align-last: center;">
                            <option>Manual</option>
                            <option>Automatic</option>
                        </select>
                    </div>
                </div>


                @error ('transmission')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror

                <div class="field" >
                    <label class="label">
                        Doors
                    </label>
                    <div class="select is-rounded">
                        <select name="doors" style="width: 250px; text-align-last: center;">
                            <option>2</option>
                            <option>4</option>
                            <option>6</option>
                        </select>
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

                    <input class="input is-rounded" type="integer" value="{{$car->price}}" name="price" placeholder="Enter Price" style="width: 250px; text-align: center">

                </div>

                @error ('price')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
                <div class="field">
                    <button class="button is-primary is-rounded" type="submit">Add Car</button>
                    <a class="button is-rounded" href="/awp-2-giannossazos/public/home" >Back</a>
                </div>
            </fieldset>
        </form>
    </div>
    @if (isset ($car -> updating_user))
        <div style="text-align:center">
    <tr>
        <td class="table-row-label">Last Updated By:</td>
        <td>{{ $car -> updating_user-> name }}</td>
        <td class="table-row-label">on {{ $car -> updated_at-> format ('l jS F') }} at {{ $car -> updated_at-> format ('H:i') }} </td>

    </tr>
        </div>
    @endif





@endsection