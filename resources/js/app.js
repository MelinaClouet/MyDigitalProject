import './bootstrap';
import 'flowbite';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';






document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

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
        events: function (fetchInfo, successCallback, failureCallback) {
            var events=[];
            // Récupérer les congés depuis la route getAllLeave
            $.ajax({
                url: '/getEvents',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    var reservations= response.events;
                    for (var i = 0; i < reservations.length; i++) {
                        console.log(reservations[i]);
                        events.push({
                            title: reservations[i].lastName + ' ' + reservations[i].firstName,
                            start: reservations[i].startDate,
                            end: reservations[i].endDate,
                            color: typeEvent(reservations[i].type_event),
                        });
                    }
                    console.log(events);
                    successCallback(events);
                }
            });
        },


    });

    calendar.render();

});

function typeEvent(type) {
    switch (type) {
        case 'meeting':
            return '#9C84C2';
        case 'sick':
            return 'bg-primary';
        case 'Maladie':
            return 'bg-warning';
        case 'Télétravail':
            return 'bg-success';
        default:
            return 'bg-info';
    }
}
