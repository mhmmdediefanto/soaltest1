<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
    <div class="container p-20 bg-gray-200">
        @yield('main')
    </div>

    @livewireScripts
    @vite('resources/js/app.js')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
</body>

</html>
