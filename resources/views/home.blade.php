<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])


</head>
<body class="bg-beige mt-10">
@include ('layouts.header', ['active' => 'home'])
<div class="flex flex-col lg:flex-row w-full position-relative">
    <div class="flex flex-row lg:w-1/2 " id="image">
        <div class="-ml-16 lg:mt-20">
            <div class="flex justify-start -ml-16">
                <img src="/assets/1.png" class="w-56 h-56 mt-20">
                <img src="/assets/8.png" class="w-32 h-32 mt-24 -ml-24 ">
            </div>
        </div>


        <div class="w-1/2 mt-20 ml-10 lg:w-3/4 ">
            <div class="rounded-full overflow-hidden">
                <img src="/assets/enfantDos.jpg" alt="My image" class="object-cover rounded-full">
            </div>
        </div>
    </div>

    <div class="mx-10 lg:w-1/2 lg:mt-28" id="text">
        <div class="flex items-center justify-center md:justify-centermd:mt-10 lg:justify-center">


            <h1 class="montserrat text-2xl sm:text-xl mt-10 text-center lg:text-center lg:text-3xl">Mayuda - Accompagnement au bien-être <br> pour enfants et adolescents</h1>
        </div>
        <div class="mt-7 montserrat text-center md:text-left">
            <p class="text-justify lg:text-lg">
                Découvrez Mayuda, votre partenaire pour le développement personnel de vos enfants.
                Formée en psychologie et éducation,
                notre coach offre des séances individuelles et des ateliers axés sur la relaxation,
                la gestion des émotions et la construction de l'estime de soi.
                Ensemble, construisons un avenir serein pour vos enfants.
            </p>
        </div>

        <div class="flex relative justify-center -mt-6 md:-mt-2 lg:mt-6">
            <div class="rounded-full overflow-hidden absolute z-10 mr-16 mt-10">
                <img src="/assets/7.png" alt="My image" class="h-16 w-full lg:h-28 ">
            </div>

            <div class="rounded-full overflow-hidden relative z-0">
                <img src="/assets/8.png" alt="My image" class="h-24 w-full lg:h-32">
            </div>
        </div>

    </div>
</div>
<div class="flex relative justify-between w-full mt-10">
    <div class="w-1/2 flex justify-center items-center bg-orangeClair relative ">
        <p class="text-lg text-beige text-center mx-2 z-0 md:text-2xl lg:text-4xl lg:mx-10" style="font-family: 'Heiti TC'">"Il est grand temps de rallumer les étoiles."</p>
    </div>

    <div class="h-full w-1/2 z-10 relative">
        <div class="absolute inset-0 flex justify-start items-center -ml-9">
            <img src="/assets/7.png" alt="Another Image" class="object-cover h-20 lg:h-32 lg:-ml-6">
        </div>
        <img src="/assets/15.jpg" class="w-full">
    </div>
</div>

<div class="pb-10 bg-orange relative">
    <div class="flex items-center justify-center z-20">
        <h2 class="text-beige montserrat text-lg mt-5 font-bold lg:text-2xl">NOS SERVICES</h2>
    </div>
    <div class="flex items-center justify-center">
        <div class="w-2/3">
            <p class="text-justify py-5 lg:p-20 montserrat lg:text-lg text-white">
                Nous proposons une gamme complète de services, comprenant des séances individuelles,
                des ateliers de groupe et des formations sur mesure.
                Que vous soyez à la recherche d'une relaxation profonde,
                de techniques pour gérer le stress ou de conseils pour renforcer votre estime de soi,
                Mayuda est là pour vous accompagner.
            </p>
        </div>
    </div>

    <div class="absolute top-0 right-0 -mt-10 -mr-4 z-30">
        <img src="/assets/11.png" alt="My image" class="object-cover rounded-full h-24">
    </div>
    <div class="flex justify-evenly z-20 mt-5">
        <div>
            <img src="/assets/5.png" alt="Image 1" class="object-cover h-24 md:h-32 lg:h-40">
            <h3 class="text-center text-white montserrat font-semibold mt-4">
                Soutient <br> scolaire
            </3>
        </div>
        <div>
            <img src="/assets/4.png" alt="Image 2" class="object-cover h-24 md:h-32 lg:h-40">
            <h3 class="text-center text-white montserrat font-semibold mt-4">Développement <br> personnel</h3>
        </div>
        <div>
            <img src="/assets/3.png" alt="Image 3" class="object-cover h-24 md:h-32 lg:h-40">
            <h3 class="text-center text-white montserrat font-semibold mt-4">Conseil <br> parental</h3>
        </div>
    </div>
</div>

@include ('layouts.contact')

@include ('layouts.footer')
</body>
</html>
