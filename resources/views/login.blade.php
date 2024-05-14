<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-beige" >
@if(session('success') || session('error'))
    <div class="bg-orange-100  px-4 py-3 rounded relative" role="alert">
        @if(session('success'))
            <div class=" text-green-700">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="text-red-700">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
    </div>
@endif
<div class="flex items-center justify-center h-screen " >
    <div class="bg-white p-8 rounded-lg shadow-md w-full sm:w-96">
        <h1 class="text-3xl font-bold mb-4 montserrat text-violet" >Connexion</h1>
        <form action="{{route('login')}}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium montserrat text-orangeClair">Email</label>
                <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium montserrat text-orangeClair">Password</label>
                <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 text-white rounded-md bg-orange" >Login</button>
            </div>
        </form>
        <footer class="mt-4 px-4 py-2 text-center border-t border-violet ">
            <p class="text-sm mt-2 text-black">Vous n'avez pas de compte? <a href="/register" class="text-orange"> Inscription</a></p>
        </footer>
    </div>
</div>


</body>
</html>
