<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])


</head>

<body class="bg-beige">

@include ('layouts.header', ['active' => 'rendezVous'])

<?php
    $me=session()->get('me');
    $reservations=App\Models\Reservation::where('customer_id', $me->id)->get();
?>

<h1 class="text-violet text-2xl font-bold mt-32 flex items-center justify-center montserrat">TOUTES MES RÉSERVATIONS</h1>

<div class="flex items-center mt-14 mx-24 mb-10">
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








@include('layouts.contact')
@include('layouts.footer')

</body>
</html>
