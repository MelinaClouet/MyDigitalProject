<?php
use App\Models\EventCategorie;
?>
    <!-- Inclure Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- HTML de la modal -->
<div x-data="{ isOpen: false }">
    <!-- Bouton pour ouvrir la modal -->
    <button @click="isOpen = true" class="w-full bg-beige rounded-2xl mb-5 font-semibold" id="{{$defaultValue}}" >
        +
    </button>

    <!-- Modal -->
    <div x-show="isOpen" @click.away="isOpen = false" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50">
        <div class="bg-white rounded-lg p-8 max-w-md mx-auto">
            <!-- Contenu de la modal -->
            <h2 class="text-2xl font-semibold mb-4 text-orange">Ajouter un type de service</h2>
            <form action="{{route('addFormation')}}" method="POST">
                @csrf
                <div>
                    <label class="text-orangeClair" for="type">Type</label>
                    <select name="type" id="type" class="w-full bg-gray-100 p-2 rounded-md mt-2">
                        <?php
                        $events=EventCategorie::where('event_id', '2')->get();
                        ?>
                        @foreach($events as $event)
                            <option value="{{ $event->id }}" @if($event->id === $defaultValue) selected @endif>{{ $event->name }}</option>
                        @endforeach
                    </select>

                    <label class="text-orangeClair" for="name">Nom de l'atelier</label>
                    <input type="text" name="name" id="name" class="w-full bg-gray-100 p-2 rounded-md mt-2">

                    <div class=" flex w-full gap-x-2">

                        <div class="w-1/2">
                            <label class="text-orangeClair" for="duration">Durée</label>
                            <input type="text" name="duration" id="duration" class="w-full bg-gray-100 p-2 rounded-md mt-2" required>
                        </div>

                        <div class="w-1/2">
                            <label class="text-orangeClair" for="price">Prix</label>
                            <input type="number" name="price" id="price" class="w-full bg-gray-100 p-2 rounded-md mt-2" >
                        </div>

                    </div>
                    <label class="text-orangeClair" for="max_capacity">Capacité maximale</label>
                    <input type="number" name="max_capacity" id="max_capacity" class="w-full bg-gray-100 p-2 rounded-md mt-2" required>

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
