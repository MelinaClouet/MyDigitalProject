

<?php
use App\Models\EventCategorie;
?>
    <!-- Inclure Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- HTML de la modal -->
<div x-data="{ isOpen: false }" class="w-1/2">
    <!-- Bouton pour ouvrir la modal -->
    <button @click="isOpen = true" class="w-full bg-orangeClair rounded-2xl mb-5 font-semibold" >
        +
    </button>

    <!-- Modal -->
    <div x-show="isOpen" @click.away="isOpen = false" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50">
        <div class="bg-white rounded-lg p-8 max-w-md mx-auto">
            <!-- Contenu de la modal -->
            <h2 class="text-2xl font-semibold mb-4 text-orange">Ajouter un service</h2>
            <form action="{{route('addEventCategorie')}}" method="POST">
                @csrf
                <div>

                    <label class="text-orangeClair" for="name">Nom du service</label>
                    <input type="text" name="name" id="name" class="w-full bg-gray-100 p-2 rounded-md mt-2">


                    <input type="hidden" name="event_id" id="event_id" value="{{$defaultValue}}" class="w-full bg-gray-100 p-2 rounded-md mt-2">


                </div>
                <div class="flex justify-between items-center mt-6">
                    <button @click="isOpen = false" class="bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300">Fermer</button>

                    <button id="btnAdd" class="bg-orangeClair text-white py-2 px-4 rounded-md hover:bg-orange">Ajouter</button>

                </div>
            </form>

        </div>
    </div>
</div>


<!-- Inclure Alpine.js pour gérer la logique JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<script>
    //if all champs is not remplis the bouton Ajouter is disable

    const name = document.getElementById('name');
    const duration = document.getElementById('duration');
    const price = document.getElementById('price');
    const max_capacity = document.getElementById('max_capacity');
    const type = document.getElementById('type');
    const ajouter = document.getElementById('btnAdd');
    ajouter.disabled = true;
    name.addEventListener('input', function() {
        if (name.value !== '' && duration.value !== '' && price.value !== '' && max_capacity.value !== '' && type.value !== '') {
            ajouter.disabled = false;
        } else {
            ajouter.disabled = true;
        }
    });
    duration.addEventListener('input', function() {
        if (name.value !== '' && duration.value !== '' && price.value !== '' && max_capacity.value !== '' && type.value !== '') {
            ajouter.disabled = false;
        } else {
            ajouter.disabled = true;
        }
    });
    price.addEventListener('input', function() {
        if (name.value !== '' && duration.value !== '' && price.value !== '' && max_capacity.value !== '' && type.value !== '') {
            ajouter.disabled = false;
        } else {
            ajouter.disabled = true;
        }
    });
    max_capacity.addEventListener('input', function() {
        if (name.value !== '' && duration.value !== '' && price.value !== '' && max_capacity.value !== '' && type.value !== '') {
            ajouter.disabled = false;
        } else {
            ajouter.disabled = true;
        }
    });
    type.addEventListener('input', function() {
        if (name.value !== '' && duration.value !== '' && price.value !== '' && max_capacity.value !== '' && type.value !== '') {
            ajouter.disabled = false;
        } else {
            ajouter.disabled = true;
        }
    });



</script>
