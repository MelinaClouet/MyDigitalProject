<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>@yield('title')</title>
    @cookieconsentscripts
</head>
<style>
    .font-poetsen {
        font-family: 'Poetsen One', sans-serif;
    }
    p {
        font-family: 'Quicksand', sans-serif;
    }
    h2 {
        font-family: 'Quicksand', sans-serif;
    }
</style>
<body class="bg-beige mt-10">
@if (Route::currentRouteName() == 'home')
    @cookieconsentview
@endif
@include('layouts.header' , ['active' => $active])
@yield('content')

@include ('layouts.contact')
@include('layouts.footer')

@livewireScripts


</body>
</html>
