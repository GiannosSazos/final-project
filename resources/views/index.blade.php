<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Car Dealership</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="icon"       type="image/png"       href="{{ asset ('images/carfavicon.png') }}" />
    <link href="{{ asset ('css/design.css') }}"       rel="stylesheet" />



</head>
<body>
<table class="table is-striped is-hoverable">
    <thead>
    <th>Car</th>
   <th>Year</th>
    <th>Price</th>
    </thead>
    <tbody>
    @foreach ($cars as $c)
        <tr>
            <td>{{ $c -> model }}</td>
            <td>{{ $c -> year }}</td>
            <td>£{{$c -> price }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$cars->links()}}
</body>
</html>
