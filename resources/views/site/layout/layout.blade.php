<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Character Wiki</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 font-sans text-gray-800">
        <header class="bg-gray-200 p-4 shadow-sm">
            <div class="container mx-auto flex justify-between items-center">
                <a href="/" class="text-xl font-semibold">Character Wiki</a>
                <div>
                    @auth
                        <a href="{{ route('pages.index') }}" class="text-blue-600 hover:underline">{{ __('app.dashboard') }}</a>
                    @else
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline mr-4">{{ __('app.login') }}</a>
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">{{ __('app.register') }}</a>
                    @endauth
                </div>
            </div>
        </header>
        <div class="container mx-auto flex mt-6 space-x-6">
            <aside class="w-64 bg-white shadow-md p-4 rounded-lg">
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="block p-2 hover:bg-gray-100 rounded">Link 1</a></li>
                    <li><a href="#" class="block p-2 hover:bg-gray-100 rounded">Link 2</a></li>
                    <li><a href="#" class="block p-2 hover:bg-gray-100 rounded">Link 3</a></li>
                    <li><a href="#" class="block p-2 hover:bg-gray-100 rounded">Link 4</a></li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 bg-white shadow-md rounded-lg p-6 relative">
                @yield('content')
            </main>
        </div>
    </body>
</html>
