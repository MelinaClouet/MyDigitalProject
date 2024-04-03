<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">
</head>

<body class="bg-beige mt-32">

@include ('layouts.header', ['active' => 'about'])
<div class="flex justify-center items-center">
    <div class="bg-white w-3/4 rounded overflow-hidden shadow-lg p-3">
        <table class="w-full cell-border stripe" id="myTable">
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
            @foreach($customers as $customer)
                <tr>
                    <td class="border px-4 py-2">{{ $customer->lastName }}</td>
                    <td class="border px-4 py-2">{{ $customer->firstName }}</td>
                    <td class="border px-4 py-2">{{ $customer->address }} {{$customer->postal_code}} {{$customer->city}}</td>
                    <td class="border px-4 py-2">{{ $customer->phone }}</td>
                    <td class="border px-4 py-2">{{ $customer->email }}</td>
                    <td class="border py-2 ">
                        <a href="#" class="text-blue-500 mr-2 ml-4">
                            <i class="fas fa-pencil-alt"></i> <!-- Icone de crayon -->
                        </a>
                        <a href="#" class="text-red-500">
                            <i class="fas fa-trash-alt"></i> <!-- Icone de poubelle -->
                        </a>
                    </td>



                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
</div>

<!-- Ajout de jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>


<script>
    $(document).ready( function () {
        $('#myTable').DataTable({

            scrollX: true,
            layout: {
                topStart: {
                    buttons: ['pdf', 'print']
                }
            },
            pageLength:10,
            language : {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"},

        });
    } );
</script>
</body>
</html>
