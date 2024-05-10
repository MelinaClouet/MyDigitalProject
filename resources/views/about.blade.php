<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">


</head>

<style>

     p {
         font-family: 'Quicksand', sans-serif;
     }
     h2{
         font-family: 'Quicksand', sans-serif;
     }
    .font-poetsen {
        font-family: 'Poetsen One', sans-serif;
    }

</style>
<body class="bg-beige">

@include ('layouts.header', ['active' => 'about'])

<div class="w-screen mt-16 flex flex-col md:flex-row  ">
    <div class="w-full p-8 md:ml-10">
        <div class="lg:flex lg:items-center lg:justify-center ">
            <h1 class="text-violet font-bold text-2xl text-center mt-12 font-poetsen">QUELQUES MOTS <br> SUR
                L'ENTREPRISE</h1>
        </div>

        <h2 class=" my-10 text-justify">
            Bienvenue chez Mayuda, votre partenaire dévoué dans le domaine du coaching de bien-être, spécialisé dans l'accompagnement de l'enfant vers l'adolescence.</h2>
        <div class="lg:flex lg:items-center lg:justify-center ">
            <p class="text-violet font-bold text-xl mt-12 font-poetsen lg:mt-6">Le pourquoi du comment.</p>
        </div>

        <p class=" my-10 text-justify"> Diplômée en Psychologie et Sciences de l'Éducation,
            avec une expertise avérée dans les Métiers de l'Enseignement, de l'Éducation et de la Formation,
            j'ai consacré mon parcours à cultiver le bien-être et à faciliter la transmission des connaissances. </p>
        <p class=" my-10 mt-6 text-justify"></p>
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
            <p class=" text-justify">À travers mes expériences professionnelles,
                j'ai constaté la pression grandissante que subissent les enfants,
                soumis à un rythme effréné entre l'école, la maison, et les activités extrascolaires.
                Cette réalité engendre un stress croissant, compromettant leur épanouissement
                et leur apprentissage optimal. </p>
            <p class=" text-justify mt-10">C'est pourquoi je me suis orientée vers les métiers du
                développement personnel, où j'ai découvert la puissance de la conscience de soi pour
                une guérison individuelle. Le chemin vers le mieux-être passe par la gestion émotionnelle,
                la découverte de soi, et l'amour propre.</p>

            <div class="flex justify-center mt-12 w-full">
                <a href="/services">
                    <button class="rounded-3xl w-full h-10 text-white  items-center bg-orange mx-10">
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
            <p class=" text-justify"> C’est en ce sens que des métiers axés sur le développement personnel fondés sur la conscience de soi,
                ont permis pour tout individu, une prise en main de sa propre guérison. Se diriger vers un mieux-être,
                c’est apprendre à gérer ses émotions, c’est découvrir la possibilité de grandir autrement, c’est
                apprendre à aimer son corps et son être comme il se doit.</p>
            <p class=" text-justify mt-12">Mon engagement professionnel en tant qu'Assistante pédagogique m'a
            permis de comprendre les besoins cruciaux des enfants et des adolescents dans leur quête d'identité et
            d'équilibre. Ainsi, chez Mayuda, nous nous engageons à offrir un accompagnement personnalisé,
            en phase avec vos valeurs profondes, pour favoriser l'épanouissement et la confiance en soi
            de chaque individu.</p>
            <p class=" text-justify mt-12"> Bienvenue chez Mayuda! </p>
            <div class="flex justify-center mt-12 mb-10">
                <a href="/contact">
                    <button class="rounded-3xl w-full h-10 text-white  items-center mx-10 bg-orange">
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
