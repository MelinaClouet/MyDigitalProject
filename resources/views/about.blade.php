<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])


</head>

<body class="bg-beige">

@include ('layouts.header')

<div class="w-screen mt-16 flex flex-col md:flex-row  ">
    <div class="w-full p-8 md:ml-10">
        <div class="lg:flex lg:items-center lg:justify-center ">
            <p class="text-violet font-bold text-3xl mt-12 madimi-one-regular">QUELQUES MOTS <br> SUR
                L'ENTREPRISE</p>
        </div>

        <p class="montserrat my-10 text-justify">Bienvenue chez Mayuda, entreprise spécialisée dans le bien-être de l’enfant et son voyage vers
            l’adolescence.</p>
        <div class="lg:flex lg:items-center lg:justify-center ">
            <p class="text-violet font-bold text-xl mt-12 madimi-one-regular lg:mt-6">Le pourquoi du comment.</p>
        </div>

        <p class="montserrat my-10 text-justify"> Diplômée d’une Licence de Psychologie et Sciences de l’Education ainsi que d’un Master des Métiers
            de l’Enseignement, de l’Education et de la Formation, mon cursus a toujours été centré sur le bien-
            être et la transmission. </p>
        <p class="montserrat my-10 mt-6 text-justify"></p>
    </div>

    <div class="w-2/3 flex justify-end -mt-16 rotate-12 ml-28 md:mt-28 md:mr-12 lg:mr-24 ">
        <div class="h-80 w-72 lg:h-96">
            <img src="/assets/famille.jpg" class="h-full w-full object-cover rounded-full">
        </div>
    </div>
</div>




<div class="flex flex-row w-full lg:-mt-20">
    <div class="w-1/3">
        <img src="/assets/1.png" class="h-1/3 w-full -ml-10 mt-32 md:-ml-24 md:h-1/2 lg:-ml-40">
        <img src="/assets/9.png" class="h-1/4 -mt-60 md:h-1/3 lg:-mt-72">
    </div>

    <div class="w-full flex items-center justify-center mt-14">
        <div class="mr-5">
            <p class="montserrat text-justify">C’est donc par le biais de mes études, et tout particulièrement lors de mes
                expériences professionnelles, que je me suis rendue compte que la société actuelle contraint les
                enfants à être de plus en plus sollicités à l’école et donc par conséquent, à se trouver plus
                régulièrement en situation de stress. </p>
            <p class="montserrat text-justify mt-10">A cela, s’ajoute un rythme intense entre la maison et l’école, avec
                des horaires harassantes, des quantités de sommeil variables, des devoirs, des activités extra-
                scolaires,… tout ce qui empêche l’enfant de se trouver dans une posture idéale d’apprentissage.</p>

            <div class="flex justify-center mt-12 w-full">
                <a href="/services">
                    <button class="rounded-3xl w-full h-10 text-white montserrat items-center bg-orange mx-10">
                        NOS SERVICES
                    </button>
                </a>
            </div>

        </div>
    </div>
</div>
<div class="flex flex-row mt-14">
    <div class="flex w-full justify-end">
        <div class="w-full px-10 justify-center text-center">
            <p class="montserrat text-justify"> C’est en ce sens que des métiers axés sur le développement personnel fondés sur la conscience de soi,
                ont permis pour tout individu, une prise en main de sa propre guérison. Se diriger vers un mieux-être,
                c’est apprendre à gérer ses émotions, c’est découvrir la possibilité de grandir autrement, c’est
                apprendre à aimer son corps et son être comme il se doit.</p>
            <p class="montserrat text-justify mt-12">Mon expérience professionnelle en tant qu’Assistante pédagogique au sein d’un collège m’a permis
                d’en apprendre beaucoup au sujet des enfants et des difficultés qu’ils rencontrent pour apprendre à
                se connaître eux-mêmes, se comprendre et comprendre les autres. Pour cela, je souhaite me consacrer
                personnellement au bien-être de l’enfant et de l’adolescent afin d’être en phase avec mes valeurs
                profondes, et ainsi, diffuser au plus grand nombre l’épanouissement et la confiance en soi.</p>
            <p class="montserrat text-justify mt-12"> Bienvenue chez Mayuda! </p>
            <div class="flex justify-center mt-12 mb-10">
                <a href="/contact">
                    <button class="rounded-3xl w-full h-10 text-white montserrat items-center mx-10 bg-orange">
                        NOUS CONTACTER
                    </button>
                </a>

            </div>
        </div>
    </div>
    <div class="justify-end w-1/4 mt-52 md:mt-20 lg:mt-5">
        <img src="/assets/8.png" class=" h-32 lg:h-44">
        <img src="/assets/7.png" class="h-14 w-14 -mt-10 md:h-20 md:w-20 lg:h-32 lg:w-32 lg:-ml-5 lg:-mt-16">
    </div>
</div>



@include('layouts.contact')
@include('layouts.footer')

</body>
</html>
