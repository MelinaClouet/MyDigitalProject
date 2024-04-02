<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MAYUDA Admin</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/main.js" defer></script>
</head>
<body>
<div id="app">
    <!-- Sidebar -->
    @include('layouts.headerAdmin')

    <!-- Page Content -->

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>
</html>
