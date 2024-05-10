<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">

</head>
<style>
    .font-poetsen {
        font-family: 'Poetsen One', sans-serif;
    }
    p {
        font-family: 'Quicksand', sans-serif;
    }

</style>

<body class="bg-beige">

@include ('layouts.header', ['active' => 'rendezVous'])

<?php
use Carbon\Carbon;
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
?>

<h1 class="text-violet text-2xl font-bold mt-32 flex items-center justify-center montserrat">TOUTES MES RÉSERVATIONS</h1>
<div class="flex items-center mt-14 mx-24 mb-10">
    <div class="flex flex-col">
        <table class="table-auto w-full border-collapse">
            <thead class="bg-orange">
            <tr class="text-beige">
                <th class="px-4 py-2">Nom de l'événement</th>
                <th class="px-4 py-2">Date de début</th>
                <th class="px-4 py-2">Date de fin</th>
                <th class="px-4 py-2">Statut</th>
                <th class="px-4 py-2">Prix</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td class="border px-4 py-2">{{ $reservation->eventVariation->name }}</td>
                    <td class="border px-4 py-2">{{ $reservation->startDate }}</td>
                    <td class="border px-4 py-2">{{ $reservation->endDate }}</td>
                    @if($reservation->status == 'confirmed')
                        <td class="border px-4 py-2">Confirmé</td>
                    @else
                        <td class="border px-4 py-2 text-red-500">Annulé</td>
                    @endif
                    <td class="border px-4 py-2">{{ $reservation->price }}€</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="ml-8 bg-orangeClair p-4 rounded-lg">
        <h2 class="text-lg font-semibold mb-4 text-beige">Demande de réservation</h2>
        <form method="POST">
            @csrf
            <div class="mb-4">
                <label for="event_id" class="block text-sm font-medium text-gray-700">Événement</label>
                <select name="event_id" id="event_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <!-- Options d'événement à ajouter dynamiquement -->
                </select>
            </div>
            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
                <input type="datetime-local" name="start_date" id="start_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-700">Date de fin</label>
                <input type="datetime-local" name="end_date" id="end_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <button type="submit" class="bg-orange text-white py-2 px-4 rounded-md hover:bg-orange-dark">Demander une réservation</button>
            </div>
        </form>
    </div>
</div>









@include('layouts.contact')
@include('layouts.footer')

</body>
</html>
