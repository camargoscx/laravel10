<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle') - {{ config('app.name') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body>
    <section class="container px-4 mx-auto">
    <head>
        @yield('header')
    </head>
    <div class="content">
        @yield('content')
    </div>
    <footer>
        #default footer
    </footer>
</section>
</body>

</html>