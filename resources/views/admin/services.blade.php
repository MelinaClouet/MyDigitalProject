<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">

    <!-- Ajoutez votre propre fichier CSS pour personnaliser les boutons -->
    <style>
        .dt-button {
            background-color: #FD6D2F !important;
            color: white !important;
            border: 1px solid white !important ;
            border-radius: 10px !important;
        }

    </style>
</head>

<body class="bg-beige ">

@include ('layouts.headerAdmin')

<div class="flex flex-col items-center justify-center ">
    <div class="w-full py-10 flex flex-col items-center" id="divTitleServices">
        <p class="text-3xl text-violet font-bold"> • • SERVICES • •</p>
    </div>

    <div class="bg-orangeClair rounded-2xl w-1/2 flex flex-col px-5">
        <p class="text-lg font-semibold montserrat py-5">ATELIER BIEN-ÊTRE</p>
        <div>

        </div>
    </div>
</div>







</body>
</html>
