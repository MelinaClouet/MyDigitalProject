<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css','resources/js/app.js'])

    </head>

    <body class="" style="background-color: #FAE8E0">
        @include('layouts.header')
        <p>{{$me}}</p>

        @include('layouts.footer')
    </body>
</html>

