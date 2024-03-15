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
                    <p class="montserrat text-justify mt-10">Mayuda est une entreprise qui s’engage à offrir une gamme complète de services conçus pour
                        préserver le bien-être et le développement de chaque enfant sur le chemin de l’adolescence..</p>
                    <p class="montserrat text-justify mt-10">Chaque enfant est unique, c’est pourquoi la mission première de l’entreprise est de s’adapter au mieux
                        aux besoins de chacun.</p>
                </div>
            </div>
        </div>
        <div class="flex w-full bg-orange">
            <div class="w-1/2 flex items-center justify-center flex-col m-10 text-beige">
                <p class="font-semibold text-xl text-center montserrat">ENTRETIENS INDIVIDUELS</p>
                <p class=" montserrat mt-12 text-justify">Les séances individuelles offrent un espace sûr et confidentiel où chaque enfant peut explorer ses
                    pensées, ses émotions et ses préoccupations. </p>
                <p class=" montserrat mt-6 text-justify">C’est un travail en étroite collaboration avec chaque
                    enfant leur permettant de développer ses propres stratégies afin d’apprendre à gérer ses émotions,
                    renforcer sa confiance et son estime de soi et ce, afin de promouvoir un bien-être émotionnel durable.</p>
                <p class="montserrat font-semibold text-xl text-center mt-20">SÉANCES DE RELAXATION</p>
                <p class=" montserrat mt-12 text-justify">La relaxation est un outil qui permet à l’enfant de prendre contact avec ses émotions. Le but étant de
                    les reconnaître afin d’apprendre à les gérer et augmenter le sentiment de bien-être au quotidien.</p>
             </div>


            <div class="w-1/2 flex items-center justify-center">
                <img src="/assets/enfantsColor.jpg" class="w-1/2 rounded-full " style="transform: rotate(12deg)">
            </div>
        </div>
        <div class="w-full">
            <div class="h-1/3 flex">
                <div class="w-1/2 flex items-center justify-center flex-col px-24 pt-10">
                    <p class="text-orange font-semibold text-xl">CAFÉS PARENTS</p>
                    <p class=" montserrat mt-12 text-justify">Il est inévitable que les parents jouent un rôle essentiel dans le développement de leur enfant. C’est
                        pour cela que Mayuda propose des réunions sous forme de cafés parents où une thématique est
                        abordée.</p>
                    <p class=" montserrat mt-6 text-justify">Le but étant d’échanger sur celle-ci afin d’enrichir les connaissances de chacun toujours dans
                        le but de mieux comprendre son enfant.</p>
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
                    <p class="text-orange font-semibold text-xl">ATELIERS INTERACTIS</p>
                    <p class="montserrat mt-12 text-justify">Les ateliers proposés offrent aux enfants l’opportunité de se connecter à d’autres enfants et
                        d’échanger dans un environnement amusant et stimulant.</p>
                    <p class="montserrat mt-6 text-justify"> A travers une variété d’activités créatives
                        et éducatives, les enfants développent des compétences psycho-sociales, renforcent leur estime et
                        leur confiance en soi et découvrent de nouvelles passions</p>
                </div>

            </div>

            <div class="h-1/3 flex items-center justify-center px-36 pb-10 -mt-24">
                <p class="montserrat mt-12 text-center">Mayuda s’engage à fournir des services de haute qualité afin d’emporter chaque enfant <br> qui franchira
                    notre porte sur le chemin d’un bien-être global.</p>

            </div>
        </div>

        @include('layouts.contact')
        @include('layouts.footer')
    </body>
</html>
