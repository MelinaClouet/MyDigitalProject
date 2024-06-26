

@extends('layouts.base',  ['active' => 'rendezVous'])

@section('title', 'Rendez-vous')

@section('content')

    <?php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;
    $me=session()->get('me');


// Date actuelle
    $currentDate = Carbon::now();

// Date 3 mois dans le passé
    $threeMonthsAgo = $currentDate->copy()->subMonths(3);

// Date 3 mois dans le futur
    $threeMonthsLater = $currentDate->copy()->addMonths(3);

// Récupération des réservations
    $reservations = App\Models\Reservation::where('customer_id', $me->id)
        ->whereBetween('startDate', [$threeMonthsAgo, $threeMonthsLater])
        ->orderBy('startDate', 'desc')
        ->get();

    $collectiveEvents = DB::table('collective_events as ce')
        ->join('collective_event_customer as cec', 'ce.id', '=', 'cec.collective_event_id')
        ->join('event_variations as ev', 'ev.id', '=', 'ce.event_variation_id')
        ->where('cec.customer_id', $me->id) // Assurez-vous de remplacer 14 par la valeur que vous souhaitez
        ->select('ce.startDate', 'ce.endDate', 'ce.price', 'ce.address', 'ce.city', 'ce.zipCode', 'ev.name')
        ->get();


    ?>

    <h1 class="text-violet text-2xl font-bold mt-32 flex items-center justify-center montserrat">TOUTES MES RÉSERVATIONS</h1>
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

    <div class="flex justify-end items-end md:mr-5 mt-3">
        <button id="openModalButton" class="bg-orangeClair text-white py-2 px-4 rounded-md hover:bg-orange">Faire une demande de rendez-vous</button>
    </div>

    <div class="flex justify-center items-center h-full my-10 mx-5">
        <div class="overflow-x-auto">
            <table class=" table-fixed border-collapse w-auto">
                <thead class="bg-orange">
                <tr class="text-beige">
                    <th class="px-4 py-2">Nom de l'événement</th>
                    <th class="px-4 py-2">Date de début</th>
                    <th class="px-4 py-2">Date de fin</th>
                    <th class="px-4 py-2">Statut</th>
                    <th class="px-4 py-2">Prix</th>
                    <th class="px-4 py-2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    <tr>

                        <td class=" px-4 py-2">{{ $reservation->eventVariation->name }}</td>
                        <td class=" px-4 py-2">{{ $reservation->startDate }}</td>
                        <td class=" px-4 py-2">{{ $reservation->endDate }}</td>
                        @if($reservation->status == 'confirmed')
                            <td class=" px-4 py-2 text-green-400">Confirmé</td>
                        @elseif($reservation->status == 'pending')
                            <td class=" px-4 py-2 text-orange">En attente</td>

                        @else
                            <td class=" px-4 py-2 text-red-500">Annulé</td>
                        @endif
                        <td class=" px-4 py-2">{{ $reservation->price }}€</td>
                        @if($reservation->status == 'pending')
                            <td id="delete{{$reservation->id}}">
                                <i class="fas fa-trash-alt cursor-pointer" id="deleteIcon{{$reservation->id}}"></i>
                            </td>


                            <div id="confirmationModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                <div class="bg-white p-8 rounded-lg">
                                    <p class="text-xl mb-4">Êtes-vous sûr de vouloir supprimer cette demande de rendez-vous ?</p>
                                    <form id="deleteForm{{$reservation->id}}" action="{{ route('deleteReservation') }}" method="POST">

                                        @csrf
                                        <div class="flex justify-end">
                                            <input id="inputReservationDelete" type="hidden" name="reservation_id">
                                            <button id="btnSubmitDelete" type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md mr-4 ">Confirmer</button>
                                            <button id="cancelButton" type="button" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400">Annuler</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <script>

                                var input=document.getElementById('inputReservationDelete');


                                // Sélectionnez l'icône de suppression
                                var deleteIcon = document.getElementById('deleteIcon{{$reservation->id}}');
                                // Ajoutez un écouteur d'événements pour le clic sur l'icône de suppression
                                deleteIcon.addEventListener('click', function() {
                                    console.log({{$reservation->id}})
                                    input.value={{$reservation->id}};
                                    console.log(input.value)
                                    // Afficher la modal de confirmation
                                    confirmationModal.classList.remove('hidden');
                                });

                                // Sélectionnez la modal de confirmation
                                var confirmationModal = document.getElementById('confirmationModal');

                                // Sélectionnez le bouton d'annulation dans la modal
                                var cancelButton = document.getElementById('cancelButton');



                                // Ajoutez un écouteur d'événements pour le clic sur le bouton d'annulation
                                cancelButton.addEventListener('click', function() {
                                    // Cacher la modal de confirmation
                                    confirmationModal.classList.add('hidden');
                                });


                                var btnSubmit=document.getElementById('btnSubmitDelete');
                            </script>



                        @endif



                    </tr>
                @endforeach
                @foreach($collectiveEvents as $event)
                    <tr>
                        <td class=" px-4 py-2">{{ $event->name }}</td>
                        <td class=" px-4 py-2">{{ $event->startDate }}</td>
                        <td class=" px-4 py-2">{{ $event->endDate }}</td>
                        <td class=" px-4 py-2 text-green-400">Confirmé</td>
                        <td class=" px-4 py-2">{{ $event->price }}€</td>

                @endforeach
                </tbody>
            </table>
        </div>


    </div>

    <div id="reservationModal" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg">
            <h2 class="text-lg font-semibold mb-4">Demande de réservation</h2>
            <form action="{{ route('addReservation') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="event_id" class="block text-sm font-medium text-gray-700">Événement</label>
                    <select name="event_id" id="event_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        <option value="1">Cours particulier du CP à la 3ème</option>
                        <option value="2">Première séance - Consultation individuelle</option>
                        <option value="3">Enfant de 5 à 11 ans - Consultation individuelle</option>
                        <option value="4">Adolescent - Consultation individuelle</option>
                        <option value="5">Adulte - Consultation individuelle</option>


                    </select>
                </div>

                <label for="date">Choisir la date :</label>
                <input type="date" id="date" name="date" required>
                <p id="dateErrorMessage" class="text-red-500"></p>
                <br><br>
                <label for="horaire">Choisir l'horaire :</label>
                <div id="horaires" class="mb-10">
                    <!-- Les boutons d'horaire seront ajoutés ici via JavaScript -->
                </div>
                <input type="hidden" id="selectedHoraire" name="selectedHoraire"> <!-- Champ de formulaire caché pour stocker l'horaire sélectionné -->

                <div class="flex justify-between">
                    <button id="submit" type="submit" class="bg-orange text-white py-2 px-4 rounded-md hover:bg-orange-dark">Demander une réservation</button>
                    <button id="closeModalButton" type="button" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md ml-4 hover:bg-gray-400">Fermer</button>
                </div>
            </form>
        </div>
    </div>

    <script>



        function selectHoraire(time) {
            const selectedHoraireInput = document.getElementById('selectedHoraire');
            selectedHoraireInput.value = time; // Stocker l'horaire sélectionné dans le champ de formulaire caché
            console.log(time);
        }

        // Lorsque la date est changée
        document.getElementById('date').addEventListener('change', function() {
            var selectedDate = this.value;
            var currentDate = new Date(); // Date actuelle

            // Vérifie si la date sélectionnée est antérieure à la date actuelle
            if (new Date(selectedDate) < currentDate) {
                document.getElementById('dateErrorMessage').textContent = 'Veuillez choisir une date égale ou ultérieure à aujourd\'hui.';
                this.value = ''; // Efface la valeur de l'input date
                //disable submit button
                btnSubmit.disabled = true;
                return;
            } else {
                document.getElementById('dateErrorMessage').textContent = ''; // Efface le message d'erreur
            }
            // Vérifier si la date sélectionnée est un samedi (6) ou un dimanche (0)
            if (new Date(selectedDate).getDay() === 6 || new Date(selectedDate).getDay() === 0) {
                document.getElementById('dateErrorMessage').textContent = 'Veuillez choisir une date en semaine.';
                this.value = ''; // Efface la valeur de l'input date
                //disable submit button
                return;
            } else {
                document.getElementById('dateErrorMessage').textContent = ''; // Efface le message d'erreur
            }

            console.log(selectedDate);

            // Appel AJAX pour récupérer les réservations pour la date sélectionnée
            $.ajax({
                url: '/getAllReservation',
                method: 'GET',
                data: {
                    date: selectedDate
                },
                success: function(data) {
                    var reservations = data;
                    var horairesPris = data.map(function(reservation) {
                        return new Date(reservation.startDate).toLocaleTimeString('fr-FR', {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                    }); // Extracting start times from reservations
                    console.log('Horaires pris :')
                    console.log(horairesPris);

                    // Appel AJAX pour vérifier les cours collectifs
                    $.ajax({
                        url: '/getCollectiveEventsDate',
                        method: 'GET',
                        data: {
                            date: selectedDate
                        },
                        success: function(data) {
                            console.log('Cours collectifs :')
                            console.log(data);
                            var collectiveEvents = data;
                            var isCollectiveEvent = collectiveEvents.length > 0;

                            if (isCollectiveEvent) {
                                disableAllHoraires(); // Désactive tous les boutons si un cours collectif est présent
                            } else {
                                updateHoraires(horairesPris); // Update les boutons d'horaire avec les horaires pris
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });


        // Fonction pour mettre à jour les boutons d'horaire
        function updateHoraires(horairesPris) {
            var horairesContainer = document.getElementById('horaires');
            horairesContainer.innerHTML = ''; // Nettoyer les anciens boutons

            var heuresDisponibles = ["8h30", "9h30", "10h30", "11h30", "13h30", "14h30", "15h30", "16h30", "17h30"];


            // Créer les boutons d'horaire et les désactiver si l'horaire est déjà pris
            heuresDisponibles.forEach(function(heure) {
                heure = heure.replace('h', ':').padStart(5, '0');

                var button = document.createElement('button');
                button.textContent = heure;
                button.style.margin = '5px'; // Ajout de la marge
                button.style.padding = '8px 12px'; // Ajout du rembourrage
                button.style.border = '1px solid #ccc'; // Ajout de la bordure
                button.style.borderRadius = '5px'; // Ajout du rayon de bordure
                button.style.borderColor = '#F8B59C';
                button.style.background = '#F8B59C'; // Ajout de la couleur de fond
                button.style.color = '#333';

                button.addEventListener('click', function(event) {
                    var allButton = document.querySelectorAll('#horaires button');
                    allButton.forEach(function(bouton) {
                        bouton.style.background = '#F8B59C';
                    });
                    event.preventDefault();
                    button.style.background = '#FD6D2F'; // Ajout de la couleur de fond
                    selectHoraire(heure);
                });

                // Vérifie si l'heure est dans les heures prises
                var isPris = horairesPris.includes(heure);
                console.log('Heure : ' + horairesPris)
                console.log('Heure prise : ' + heure)

                if (isPris) {
                    console.log('Heure prise : ' + heure)
                    button.disabled = true;
                    button.style.background = '#ccc'; // Ajout de la couleur de fond
                    button.style.borderColor = '#ccc';
                }

                horairesContainer.appendChild(button);
            });
        }


        // Fonction pour désactiver tous les boutons d'horaire
        function disableAllHoraires() {
            var horairesContainer = document.getElementById('horaires');
            horairesContainer.innerHTML = ''; // Nettoyer les anciens boutons

            var heuresDisponibles = ["8h30", "9h30", "10h30", "11h30","12h30", "13h30", "14h30", "15h30", "16h30", "17h30"];

            heuresDisponibles.forEach(function(heure) {
                var button = document.createElement('button');
                button.textContent = heure;
                button.style.margin = '5px'; // Ajout de la marge
                button.style.padding = '8px 12px'; // Ajout du rembourrage
                button.style.border = '1px solid #ccc'; // Ajout de la bordure
                button.style.borderRadius = '5px'; // Ajout du rayon de bordure
                button.style.borderColor = '#ccc';
                button.style.background = '#ccc'; // Ajout de la couleur de fond
                button.style.color = '#333';
                button.disabled = true;

                horairesContainer.appendChild(button);
            });
        }

    </script>

    <script>


        // Sélectionnez le bouton d'ouverture de la modal
        const openModalButton = document.getElementById('openModalButton');

        // Sélectionnez la modal
        const reservationModal = document.getElementById('reservationModal');

        // Ajoutez un écouteur d'événements pour le clic sur le bouton
        openModalButton.addEventListener('click', function() {
            // Afficher la modal
            reservationModal.classList.remove('hidden');
        });
        const closeModalButton = document.getElementById('closeModalButton');

        // Ajoutez un écouteur d'événements pour le clic sur le bouton de fermeture
        closeModalButton.addEventListener('click', function() {
            // Cacher la modal
            const reservationModal = document.getElementById('reservationModal');
            reservationModal.classList.add('hidden');
        });




    </script>
@endsection
