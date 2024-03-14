<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('/resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

</head>
<body class="" style="background-color: #FAE8E0 ">
@include ('layouts.headerHome')
<div class="flex justify-between mt-32">
    <div class="w-1/3">
        <div class="flex">
            <img src="/assets/1.png" class="w-56 h-56 -ml-28 mt-20">
            <img src="/assets/8.png" class="w-32 h-32 -ml-24 mt-24">
        </div>
    </div>


    <div class="w-1/3">
        <div class="rounded-full overflow-hidden h-80 w-72  ">
            <img src="/assets/enfantDos.jpg" alt="My image" class=" object-cover rounded-full">
        </div>
    </div>


    <div class="w-1/3 ">
        <div class="flex items-center justify-center mr-24">
            <p class="montserrat text-2xl mt-10 text-center">
                MAYUDA, <br> qu'est ce que c'est ?
            </p>
        </div>
        <div class="mt-7 mr-24 montserrat">
            <p class="text-justify">
                Une entreprise spécialisée dans le bien-être de l'enfant et de l'adolescent. Un accompagnement
                personnalisé et adapté aux besoins de chacun. Des formations de qualité pour enfants, adolescents et
                adultes.
            </p>
        </div>

        <div class="rounded-full overflow-hidden h-32 w-32 mt-12 ml-28 ">
            <img src="/assets/7.png" alt="My image" class="h-full w-full object-cover rounded-full">
        </div>

        <div class="rounded-full overflow-hidden h-36 w-36 -mt-24 ml-52">
            <img src="/assets/8.png" alt="My image" class="h-full w-full object-cover rounded-full">
        </div>
    </div>
</div>

<div class="flex justify-between">
    <div class="bg-purple-600 w-full flex justify-between items-center" style="background-color: #F8B59C;">
        <p class="ml-4">Text</p>
        <div class="-mr-20">
            <img src="/assets/7.png" alt="My image" class="object-cover rounded-full h-36">
        </div>
    </div>

    <div class="w-full flex justify-center items-center">
        <p>Image</p>
    </div>
</div>

<div class="pb-10" style="background-color: #FD6D2F;">
    <div class="flex items-center justify-center ">
        <p class="text-white montserrat text-lg mt-5 font-bold">NOS SERVICES</p>
    </div>
    <div class="-mt-24 flex justify-end -mr-3">
        <img src="/assets/11.png" alt="My image" class="object-cover rounded-full h-36">
    </div>
    <div class="flex justify-evenly">
        <div>
            <img src="/assets/5.png" alt="Image 1" class="object-cover h-36">
            <p class="text-center text-white montserrat font-semibold mt-4">
                Soutient <br> scolaire
            </p>
        </div>
        <div>
            <img src="/assets/4.png" alt="Image 2" class="object-cover h-36">
            <p class="text-center text-white montserrat font-semibold mt-4">Développement <br> personnel</p>
        </div>
        <div>
            <img src="/assets/3.png" alt="Image 3" class="object-cover h-36">
            <p class="text-center text-white montserrat font-semibold mt-4">Conseil <br> parental</p>
        </div>
    </div>
</div>
@include ('layouts.contact')

@include ('layouts.footer')
</body>
</html>
