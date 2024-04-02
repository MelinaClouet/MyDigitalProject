<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])


</head>

<body class="bg-beige mt-32">

@include ('layouts.header', ['active' => 'about'])
<div class="flex justify-center items-center">
    <div class="bg-white w-3/4 rounded overflow-hidden shadow-lg">
        <table class="w-full ">
            <thead class="text-orange">
                <tr class="bg-white">
                    <th class="px-4 py-2">NOM</th>
                    <th class="px-4 py-2">PRENOM</th>
                    <th class="px-4 py-2">Adresse</th>
                    <th class="px-4 py-2">N° téléphone</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">ACTIONS</th>
                </tr>
            </thead>
            <tbody>

            <?php

                //changement pour datatable
                   $isWhite=1;
                   ?>
            @foreach($customers as $oneCustomer)
                <?php
                    if ($isWhite==1){
                        $isWhite=0;
                        ?>
                        <tr class="bg-beige">
                    <?php
                    }
                    else{
                        $isWhite=1;
                        ?>
                            <tr class="bg-white">
                       <?php
                    }
                                ?>


                    <td class="px-4 py-2">{{ $oneCustomer->lastName}}</td>
                    <td class="px-4 py-2">{{ $oneCustomer->firstName}}</td>
                    <td class="px-4 py-2">{{ $oneCustomer->address}} {{$oneCustomer->postal_code}} {{$oneCustomer->city}}</td>
                    <td class="px-4 py-2">{{ $oneCustomer->phone}}</td>
                    <td class="px-4 py-2">{{ $oneCustomer->email}}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


</body>
</html>
