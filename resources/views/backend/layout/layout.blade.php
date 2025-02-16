<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wiki</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 font-sans text-gray-800">
        <div class="flex h-screen">
            <div class="w-64 bg-gray-800 text-white p-5">
                <ul>
                    <li class="mb-4"><a href="#" class="hover:bg-gray-700 p-2 rounded">Link 1</a></li>
                    <li class="mb-4"><a href="#" class="hover:bg-gray-700 p-2 rounded">Link 2</a></li>
                    <li class="mb-4"><a href="#" class="hover:bg-gray-700 p-2 rounded">Link 3</a></li>
                    <li class="mb-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="hover:bg-gray-700 p-2 rounded">Uitloggen</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="flex-1 p-8">
                @yield('content')
            </div>
        </div>
    </body>
</html>
