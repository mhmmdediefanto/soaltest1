<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
    <div class="container p-20 bg-gray-200">
        @yield('main')
    </div>

    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
