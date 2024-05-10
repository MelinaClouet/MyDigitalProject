<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])


</head>

<body class="bg-beige">

@include ('layouts.headerAdmin')

<?php

    $events = App\Models\Event::all();

    ?>

<div class="flex flex-col items-center justify-center ">
    <div class="w-full py-10 flex flex-col items-center" id="divTitleServices">
        <p class="text-3xl text-violet font-bold">CRÉATION RENDEZ-VOUS COLLECTIF</p>
    </div>

   <div class="w-full flex flex-col items-center justify-center gap-y-5">
       <div class="bg-orangeClair rounded-2xl w-full md:w-1/2 flex flex-col items-center px-4">
           <form action="{{ route('addMeet') }}" method="POST">
               @csrf
                <div class="w-full">

                    <div class="flex flex-row items-center justify-between py-2">
                        <label for="event_id"  class="text-beige mr-5" >Événement</label>
                        <select name="event_id" id="event_id" class="w-full bg-gray-100 p-2 rounded-md mt-2">
                            @foreach($events as $event)
                                <option value="{{$event->id}}">{{$event->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-row items-center justify-between py-2" id="eventCategorySelect" style="display: none;">
                        <label for="event_category_id"  class="text-beige mr-5" >Catégorie d'événement</label>
                        <select name="event_category_id" id="event_category_id" class="w-full bg-gray-100 p-2 rounded-md mt-2">
                            <!-- Options seront ajoutées dynamiquement par JavaScript -->
                        </select>
                    </div>

                    <div class="flex flex-row items-center justify-between py-2" id="eventVariationSelect" style="display: none;">
                        <label for="event_variation_id"  class="text-beige mr-5" >Variation d'événement</label>
                        <select name="event_variation_id" id="event_variation_id" class="w-full bg-gray-100 p-2 rounded-md mt-2">
                            <!-- Les options seront ajoutées dynamiquement par JavaScript -->
                        </select>
                    </div>

                    <div class="flex flex-row items-center justify-between py-2">
                        <label for="startDate" class="text-beige mr-5">Date et heure de début</label>
                        <input type="datetime-local" name="startDate" id="startDate" class="w-full bg-gray-100 p-2 rounded-md mt-2">
                    </div>
                    <div class="flex flex-row items-center justify-between py-2">
                        <label for="endDate" class="text-beige mr-5">Date et heure de fin</label>
                        <input type="datetime-local" name="endDate" id="endDate" class="w-full bg-gray-100 p-2 rounded-md mt-2">
                    </div>

                    <div class="flex flex-row items-center justify-between py-2">
                        <label for="price"class="text-beige mr-5">Prix</label>
                        <input type="number" name="price" id="price" class="w-full bg-gray-100 p-2 rounded-md mt-2">
                    </div>

                    <div class="flex flex-row items-center justify-between py-2">
                        <label for="address" class="text-beige mr-5">Adresse</label>
                        <input type="text" name="address" id="address" class="w-full bg-gray-100 p-2 rounded-md mt-2">
                    </div>

                    <div class="flex flex-row items-center justify-between py-2">
                        <div class="flex">
                            <label for="zipCode" class="text-beige mr-5">Code postal</label>
                            <input type="text" name="zipCode" id="zipCode" class="w-full bg-gray-100 p-2 rounded-md mt-2">
                        </div>

                        <div class="flex ml-4 items-center">
                            <label for="city" class="text-beige mr-5 ">Ville</label>
                            <input type="text" name="city" id="city" class="w-full bg-gray-100 p-2 rounded-md mt-2">
                        </div>
                    </div>
                    <div class="flex flex-row justify-end items-center py-2">
                        <button type="submit" class="bg-orange hover:bg-beige text-white font-bold py-2 px-4 rounded m-2 ">
                            Ajouter
                        </button>
                    </div>

                </div>
           </form>
       </div>
   </div>


</div>

<script>
    // Fonction pour charger les catégories d'événements en fonction de l'événement sélectionné
    function updateEventCategories() {
        var event_id = document.getElementById('event_id').value;
        var eventCategorySelect = document.getElementById('eventCategorySelect');

        // Si la valeur de l'événement est 1 ou 2, afficher le deuxième menu déroulant et charger les catégories d'événements
        if (event_id === '1' || event_id === '2') {
            eventCategorySelect.style.display = 'flex';

            // Envoyer une requête AJAX pour récupérer les catégories d'événements en fonction de l'événement sélectionné
            fetch('getEventCategories/' + event_id)
                .then(response => response.json())
                .then(data => {
                    var eventCategorySelectOptions = document.getElementById('event_category_id');
                    eventCategorySelectOptions.innerHTML = '';

                    // Ajouter les options au menu déroulant
                    data.forEach(function(category) {
                        var option = document.createElement('option');
                        option.value = category.id;
                        option.text = category.name;
                        eventCategorySelectOptions.appendChild(option);
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des catégories d\'événements:', error));
        } else {
            // Si la valeur de l'événement n'est pas 1 ou 2, masquer le deuxième menu déroulant
            eventCategorySelect.style.display = 'none';
        }
    }

    // Appeler la fonction pour mettre à jour les catégories d'événements initialement
    updateEventCategories();

    // Ajouter un écouteur d'événement pour détecter les changements dans le premier menu déroulant
    document.getElementById('event_id').addEventListener('change', updateEventCategories);

    // Fonction pour charger les variations d'événements en fonction de la catégorie d'événement sélectionnée
    function updateEventVariations() {
        var event_category_id = document.getElementById('event_category_id').value;
        var eventVariationSelect = document.getElementById('eventVariationSelect');

        // Si la catégorie d'événement est sélectionnée, afficher le menu déroulant des variations d'événements
        if (event_category_id) {
            eventVariationSelect.style.display = 'flex';

            // Envoyer une requête AJAX pour récupérer les variations d'événements en fonction de la catégorie d'événement sélectionnée
            fetch('getEventVariations/' + event_category_id)
                .then(response => response.json())
                .then(data => {
                    var eventVariationSelectOptions = document.getElementById('event_variation_id');
                    eventVariationSelectOptions.innerHTML = '';

                    // Ajouter les options au menu déroulant
                    data.forEach(function(variation) {
                        var option = document.createElement('option');
                        option.value = variation.id;
                        option.text = variation.name + " - " + variation.duration;
                        eventVariationSelectOptions.appendChild(option);
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des variations d\'événements:', error));
        } else {
            // Si aucune catégorie d'événement n'est sélectionnée, masquer le menu déroulant des variations d'événements
            eventVariationSelect.style.display = 'none';
        }
    }

    // Ajouter un écouteur d'événement pour détecter les changements dans le menu déroulant de la catégorie d'événement
    document.getElementById('event_category_id').addEventListener('change', updateEventVariations);
</script>


</body>
</html>
