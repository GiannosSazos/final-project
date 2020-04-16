@extends ('layouts.app')

@section ('page_title')
    Vendor Store | Edit
@endsection

@section ('page_heading')
    <center>
        Edit details
    </center>
@endsection

@section ('content')

    <div class="box" align="center" style="width: 500px; margin: 0 auto;">

        <form action="" method="POST">

            <fieldset>

                @csrf
                <div style="text-align:center;">
                    <tr>
                        <td class="table-row-label">Item Added By:</td>
                        <td>{{ $meat -> user-> name }}</td>
                        <td class="table-row-label">on {{ $meat -> created_at-> format }}
                            at {{ $meat -> created_at-> format ('H:i') }} </td>

                    </tr>
                </div>
                <br>

                @if (isset ($meat -> updating_user))
                    <div style="text-align:center">
                        <tr>
                            <td class="table-row-label">Last Updated By:</td>
                            <td>{{ $meat -> updating_user-> name }}</td>
                            <td class="table-row-label">on {{ $meat -> updated_at-> format ('l jS F') }}
                                at {{ $meat -> updated_at-> format ('H:i') }} </td>

                        </tr>
                    </div><br>
                @endif

                <div class="field">
                    <label class="label">
                        Kind
                    </label>

                    <div class="select is-rounded">
                        <select name="kind" value="{{$meat->kind}}" style="width: 250px;text-align-last: center;">
                            <option>Beef</option>
                            <option>Lamb</option>
                            <option>Pork</option>
                            <option>Poultry</option>
                            <option>Sausages</option>
                            <option>Steaks</option>
                            <option>Burgers</option>

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
                        <select name="cut" style="width: 250px;text-align-last: center;"  value="{{$meat -> cut}}">
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
                    <input class="input is-rounded" type="decimal" name="price_per_kg" value="{{$meat->price_per_kg}}"
                           style="width: 250px; text-align: center">
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
                    <input class="input is-rounded" type="text" name="description" value="{{$meat->description}}"
                           style="width: 250px; text-align: center">
                </div>

                <div class="field">
                    <button class="button is-link is-rounded" type="submit">Submit Changes</button>
                    <a class="button  is-rounded" href="javascript:history.back()">Back</a>
                </div>
            </fieldset>
        </form>
        @endsection
    </div>


