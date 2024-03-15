<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css','resources/js/app.js'])

    </head>

    <body class="bg-beige" >
        @include ('layouts.header')

        <div class="w-full mt-24 flex">
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
                    <p class="madimi-one-regular text-center font-bold text-orange text-3xl">SERVICES</p>
                    <p class="montserrat text-justify mt-10">Chez Mayuda, nous sommes dévoués à offrir une gamme complète de services conçus pour soutenir le bien-être et le développement de chaque enfant sur leur chemin vers l'adolescence.</p>
                    <p class="montserrat text-justify mt-10">Nous comprenons que chaque enfant est unique, c'est pourquoi nos services sont adaptés pour répondre à leurs besoins individuels!</p>
                </div>
            </div>
        </div>
        <div class="flex w-full bg-orange">
            <div class="w-1/2 flex items-center justify-center flex-col m-10 text-beige">
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
                <div class="w-1/2 flex items-center justify-center flex-col px-24 pt-10">
                    <p class="text-orange font-semibold text-xl">SOUTIEN PARENTAL</p>
                    <p class=" montserrat mt-12 text-justify">Nous croyons fermement que les parents jouent un rôle essentiel dans le développement de leurs enfants.</p>
                    <p class=" montserrat mt-12 text-justify">C'est pourquoi nous offrons des séances de soutien parental pour fournir aux parents les outils et les ressources dont ils ont besoin pour soutenir efficacement leurs enfants pendant cette période de transition critique.</p>
                </div>
                <div class="w-1/2 flex items-center justify-end -mt-80 -mr-16">
                    <img src="/assets/11.png" class="w-1/4">
                </div>
            </div>

            <div class="h-1/3 flex ">
                <div class="w-1/2 flex flex-row items-center justify-center">
                    <img src="/assets/13.png" class=" h-1/3 ">
                    <img src="/assets/7.png" class="h-1/4 -mt-32 -ml-9">


                </div>
                <div class="w-1/2 flex items-center justify-center flex-col px-24 -mt-32">
                    <p class="text-orange font-semibold text-xl">ATELIER INTERACTIFS</p>
                    <p class="montserrat mt-12 text-justify">Nos ateliers interactifs offrent aux enfants l'opportunité de se connecter avec d'autre enfants de leur âge dans un environnement  amusant et stimulant.</p>
                    <p class="montserrat mt-12 text-justify mt-10">À travers une variété d'activités créatives et éducatves, les enfants développent des compétences sociales, renforcent leur estime de soi et découvrent de nouvelles passions.</p>
                </div>

            </div>

            <div class="h-1/3 flex items-center justify-center px-28 pb-10 -mt-24">
                <p class="montserrat mt-12 text-center">Chez Mayuda, nous nous engageons à fournir des services de haute qualité qui favorisent le bien-être global de chaque enfant. Contactez-nous dès aujourd'hui pour en savoir plus sur la façon dont nous pouvons soutenir votre enfant sur son chemin vers l'adolescence.</p>

            </div>
        </div>

        @include('layouts.contact')
        @include('layouts.footer')
    </body>
</html>
