<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('/resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>
<body class="" style="background-color: #FAE8E0 ">
    @include ('layouts.header')
    <div class="h-1/2">
        <div class="flex justify-between">
            <div>
                <p>fleur</p>
            </div>
            <div class="rounded-full overflow-hidden">
                <img src="{{ asset('/assets/enfantDos.jpg') }}" alt="My image">
            </div>

            <div>
                <p>text</p>
            </div>
        </div>
    </div>

@include ('layouts.footer')
</body>
</html>
