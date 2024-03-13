<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
<div id="form-container" class="bg-white p-8 rounded-lg shadow-md w-full md:w-1/2 lg:w-1/3">
    <h1 class="text-2xl font-semibold mb-4">Register</h1>
    <form id="register-form" action="#" method="POST">
        <div id="personal-info">
            <div class="flex mb-4">
                <div class="w-1/2 mr-2">
                    <label for="firstName" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" id="firstName" name="firstName" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div class="w-1/2 ml-2">
                    <label for="lastName" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="lastName" name="lastName" class="mt-1 p-2 w-full border rounded-md">
                </div>
            </div>
            <div class="flex mb-4">
                <div class="w-1/2 mr-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">Addresse</label>
                    <input type="text" id="address" name="address" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div class="w-1/2 ml-2">
                    <label for="postalCode" class="block text-sm font-medium text-gray-700">Code Postal</label>
                    <input type="text" id="postalCode" name="postalCode" class="mt-1 p-2 w-full border rounded-md">
                </div>
            </div>
            <div class="mb-4">
                <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                <input type="text" id="city" name="city" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                <input type="text" id="phone" name="phone" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="flex justify-end">
                <button id="next" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Next</button>
            </div>
        </div>

        <div id="account-info" class="hidden">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div id="account-info" class="flex items-center justify-between">
                <!-- Champs d'entrée -->
                <!-- Bouton "Previous" -->
                <button id="prev" class="px-4 py-2 bg-gray-300 text-gray-600 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400">Previous</button>
                <!-- Bouton "Register" -->
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Register</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const formContainer = document.getElementById('form-container');
        const registerForm = document.getElementById('register-form');
        const personalInfoSection = document.getElementById('personal-info');
        const accountInfoSection = document.getElementById('account-info');
        const nextBtn = document.getElementById('next');
        const prevBtn = document.getElementById('prev');

        nextBtn.addEventListener('click', function (e) {
            e.preventDefault();
            personalInfoSection.classList.add('hidden');
            accountInfoSection.classList.remove('hidden');
            nextBtn.classList.add('hidden');
        });

        prevBtn.addEventListener('click', function (e) {
            e.preventDefault();
            personalInfoSection.classList.remove('hidden');
            accountInfoSection.classList.add('hidden');
            nextBtn.classList.remove('hidden');
        });
    });
</script>
</body>
</html>
