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
<body class="bg-gray-900 min-h-screen flex-row items-center justify-center p-20">
<div class="justify-center border-b-cyan-600 border-r-cyan-600 border-t-red-500 border-l-red-500 border-4 rounded-2xl p-10">
    @if (!$info->isEmpty())
        <pre class="flex mb-5 bg-red-600 rounded-2xl p-4 justify-center">
            <code class="language-php rounded-2xl">
                {{ htmlspecialchars($info[0]->solution) }}
            </code>
        </pre>
        <h1 class="flex justify-center text-2xl bg-blue-600 rounded-2xl p-2">
            Answer was: {{ $info[0]->answer }}
        </h1>
    @else
        <pre class="flex mb-5 bg-red-600 rounded-2xl p-4 justify-center">
            <code>'No solution available.
            </code>
        </pre>
        <h1 class="flex justify-center text-2xl bg-blue-600 rounded-2xl p-2">
            No Answer Available
        </h1>
    @endif
</div>

</body>

</html>
