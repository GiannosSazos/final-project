@extends ('layouts.app')

@section ('page_title')
    Car Dealership | Edit
@endsection

@section ('page_heading')
    Edit details of {{$car->model}}
@endsection

@section ('content')

    <div class="box">

        <form action = "" method="POST">

            <fieldset>

                @csrf



                <div class="field">
                    <label class="label">
                        Year
                    </label>
                    <div class="control">
                        <input class="input" type="integer" name="year" placeholder="Enter Year of Make">
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
                        <input class="input" type="string" name="type" placeholder="Enter Car Type">
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
                        <input class="input" type="string" name="fuel_type" placeholder="Enter Car's Fuel Type">
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
                        <input class="input" type="string" name="transmission" placeholder="Enter Gearbox Type">
                    </div>
                </div>

                @error ('gearbox')
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
                        <input class="input" type="integer" name="doors" placeholder="Enter Number of Doors">
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
                        <input class="input" type="integer" name="price" placeholder="Enter Price">
                    </div>
                </div>

                @error ('price')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
                <div class="field">
                    <button class="button is-primary" type="submit">Update Details</button>
                </div>

            </fieldset>
        </form>
    </div>

    <p>
        <a class="button" href="/">Back</a>
    </p>

@endsection
