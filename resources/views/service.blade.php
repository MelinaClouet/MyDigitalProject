<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css','resources/js/app.js'])

    </head>

    <body class="bg-beige" >
        @include ('layouts.header', ['active' => 'services'])

        <div class="w-full mt-32 flex mb-5 lg:mt-[15rem] " >
            <div class="w-1/3">
                <div class="flex">
                    <img src="/assets/8.png" class="w-24 -ml-4 lg:-mt-[7rem] lg:w-48 lg:-ml-16">
                    <img src="/assets/10.png" class="w-20 -ml-10 mt-7 lg:-mt-[5rem] lg:w-32 lg:-ml-20">
                </div>
                <div class="h-full relative md:h-1/4">
                    <img src="/assets/petiteFillePeinture.jpg" class="w-full absolute bottom-[5.5rem] left-3 rounded-t-full md:w-1/2 md:-bottom-[4.6rem] md:ml-28 lg:w-1/2 lg:-bottom-[5.8rem] lg:ml-44">
                </div>

            </div>

            <div class="flex items-center justify-center w-3/4 lg:-mt-[5rem] lg:mb-[5rem]">
                <div class=" px-7 lg:px-10">
                    <h1 class="madimi-one-regular text-center font-bold text-orange text-3xl lg:text-5xl">SERVICES</h1>
                    <p class="montserrat text-justify mt-10">Mayuda est une entreprise qui s’engage à offrir une gamme complète de services conçus pour
                        préserver le bien-être et le développement de chaque enfant sur le chemin de l’adolescence..</p>
                    <p class="montserrat text-justify mt-5">Chaque enfant étant unique, notre entreprise s'engage à proposer une gamme variée
                        de services adaptés à leurs besoins individuels.</p>
                </div>
            </div>

        </div>
        <div class="flex w-full bg-orange px-10 lg:px-[8rem]">
            <div class="w-full flex items-center justify-center flex-col text-beige mt-5 md:w-2/3">
                <h2 class="font-semibold text-xl text-center montserrat mt-5 lg:text-2xl">CONSULTATIONS INDIVIDUELLES</h2>
                <p class=" montserrat mt-12 text-justify">Nos séances individuelles offrent un espace confidentiel où
                    chaque enfant peut explorer ses émotions et préoccupations </p>
                <p class=" montserrat mt-6 text-justify">C’est un travail en étroite collaboration avec chaque
                    enfant leur permettant de développer ses propres stratégies afin d’apprendre à gérer ses émotions,
                    renforcer sa confiance et son estime de soi et ce, afin de promouvoir un bien-être émotionnel durable.</p>

                <img src="/assets/enfantsColor.jpg" class="w-2/3 rounded-full ml-40 md:w-1/2 md:ml-[45rem] md:-mt-12 lg:w-1/2 lg:ml-[70rem] lg:-mt-36"  style="transform: rotate(12deg)">
                <img src="/assets/7.png" class="w-1/3 -mt-20 -ml-56 md:-mt-52 lg:-mt-64 lg:-ml-[40rem]">
                <h2 class="montserrat font-semibold text-xl text-center mt-2 md:-mt-2 lg:text-2xl lg:-mt-20">SÉANCES DE RELAXATION</h2>
                <p class=" montserrat my-5 text-justify lg:mb-20">La relaxation est un outil essentiel pour permettre à l'enfant de
                    gérer ses émotions et d'augmenter son sentiment de bien-être quotidien.

                </p>
             </div>

        </div>
        <div class="w-full">
            <div class="flex flex-col px-10 text-center my-10 lg:w-1/2">

                <h2 class="text-orange font-semibold text-xl lg:text-2xl">CAFÉS PARENTS</h2>
                <p class=" montserrat mt-12 text-justify">Il est inévitable que les parents jouent un rôle essentiel dans le développement de leur enfant. C’est
                    pour cela que Mayuda propose des réunions sous forme de cafés parents où une thématique est
                    abordée.</p>
                <p class=" montserrat mt-6 text-justify">Le but étant d’échanger sur celle-ci afin d’enrichir les connaissances de chacun toujours dans
                    le but de mieux comprendre son enfant.</p>
                <div class="relative">
                    <img src="/assets/11.png" class="w-1/4 absolute bottom-72 -right-11 md:bottom-44 md:w-1/6 lg:w-32 lg:bottom-44 lg:-right-[42rem]">
                </div>
            </div>

            <div class="h-1/3 flex ">

                <div class="w-full flex items-center justify-center flex-col px-10" >
                    <div class="w-1/2 flex flex-row items-start justify-start">
                        <img src="/assets/13.png" class=" h-1/2 -ml-24 md:-ml-52 lg:w-1/3">
                        <img src="/assets/7.png" class="h-1/3 -ml-5 md:-ml-16 ">

                    </div>
                    <div class="text-center -mt-20 md:-mt-52 lg:w-1/2 lg:ml-[40rem] lg:-mt-[30rem]">
                        <h2 class="text-orange font-semibold text-xl lg:text-2xl">ATELIERS INTERACTIS</h2>
                        <p class="montserrat mt-12 text-justify">Les ateliers proposés offrent aux enfants l’opportunité de se connecter à d’autres enfants et
                            d’échanger dans un environnement amusant et stimulant.</p>
                        <p class="montserrat mt-6 text-justify"> A travers une variété d’activités créatives
                            et éducatives, les enfants développent des compétences psycho-sociales, renforcent leur estime et
                            leur confiance en soi et découvrent de nouvelles passions</p>
                    </div>

                </div>

            </div>

            <div class="h-1/3  p-5">
                <p class="montserrat text-center mt-7 lg:text-xl lg:my-10">Mayuda s’engage à fournir des services de haute qualité afin d’emporter chaque enfant <br> qui franchira
                    notre porte sur le chemin d’un bien-être global.</p>

            </div>
        </div>

        @include('layouts.contact')
        @include('layouts.footer')
    </body>
</html>
