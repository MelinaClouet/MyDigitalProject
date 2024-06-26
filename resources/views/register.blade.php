<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="flex items-center justify-center h-screen bg-beige">

    <div id="form-container" class="bg-white p-8 rounded-lg shadow-md w-full md:w-1/2 lg:w-1/3">
        <h1 class="text-3xl font-bold mb-4 montserrat colorViolet" >Inscription</h1>

        <form id="register-form" action="{{route('addCustomer')}}" method="POST">
            @csrf
            <div id="personal-info">
                <div class="flex mb-4">
                    <div class="w-1/2 mr-2">
                        <label for="firstName" class="block text-sm font-medium montserrat text-orangeClair">Prénom</label>
                        <input type="text" id="firstName" name="firstName" class="mt-1 p-2 w-full border rounded-md" required>
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="lastName" class="block text-sm font-medium montserrat text-orangeClair">Nom</label>
                        <input type="text" id="lastName" name="lastName" class="mt-1 p-2 w-full border rounded-md" required>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-1/2 mr-2">
                        <label for="address" class="block text-sm font-medium montserrat text-orangeClair">Adresse</label>
                        <input type="text" id="address" name="address" class="mt-1 p-2 w-full border rounded-md" required>
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="postalCode" class="block text-sm font-medium montserrat text-orangeClair">Code Postal</label>
                        <input type="text" id="postalCode" name="postalCode" class="mt-1 p-2 w-full border rounded-md" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="city" class="block text-sm font-medium montserrat text-orangeClair">Ville</label>
                    <input type="text" id="city" name="city" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium montserrat text-orangeClair">Téléphone</label>
                    <input type="text" id="phone" name="phone" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="flex justify-end">
                    <button id="next" class="px-4 py-2 text-white rounded-md bg-orange ">Next</button>
                </div>
            </div>

            <div id="account-info" class="hidden">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium montserrat text-orangeClair">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium montserrat text-orangeClair" >Mot de passe</label>
                    <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md" required>
                    <p id="passwordMessage" class="text-sm text-red-500 hidden">Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un caractère spécial et un chiffre.</p>

                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium montserrat text-orangeClair">Confirmation mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 p-2 w-full border rounded-md" required>
                    <p id="passwordConfirmationMessage" class="text-sm text-red-500 hidden">Mots de passe incorect</p>

                </div>
                <div id="account-info" class="flex items-center justify-between">
                    <!-- Champs d'entrée -->
                    <!-- Bouton "Previous" -->
                    <button id="prev" class="px-4 py-2 bg-gray-200 text-gray-600 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400" >Previous</button>
                    <!-- Bouton "Register" -->
                    <button id="btnSubmit" type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md bg-orange " style="background-color: #FD6D2F">Ajouter</button>
                </div>
            </div>
        </form>
        <footer class="mt-4 px-4 py-2 text-center border-t border-violet">
            <p class="text-sm mt-2 text-black">Vous avez déjà un compte? <a href="/login" class="text-orange">Connectez-vous</a></p>
        </footer>



    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formContainer = document.getElementById('form-container');
            const registerForm = document.getElementById('register-form');
            const personalInfoSection = document.getElementById('personal-info');
            const accountInfoSection = document.getElementById('account-info');
            const nextBtn = document.getElementById('next');
            const prevBtn = document.getElementById('prev');
            const passwordInput = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');
            const passwordMessage = document.getElementById('passwordMessage');
            const passwordConfirmationMessage = document.getElementById('passwordConfirmationMessage');
            const btnSubmit = document.getElementById('btnSubmit');

            password.addEventListener('input', function () {
                var password = passwordInput.value; // Mettez la récupération de la valeur à l'intérieur de la fonction de rappel
                var longueurValide = password.length >= 6;
                var contientChiffre = /[0-9]/.test(password);
                var contientSpecial = /[^A-Za-z0-9]/.test(password);
                var contientMajuscule = /[A-Z]/.test(password);
                if (!longueurValide || !contientChiffre || !contientSpecial || !contientMajuscule) {
                    passwordInput.classList.remove("is-valid");
                    passwordInput.classList.add("is-invalid");
                    passwordMessage.classList.remove('hidden');
                } else {
                    passwordInput.classList.remove("is-invalid");
                    passwordInput.classList.add("is-valid");
                    passwordMessage.classList.add('hidden');
                }
            });



            passwordConfirmation.addEventListener('input', function () {
                const passwordValue = password.value;
                const passwordConfirmationValue = passwordConfirmation.value;

                if (passwordValue !== passwordConfirmationValue) {
                    console.log('Passwords do not match');
                    console.log('Password:', passwordValue, 'Password Confirmation:', passwordConfirmationValue);
                    passwordConfirmationMessage.classList.remove('hidden');
                    btnSubmit.disabled = true;
                } else {
                    console.log('Passwords match');
                    console.log('Password:', passwordValue, 'Password Confirmation:', passwordConfirmationValue);
                    passwordConfirmationMessage.classList.add('hidden');
                    btnSubmit.disabled = false;
                }
            });

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
