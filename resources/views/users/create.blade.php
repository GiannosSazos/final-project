@extends ('layouts.app')

@section ('page_title')
    Vendore Store | Add Meat
@endsection

@section ('page_heading')
    <center>
    Add Meat
    </center>
@endsection

@section ('content')

<div class="box" align="center" style="width: 500px; margin: 0 auto;">

    <form action = "" method="POST">

        <fieldset>

            @csrf


            <div class="field">
                <label class="label">
                    Kind
                </label>

                <div class="select is-rounded">
                    <select name="kind" style="width: 250px;text-align-last: center;">
                        <option>Beef</option>
                        <option>Lamb</option>
                        <option>Pork</option>
                        <option>Poultry</option>
                        <option>Sausage</option>
                        <option>Steak</option>
                        <option>Burger</option>

                    </select>
                </div>

            </div>

            @error ('kind')
            <div class="notification is-warning">
                <p>
                    {{ $message }}
                </p>
            </div>
            @enderror

            <div class="field">
                <label class="label">
                    Cut
                </label>
                <div class="select is-rounded">
                    <select name="cut" style="width: 250px;text-align-last: center;">
                        <option>Round</option>
                        <option>Loin</option>
                        <option>Rib</option>
                        <option>Chuck</option>
                        <option>Plate</option>
                        <option>Brisket</option>
                        <option>Foreshank</option>
                        <option>Ham</option>
                        <option>Spare Ribs</option>
                        <option>Leg</option>
                        <option>Brisket</option>
                        <option>Wings</option>
                        <option>Fillet</option>


                    </select>
                </div>
            </div>

            @error ('cut')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
            @enderror
            <div class="field">
                <label class="label">
                    Price per Kilo
                </label>
                <input class="input is-rounded" type="decimal" name="price_per_kg" placeholder="Enter Price Per Kilo" style="width: 250px; text-align: center">
            </div>

            @error ('price_per_kg')
            <div class="notification is-warning">
                <p>
                    {{ $message }}
                </p>
            </div>
            @enderror
            <div class="field">
                <label class="label">
                    Description
                </label>
                <input class="input is-rounded" type="text" name="description"  style="width: 250px; text-align: center">
            </div>

            <div class="field">
                <button class="button is-link is-rounded" type="submit">Add Meat</button>
                <a class="button  is-rounded" href="javascript:history.back()">Back</a>
            </div>
        </fieldset>
    </form>
    @endsection
</div>







