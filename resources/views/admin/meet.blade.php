<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



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
                        <select name="event_id" id="event_id" class="w-3/5 bg-gray-100 p-2 rounded-md mt-2">
                            @foreach($events as $event)
                                <option value="{{$event->id}}">{{$event->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-row items-center justify-between py-2" id="eventCategorySelect" style="display: none;">
                        <label for="event_category_id"  class="text-beige mr-5" >Catégorie d'événement</label>
                        <select name="event_category_id" id="event_category_id" class="w-3/5 bg-gray-100 p-2 rounded-md mt-2">
                            <!-- Options seront ajoutées dynamiquement par JavaScript -->
                        </select>
                    </div>

                    <div class="flex flex-row items-center justify-between py-2" id="eventVariationSelect" style="display: none;">
                        <label for="event_variation_id"  class="text-beige mr-5" >Variation d'événement</label>
                        <select name="event_variation_id" id="event_variation_id" class="w-3/5 bg-gray-100 p-2 rounded-md mt-2">
                            <!-- Les options seront ajoutées dynamiquement par JavaScript -->
                        </select>
                    </div>

                    <div class="flex flex-row items-center justify-between py-2">
                        <label for="startDate" class="text-beige mr-5">Date et heure de début</label>
                        <input type="datetime-local" name="startDate" id="startDate" class="w-3/5 bg-gray-100 p-2 rounded-md mt-2">
                    </div>
                    <div class="flex flex-row items-center justify-between py-2">
                        <label for="endDate" class="text-beige mr-5">Date et heure de fin</label>
                        <input type="datetime-local" name="endDate" id="endDate" class="w-3/5 bg-gray-100 p-2 rounded-md mt-2">
                    </div>
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex items-center w-1/2">
                            <label for="price" class="text-beige mr-16">Prix</label>
                            <input type="number" name="price" id="price" class="w-full bg-gray-100 p-2 rounded-md mt-2">
                        </div>

                        <div class="flex ml-4 items-center w-1/2">
                            <label for="address" class="text-beige mr-2">Adresse</label>
                            <input type="text" name="address" id="address" class="w-3/4 bg-gray-100 p-2 rounded-md mt-2">
                        </div>

                    </div>

                    <div class="flex flex-row items-center justify-between py-2">
                        <div class="flex w-1/2">
                            <label for="zipCode" class="text-beige mr-5">Code postal</label>
                            <input type="text" name="zipCode" id="zipCode" class="w-3/4 bg-gray-100 p-2 rounded-md mt-2">
                        </div>

                        <div class="flex ml-4 items-center w-1/2">
                            <label for="city" class="text-beige mr-9 ">Ville</label>
                            <input type="text" name="city" id="city" class="w-3/4 bg-gray-100 p-2 rounded-md mt-2">
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
<?php

use Illuminate\Support\Facades\DB;
$collectiveEvents = DB::table('collective_events AS ce')
    ->select('ce.*', 'ev.name AS event_name', DB::raw('COUNT(cec.customer_id) AS customer_count'))
    ->join('event_variations AS ev', 'ev.id', '=', 'ce.event_variation_id')
    ->leftJoin('collective_event_customer AS cec', 'ce.id', '=', 'cec.collective_event_id')
    ->groupBy('ce.id')
    ->get();
?>
<div class="flex justify-center items-center h-full my-10 mx-5">
    <div class="overflow-x-auto">
        <table class="table-fixed border-collapse max-w-sm max-h-60">
            <thead class="bg-orange">
            <tr class="text-beige">
                <th class="px-4 py-2">Nom de l'événement</th>
                <th class="px-4 py-2">Date de début</th>
                <th class="px-4 py-2">Date de fin</th>
                <th class="px-4 py-2">Nombre de participant actuel</th>
                <th class="px-4 py-2">Prix</th>
                <th class="px-4 py-2">Adresse</th>
                <th class="px-4 py-2">Action</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach($collectiveEvents as $reservation)
                <tr>
                    <td class="px-4 py-2">{{ $reservation->event_name }}</td>
                    <td class="px-4 py-2">{{ $reservation->startDate }}</td>
                    <td class="px-4 py-2">{{ $reservation->endDate }}</td>
                    <td class="px-4 py-2">{{ $reservation->customer_count }}</td>
                    <td class="px-4 py-2">{{ $reservation->price }}€</td>
                    <td class="px-4 py-2">{{ $reservation->address }}, {{ $reservation->zipCode }} {{ $reservation->city }}</td>



                    <div id="confirmationModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-8 rounded-lg">
                            <p class="text-xl mb-4">Êtes-vous sûr de vouloir supprimer cette demande de rendez-vous ?</p>
                            <form id="deleteForm{{$reservation->id}}" action="{{ route('deleteCollectiveEvent') }}" method="POST">
                                @csrf
                                <div class="flex justify-end">
                                    <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md mr-4">Confirmer</button>
                                    <button id="cancelButton" type="button" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
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
