<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite('/resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-lg shadow-md w-full sm:w-96">
    <h1 class="text-3xl font-bold mb-4 montserrat colorViolet" >Login</h1>
    <form action="{{route('login')}}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium montserrat colorOrangeC">Email</label>
            <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-sm font-medium montserrat colorOrangeC">Password</label>
            <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 text-white rounded-md" style="background-color: #FD6D2F">Login</button>
        </div>
    </form>
    <footer class="mt-4 px-4 py-2 text-center border-t" style="border-top-color: #9C84C2; border-top-width: 2px;">
        <p class="text-sm mt-2 text-black">Vous n'avez pas de compte? <a href="/register" class="colorOrange"> Inscription</a></p>
    </footer>
</div>

</body>
</html>
