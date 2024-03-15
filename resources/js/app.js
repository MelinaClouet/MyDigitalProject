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
        events: 'https://fullcalendar.io/api/demo-feeds/events.json'


    });

    calendar.render();

});
