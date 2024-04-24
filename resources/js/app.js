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

                        $.ajax({
                            url: '/typeEvent/'+reservations[i].event_id,
                            type: 'GET',
                            success: function(response) {
                                console.log(response);
                                var typeEvent = response;
                               for (var j = 0; j < typeEvent.length; j++){
                                   events.push({
                                       title: typeEvent[j].name,
                                       start: reservations[i].startDate,
                                       end: reservations[i].endDate,
                                   });
                                   console.log(events);
                                      successCallback(events);
                               }
                            }
                        });

                    }
                }
            });
        },


    });

    calendar.render();

});

function typeEvent(type) {
    switch (type) {
        case 'meeting':
            return '1';
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


document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendarAdmin');

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
                url: '/admin/getAllEvent',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    var reservations= response;
                    for (var i = 0; i < reservations.length; i++) {
                        console.log(reservations[i]);
                        //requet ajax with route /Admin/getCustomer
                        $.ajax({
                            url: '/admin/getCustomer',
                            type: 'GET',
                            data: {
                                id: reservations[i].customer_id
                            },
                            success: function(response) {
                                console.log(response);
                                var customer = response;
                                console.log('reservations');
                                console.log(reservations[0]);
                                for(var j = 0; j < reservations.length; j++){
                                    if(reservations[j].customer_id == customer.id){
                                        events.push({
                                            title: customer.lastName + ' ' + customer.firstName,
                                            start: reservations[j].startDate,
                                            end: reservations[j].endDate,
                                            color: typeEvent(reservations[j].type_event),
                                        });
                                    }
                                }

                                console.log(events);
                                successCallback(events);
                            }
                        });


                    }
                }
            });
        },


    });

    calendar.render();

});

