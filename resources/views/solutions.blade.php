<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex-row items-center justify-center">
<div class="mt-36">
    <div
        class="justify-center border-b-cyan-600 border-t-red-500 border-4 rounded-2xl">
        <h1 class="h-1 justify-center flex text-3xl mb-12"> {{$codes}}</h1>
    </div>
</div>
</body>

</html>
