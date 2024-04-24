<?php
$me=session('me');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Admin Panel</title>


</head>
<body >
<header>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <nav>

        <div class="flex items-center justify-between h-10 bg-white text-orange px-5">
            <button id="toggleMenuBtn" class="pl-64">
                <i class="ri-menu-line text-2xl"></i>
            </button>
            <p class="font-Roboto">MAYUDA</p>
            <p class="text-orangeClair montserrat">{{$me->email}}</p>
        </div>

        <!--sidenav -->
        <div class="fixed left-0 top-0 w-64 h-full bg-white p-4 z-50 sidebar-menu transition-transform">


            <a href="/" class="flex items-center justify-center">
                <img src="/assets/logo.png" class="h-20">
            </a>
            <ul class="mt-10">
                <p class="text-orange font-bold montserrat py-5">ADMIN</p>
                <li class="mb-1 group">
                    <a href="/admin/services" class="flex items-center py-2 px-4 text-gray-900 hover:bg-beige hover:text-black rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='bx bx-book-heart pr-3 text-xl' style='color:#F8B59C'  ></i>
                        <p class="montserrat text-sm ">SERVICES</p>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="/admin/users" class="flex items-center py-2 px-4 text-gray-900 hover:bg-beige hover:text-black rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class='bx bx-user pr-3 text-xl' style='color:#f8b59c'  ></i>
                        <span class="montserrat text-sm">CLIENTS</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="/admin/formations" class="flex  items-center py-2 px-4 text-gray-900 hover:bg-beige hover:text-black rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='bx bxs-graduation pr-3 text-xl' style='color:#F8B59C' ></i>
                        <span class="montserrat text-sm">FORMATIONS</span>
                    </a>
                </li>

                <p class="text-orange font-bold montserrat py-5">PERSO</p>
                <li class="mb-1 group ">
                    <a href="/admin/allReservations" class="flex items-center py-2 px-4 text-gray-900 hover:bg-beige hover:text-black rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='bx bx-calendar pr-3 text-xl' style='color:#F8B59C'></i>
                        <span class=" montserrat text-sm">RÉSERVATIONS</span>
                    </a>
                </li>




            </ul>
            <a href="/logout" class="absolute bottom-0 left-0 w-full bg-orange text-white py-3 text-center">Déconnexion</a>
        </div>
        <!-- end sidenav -->

        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const toggleMenuBtn = document.getElementById('toggleMenuBtn');
            const sidebarMenu = document.querySelector('.sidebar-menu');
            const myTable= document.getElementById('divTableUser');
            const divTitleServices= document.getElementById('divTitleServices');
            const calendarAdmin= document.getElementById('calendarAdmin');

            toggleMenuBtn.addEventListener('click', function() {
                sidebarMenu.classList.toggle('-translate-x-full');
                toggleMenuBtn.classList.toggle('pl-64');
                divTableUser.classList.toggle('justify-center');
                divTableUser.classList.toggle('items-center');
                divTitleUsers.classList.toggle('ml-auto');


            });

            document.getElementById('closeMenuBtn').addEventListener('click', function() {
                sidebarMenu.classList.add('-translate-x-full');


            });


        </script>
    </nav>

</header>


</body>
</html>
