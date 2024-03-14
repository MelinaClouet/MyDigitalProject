const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .copy('node_modules/@fullcalendar/core/main.css', 'public/css/fullcalendar.css') // Copier les fichiers CSS de FullCalendar
    .copy('node_modules/@fullcalendar/core/main.min.js', 'public/js/fullcalendar.js') // Copier le fichier JS de FullCalendar
    .copy('node_modules/@fullcalendar/daygrid/main.min.js', 'public/js/daygrid.js') // Copier le plugin DayGrid de FullCalendar
    .copy('node_modules/@fullcalendar/timegrid/main.min.js', 'public/js/timegrid.js') // Copier le plugin TimeGrid de FullCalendar
    .copy('node_modules/@fullcalendar/interaction/main.min.js', 'public/js/interaction.js'); // Copier le plugin Interaction de FullCalendar
