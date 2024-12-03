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
        <h1 class="h-1 justify-center flex text-3xl mb-12">this quest had {{count($answers)}} parts!</h1>
    </div>

    <div class="flex flex-wrap justify-center gap-6 p-8">
        @for($i=1 ; $i <= count($answers) ; $i++)
            <div>
                <div
                    class="flex flex-wrap justify-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{route('Solutions',['day' => $day, "part$i"]  )}}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                        Jump To Part {{$i}} Sulotion !
                        <svg class="rtl:rotate-180 w-4 h-4 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                    <p class="mt-4 text-2xl font-semibold text-violet-500 text-center">Part {{$i}} answer => {{$answers[$i-1]}}</p>
                </div>
            </div>
        @endfor
    </div>
</div>
</body>

</html>
