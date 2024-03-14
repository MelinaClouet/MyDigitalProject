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

    <body class="" style="background-color: #FAE8E0">
        @include ('layouts.header')

        <div class="w-full mt-24 flex ">
            <div class="w-1/3 ">
                <div class="flex">
                    <img src="/assets/8.png" class="w-40 mt-12">
                    <img src="/assets/10.png" class="w-32 h-32 -ml-16 mt-3">
                </div>
                <div class="ml-36 -mt-24">
                    <img src="/assets/petiteFillePeinture.jpg" class="w-full mt-12 rounded-t-full">
                </div>
            </div>

            <div class="flex items-center justify-center w-2/3">
                <div class=" px-24">
                    <p class="madimi-one-regular text-center font-bold colorOrange text-3xl">SERVICES</p>
                    <p class="montserrat text-justify mt-10">Chez Mayuda, nous sommes dévoués à offrir une gamme complète de services conçus pour soutenir le bien-être et le développement de chaque enfant sur leur chemin vers l'adolescence.</p>
                    <p class="montserrat text-justify mt-10">Nous comprenons que chaque enfant est unique, c'est pourquoi nos services sont adaptés pour répondre à leurs besoins individuels!</p>
                </div>
            </div>
        </div>
        <div class="flex w-full" style="background-color: #FD6D2F">
            <div class="w-1/2 flex items-center justify-center flex-col m-10" style="color: #FAE8E0">
                <p class="font-semibold text-xl text-center montserrat">ENTRETIENS INDIVIDUELS</p>
                <p class=" montserrat mt-12 text-justify">Nos séances individuelles offrent un espace sûr et confidentiel où chaque enfant peut explorer ses pensées, ses émotions et ses préoccupations avec un professionnel qualifié.</p>
                <p class=" montserrat mt-7 text-justify"> Nous travaillons en étroite collaboration avec chaque enfant pour développer des stratégies de gestions du stress, renforcer la confinace en soi et promouboir un bien-être émotionnel durable.</p>
                <p class="montserrat font-semibold text-xl text-center mt-20">PROGRAMMES DE DÉVELOPPEMENT <br> PERSONNEL</p>
                <p class=" montserrat mt-12 text-justify">Nos programmes de développement personnel sont conçus pour aider les enfants à développer leur compétences sociales, émotionnelles et congnitives.</p>
                <p class=" montserrat mt-7 text-justify">À travers des activités ludiques et interactives, les enfants apprennent à gérer leur émotions, à résoudre les conflits et à développer des relations saines avec les autres.</p>
            </div>


            <div class="w-1/2 flex items-center justify-center">
                <img src="/assets/enfantsColor.jpg" class="w-2/3 rounded-full " style="transform: rotate(12deg)">
            </div>
        </div>
        <div class="w-full">
            <div class="h-1/3 flex">
                <div class="w-1/2 flex items-center justify-center flex-col">
                    <p class="colorOrange font-semibold text-xl">SOUTIEN PARENTAL</p>
                    <p class=" montserrat mt-12 text-justify">Nous croyons fermement que les parents jouent un rôle essentiel dans le développement de leurs enfants.</p>
                    <p class=" montserrat mt-12 text-justify">C'est pourquoi nous offrons des séances de soutien parental pour fournir aux parents les outils et les ressources dont ils ont besoin pour soutenir efficacement leurs enfants pendant cette période de transition critique.</p>
                </div>
                <div class="w-1/2">

                </div>
            </div>

            <div class="h-1/3">

            </div>

            <div class="h-1/3">

            </div>
        </div>

        @include('layouts.contact')
        @include('layouts.footer')
    </body>
</html>
