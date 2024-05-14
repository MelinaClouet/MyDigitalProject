import './bootstrap';
import 'flowbite';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';






function colorEvent(type) {
    // Fonction pour obtenir la couleur pastel en fonction du nom de l'événement
    switch(type) {
        case 'Atelier Bien-être':
            return '#FFD9B3'; // Orange pastel
        case 'Mini Débat':
            return '#B3E0FF'; // Bleu pastel
        case 'Première séance':
            return '#C2FFC2'; // Vert pastel
        case 'Enfant de 5 à 11 ans':
            return '#FFB3D9'; // Rose pastel
        case 'Adolescent de 11 à 15 ans':
            return '#FFFFB3'; // Jaune pastel
        case 'Adulte':
            return '#B3B3FF'; // Violet pastel
        case 'Cours particuliers du CP à la 3ème':
            return '#D9B3FF'; // Lavande pastel
        case 'Formation harcèlement au milieu scolaire':
            return '#FFB366'; // Orange clair pastel
        case 'Relaxation et gestio des émotions':
            return '#B3E0E3'; // Cyan pastel
        case 'Comment cultiver le bien-être à l\'école?':
            return '#FF6666'; // Rouge pastel
        case 'Education à la sexualité':
            return '#66FF99'; // Vert clair pastel
        case 'L\'empathie qu\'est-ce que c\'est?':
            return '#FF99FF'; // Rose clair pastel
        case 'Gérer ses émotions':
            return '#D9D9D9'; // Gris pastel
        default:
            return '#FFFFFF'; // Blanc
    }

}

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var events = [];
    var calendar = new Calendar(calendarEl, {
        locale: 'fr',
        plugins: [ dayGridPlugin, timeGridPlugin, interactionPlugin ],
        firstDay: 1,
        headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        businessHours: {
            daysOfWeek: [1, 2, 3, 4, 5],
            startTime: '08:00',
            endTime: '18:00'
        },
        initialView: 'dayGridMonth',
        editable:false,
        buttonIcons: true,
        themeSystem: 'bootstrap5',
        buttonText: {
            prev:'<',
            next:'>',
            today: 'Aujourd\'hui',
            month: 'Mois',
            week: 'Semaine',
            day: 'Jour'
        },
        events: function(fetchInfo, successCallback, failureCallback) {
            var events = [];

            // Récupérer les événements depuis la route '/getEvents'
            $.ajax({
                url: '/getReservationPersonnal',
                type: 'GET',
                success: function(response) {
                    console.log('ici');
                    console.log(response);
                    var reservations = response[0];

                    // Fonction récursive pour traiter chaque réservation et associer son type d'événement
                    function processReservation(index) {
                        console.log('index')
                        console.log(reservations);
                        if (index < reservations.length) {
                            var reservation = reservations[index];
                            console.log('reservation')
                            console.log(reservation);

                            // Récupérer le type d'événement depuis la route '/typeEvent/:event_id'
                            $.ajax({
                                url: '/typeEvent/' + reservation.event_variation_id,
                                type: 'GET',
                                success: function(response) {
                                    console.log(response);
                                    var typeEvent = response;

                                    for (var j = 0; j < typeEvent.length; j++) {
                                        console.log(typeEvent[j].name);
                                        events.push({
                                            title: typeEvent[j].name,
                                            start: reservation.startDate,
                                            end: reservation.endDate,
                                            color: colorEvent(typeEvent[j].name),
                                            id: reservation.id,
                                        });
                                    }

                                    // Appeler la fonction processReservation pour la réservation suivante
                                    processReservation(index + 1);
                                }
                            });
                        } else {
                            console.log('Toutes les réservations ont été traitées');

                            // Maintenant, récupérer les événements collectifs depuis la route '/getCollectiveEvents'
                            $.ajax({
                                url: '/getCollectiveEvents',
                                type: 'GET',
                                success: function(collectiveResponse) {
                                    console.log('Evénements collectifs récupérés:');
                                    console.log(collectiveResponse);
                                    var collectiveEvents = collectiveResponse;

                                    // Traiter les événements collectifs
                                    function processCollectiveEvent(index) {
                                        if (index < collectiveEvents.length) {
                                            var collectiveEvent = collectiveEvents[index];

                                            // Récupérer le type d'événement depuis la route '/typeEvent/:event_id'
                                            $.ajax({
                                                url: '/typeEvent/' + collectiveEvent.event_variation_id,
                                                type: 'GET',
                                                success: function(response) {
                                                    console.log(response);
                                                    var typeEvent = response;

                                                    for (var j = 0; j < typeEvent.length; j++) {
                                                        console.log(typeEvent[j].name);
                                                        events.push({
                                                            title: 'Cours collectif: ' + typeEvent[j].name,
                                                            start: collectiveEvent.startDate,
                                                            end: collectiveEvent.endDate,
                                                            color: colorEvent(typeEvent[j].name),
                                                            id: collectiveEvent.id,
                                                            address: collectiveEvent.address + ', ' + collectiveEvent.city + ', ' + collectiveEvent.zipCode,
                                                        });
                                                    }

                                                    // Appeler la fonction processCollectiveEvent pour l'événement collectif suivant
                                                    processCollectiveEvent(index + 1);
                                                }
                                            });
                                        } else {
                                            // Tous les événements collectifs ont été traités
                                            console.log('Tous les événements collectifs ont été traités');
                                            // Appeler le callback de succès avec tous les événements
                                            successCallback(events);
                                        }
                                    }

                                    // Démarrer le traitement des événements collectifs à partir de l'index 0
                                    processCollectiveEvent(0);
                                },
                                error: function(xhr, status, error) {
                                    console.log(error)
                                    console.error("Erreur lors de la récupération des événements collectifs:", error);
                                    // Appeler le callback d'échec en cas d'erreur
                                    failureCallback(error);
                                }
                            });
                        }
                    }

                    // Démarrer le traitement des réservations à partir de l'index 0
                    processReservation(0);

                },
                error: function(xhr, status, error) {
                    console.error("Erreur lors de la récupération des événements:", error);
                    // Appeler le callback d'échec en cas d'erreur
                    failureCallback(error);
                }
            });
        },


        eventClick: function(info) {
            var event = info.event;
            var modalContent = '';
            console.log(event)

            // Vérifier si l'événement est un cours individuel ou collectif
            if (event.title.includes('Cours collectif')) {
                //formattage des date de début et de fin
                var start = new Date(event.start);
                start = start.getDate() + ' ' + getMonthName(start.getMonth()) + ' ' + start.getFullYear() + ' à ' + start.getHours() + ':' + start.getMinutes() ;

                var end = new Date(event.end);
                end = end.getDate() + ' ' + getMonthName(end.getMonth()) + ' ' + end.getFullYear() + ' à ' + end.getHours() + ':' + end.getMinutes();
                // Si c'est un cours collectif, construire le contenu de la modal pour un cours collectif
                modalContent = `
            <div class="bg-white p-4 rounded shadow-md">
                <h4 class="text-lg text-violet">Réservartion cours collectif</h4>
                <br>
                <p><strong class="text-violet">Titre:</strong> ${event.title}</p>
                <br>
                <p><strong class="text-violet">Début:</strong> ${start}</p>
                <br>
                <p><strong class="text-violet">Fin:</strong> ${end}</p>
                <br>
                <p><strong class="text-violet">Adresse:</strong> ${event.extendedProps.address}</p>
                <br>

                <button id="requestParticipation" class="bg-orange hover:bg-orangeClair text-white font-bold py-2 px-4 rounded">Demander une participation</button>


            </div>
        `;
            } else {
                //formattage des date de début et de fin
                var start = new Date(event.start);
                start = start.getDate() + ' ' + getMonthName(start.getMonth()) + ' ' + start.getFullYear() + ' à ' + start.getHours() + ':' + start.getMinutes() ;

                var end = new Date(event.end);
                end = end.getDate() + ' ' + getMonthName(end.getMonth()) + ' ' + end.getFullYear() + ' à ' + end.getHours() + ':' + end.getMinutes();

                // Si c'est un cours individuel, construire le contenu de la modal pour un cours individuel
                modalContent = `
            <div class="bg-white p-4 rounded shadow-md">
            <h4 class="text-lg text-violet">Cours individuel</h4>
            <br>
                <p><strong class="text-violet">Titre:</strong> ${event.title}</p>
                <br>
                <p><strong class="text-violet">Début:</strong> ${start}</p>
                <br>
                <p><strong class="text-violet">Fin:</strong> ${end}</p>
                <!-- Ajoutez d'autres informations de l'événement individuel ici au besoin -->
            </div>
        `;
            }

            // Ajouter la modal au DOM
            var modal = document.createElement('div');
            modal.classList.add('fixed', 'top-0', 'left-0', 'w-full', 'h-full', 'flex', 'items-center', 'justify-center', 'bg-gray-800', 'bg-opacity-75', 'z-50');
            modal.innerHTML = modalContent;
            document.body.appendChild(modal);

            // Fermer la modal lorsque l'utilisateur clique en dehors de la modal
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.remove();
                }
            });
            // Gérer le clic sur le bouton Demander une participation
           var btn= document.getElementById('requestParticipation');
            btn.addEventListener('click', function() {
                console.log('click');
               $.ajax({
                    url: '/requestCollectiveEvent/' + event.id,
                    type: 'get',
                    success: function(response) {
                        console.log('Demande de participation envoyée');
                        alert(response.message);
                        modal.remove();
                    },
                    error: function(xhr, status, error) {
                        console.error("Erreur lors de l'envoi de la demande de participation:", error);
                        alert('Erreur lors de l\'envoi de la demande de participation');
                        modal.remove();
                    }
                });
            });
        }
    });


    calendar.render();

});
function getMonthName(monthIndex) {
    var months = [
        "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
        "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
    ];
    return months[monthIndex];
}

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendarAdmin');
    var events = [];

    var calendar = new Calendar(calendarEl, {
        locale: 'fr',
        plugins: [ dayGridPlugin, timeGridPlugin, interactionPlugin ],
        firstDay: 1,
        headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        businessHours: {
            daysOfWeek: [1, 2, 3, 4, 5],
            startTime: '08:00',
            endTime: '18:00'
        },
        initialView: 'dayGridMonth',
        editable:false,
        buttonIcons: true,
        themeSystem: 'bootstrap5',
        buttonText: {
            prev:'<',
            next:'>',
            today: 'Aujourd\'hui',
            month: 'Mois',
            week: 'Semaine',
            day: 'Jour'
        },
            eventClick: function(info) {

            $.ajax({
                url: '/getReservation/' + info.event._def.publicId,
                type: 'GET',
                success: function(response) {
                    console.log('admin reservation')
                    // Cette fonction est appelée lorsque vous cliquez sur un événement dans le calendrier
                    var modal = document.getElementById('modal');

                    // Ouvrir la modal
                    modal.__x.$data.isOpen = true;
                    console.log(response);
                    var reservation = response

                    // Formater la date de début
                    var start = new Date(reservation.event.startDate);
                    start = start.getDate() + ' ' + getMonthName(start.getMonth()) + ' ' + start.getFullYear();

// Formater la date de fin
                    var end = new Date(reservation.event.endDate);
                    end = end.getDate() + ' ' + getMonthName(end.getMonth()) + ' ' + end.getFullYear();

// Fonction pour obtenir le nom du mois en français


                    // Remplir les champs de la modal avec les informations de la réservation
                    document.getElementById('modalTitle').innerHTML = reservation.event_variation.name
                    document.getElementById('modalStartDate').innerHTML = start;
                    document.getElementById('modalEndDate').innerHTML =end;
                    document.getElementById('modalEmail').innerHTML = reservation.customer.email;
                    document.getElementById('modalPhone').innerHTML = reservation.customer.phone;
                    document.getElementById('modalFirstName').innerHTML = reservation.customer.firstName;
                    document.getElementById('modalLastName').innerHTML = reservation.customer.lastName;
                    document.getElementById('modalAddress').innerHTML = reservation.customer.address;
                    document.getElementById('modalCity').innerHTML = reservation.customer.city;
                    document.getElementById('modalPostalCode').innerHTML = reservation.customer.postal_code;


                }
            });
        },

        events: function (fetchInfo, successCallback, failureCallback) {
            events = [];
            // Récupérer les événements depuis la route '/admin/getAllEvent'
            $.ajax({
                url: '/admin/getAllEvent',
                type: 'GET',
                success: function(response) {
                    console.log('admin event')
                    console.log(response);
                    var reservations = response;

                    // Fonction récursive pour traiter chaque réservation et associer son type d'événement
                    function processReservation(index) {
                        if (index < reservations.length) {
                            var reservation = reservations[index];

                            // Récupérer le type d'événement depuis la route '/typeEvent/:event_id'
                            $.ajax({
                                url: '/typeEvent/' + reservation.event_variation_id,
                                type: 'GET',
                                success: function(response) {
                                    console.log(response);
                                    var typeEvent = response;

                                    for (var k = 0; k < typeEvent.length; k++) {
                                        console.log(typeEvent[k].name);
                                        events.push({
                                            title: typeEvent[k].name,
                                            start: reservation.startDate,
                                            end: reservation.endDate,
                                            color: colorEvent(typeEvent[k].name),
                                            id: reservation.id,
                                        });
                                    }

                                    // Appeler la fonction processReservation pour la réservation suivante
                                    processReservation(index + 1);
                                }
                            });
                        } else {
                            // Toutes les réservations ont été traitées, appeler le callback de succès
                            successCallback(events);
                        }
                    }

                    // Démarrer le traitement des réservations à partir de l'index 0
                    processReservation(0);
                },
                error: function(xhr, status, error) {
                    console.error("Erreur lors de la récupération des événements:", error);
                    // Appeler le callback d'échec en cas d'erreur
                    failureCallback(error);
                }
            });
        },
    });

    calendar.render();
});


