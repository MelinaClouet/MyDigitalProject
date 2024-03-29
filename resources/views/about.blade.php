<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])


</head>

<body class="bg-beige">

@include ('layouts.header')

<div class="w-full flex mt-20">
    <div class="w-1/2 px-16">
        <p class="text-violet font-bold flex justify-center text-3xl mt-12 madimi-one-regular">QUELQUES MOTS <br> SUR
            L'ENTREPRISE</p>
        <p class="montserrat my-10 text-justify">Bienvenue chez Mayuda, entreprise spécialisée dans le bien-être de l’enfant et son voyage vers
            l’adolescence.</p>
        <p class="text-violet font-bold flex justify-center text-xl mt-12 madimi-one-regular">Le pourquoi du comment.</p>
        <p class="montserrat my-10 text-justify "> Diplômée d’une Licence de Psychologie et Sciences de l’Education ainsi que d’un Master des Métiers
            de l’Enseignement, de l’Education et de la Formation, mon cursus a toujours été centré sur le bien-
            être et la transmission. </p>
        <p class="montserrat my-10 mt-6 text-justify "></p>
    </div>

    <div class="w-1/2 flex items-center justify-center">
        <div class="overflow-hidden h-80 w-72">
            <img src="/assets/famille.jpg" class="h-full w-full object-cover rounded-full">
        </div>
    </div>
</div>

<div class="flex">
    <div class="w-1/4 flex">
        <img src="/assets/1.png" class="-ml-20 mt-16 h-2/3">
        <img src="/assets/9.png" class="-ml-20 mt-32 h-1/3 ">
    </div>

    <div class="w-3/4 px-16 flex items-center justify-center">
        <div>
            <p class="montserrat text-justify">C’est donc par le biais de mes études, et tout particulièrement lors de mes
                expériences professionnelles, que je me suis rendue compte que la société actuelle contraint les
                enfants à être de plus en plus sollicités à l’école et donc par conséquent, à se trouver plus
                régulièrement en situation de stress. </p>
            <p class="montserrat text-justify mt-10">A cela, s’ajoute un rythme intense entre la maison et l’école, avec
                des horaires harassantes, des quantités de sommeil variables, des devoirs, des activités extra-
                scolaires,… tout ce qui empêche l’enfant de se trouver dans une posture idéale d’apprentissage.</p>
            <div class="flex justify-center mt-12">
                <a href="/services">
                    <button class="rounded-3xl w-full h-10 text-white montserrat items-center mx-10 bg-orange">
                        NOS SERVICES
                    </button>
                </a>

            </div>
        </div>
    </div>
</div>

<div class="flex w-full">
    <div class="w-3/4 px-16 py-10">
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
        <div class="flex justify-center mt-12">
            <a href="/contact">
                <button class="rounded-3xl w-full h-10 text-white montserrat items-center mx-10 bg-orange">
                    NOUS CONTACTER
                </button>
            </a>

        </div>
    </div>

    <div class="w-1/4 mr-32">
        <img src="/assets/8.png" class="w-64 mt-5 ml-36">
        <img src="/assets/7.png" class="w-52 ml-28 -mt-20">
    </div>
</div>


@include('layouts.contact')
@include('layouts.footer')

</body>
</html>
