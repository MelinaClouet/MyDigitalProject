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

<div class="flex">
    <div class="w-3/4 flex ml-auto" id="divTitleUsers">
        <p class="text-3xl p-5 text-violet font-bold"> • • GESTION DES CLIENTS • •</p>
    </div>
</div>

<div class="flex justify-end items-end mr-10 " id="divTableUser">
    <div class="bg-white w-3/4 rounded overflow-hidden shadow-lg p-3">
        <table class="w-full cell-border stripe " id="myTable">
            <thead class="text-orange">
            <tr class="bg-white">
                <th class="">#</th>
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
                    <td class="border px-4 py-2">{{ $customer->id }}</td>
                    <td class="border px-4 py-2">{{ $customer->lastName }}</td>
                    <td class="border px-4 py-2">{{ $customer->firstName }}</td>
                    <td class="border px-4 py-2">{{ $customer->address }} {{$customer->postal_code}} {{$customer->city}}</td>
                    <td class="border px-4 py-2">{{ $customer->phone }}</td>
                    <td class="border px-4 py-2">{{ $customer->email }}</td>
                    <td>
                        @if($customer->status==0)
                            <a href="activeAccount/{{$customer->id}}" class="text-violet mr-2 ml-4">
                                <i class="fas fa-user "></i> <span class="text-sm text-black">Activer le compte</span>
                            </a>
                        @endif
                        @if($customer->status==1)
                            <a href="/admin/deleteUser/{{$customer->id}}" class="text-red-500 mr-2 ml-4">
                                <i class="fas fa-trash"></i>
                            </a>

                        @endif
                    </td>

                   <!-- <td class="border py-2 ">
                        <a href="#" class="text-blue-500 mr-2 ml-4">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="deleteModal">
                            <div class="flex items-center justify-center min-h-screen" id="deleteModal1">
                                <div class="relative bg-white w-96 max-w-md mx-auto rounded shadow-lg">
                                    <div class="p-6">
                                        <h2 class="text-xl font-semibold text-red-600">Confirmation de suppression</h2>
                                        <p class="text-gray-600">Êtes-vous sûr de vouloir supprimer ce client ?</p>
                                        <div class="mt-6 flex justify-end">
                                            <button class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 mr-2" onclick="closeDeleteModal()">Annuler</button>
                                            <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" id="suppression{{$customer->id}}" onclick="deleteClient({{$customer->id}})">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="text-red-500" id="delete{{$customer->id}}" onclick="openDeleteModal({{$customer->id}})">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>-->
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
    });
</script>
<script>






    function openDeleteModal(id) {
        console.log(id);
        document.getElementById('deleteModal').classList.remove('hidden');
        return id;
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal1').classList.add('hidden');
    }

    function deleteClient(id) {
        console.log('suppression');
        console.log(id);
        let url='/admin/deleteUser/'+id;

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}",
            },
            success: function (response) {

                console.log(response);
                reloadTable();
                closeDeleteModal();
            }
        });
    }
    //recharge le tableau après suppression
    function reloadTable() {
        $('#myTable').DataTable().ajax.reload();
    }
</script>

</body>
</html>
