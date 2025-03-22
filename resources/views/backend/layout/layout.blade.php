<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Character Wiki Backend')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.3.0/ckeditor5.css" crossorigin>
    </head>
    <body class="bg-gray-100 font-sans text-gray-800">
        <div class="flex h-screen">
            <div class="w-64 bg-gray-800 text-white p-5">
                <ul>
                    <li class="mb-4"><a href="{{ route('wiki.home') }}" class="hover:bg-gray-700 p-2 rounded w-full block">Wiki</a></li>
                    <li class="mb-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="hover:bg-gray-700 p-2 rounded cursor-pointer w-full text-left">{{ __('app.logout') }}</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="flex-1 p-8">
                @if (session('success') || session('error'))
                    <div class="space-y-2 fixed z-[999] right-[2rem] top-[1rem] min-w-[15vw]">
                        @if (session('success'))
                            <div id="flash-message" class="p-4 mb-4 text-center text-green-800 bg-green-100 border border-green-300 rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div id="flash-message" class="p-4 mb-4 text-center text-red-800 bg-red-100 border border-red-300 rounded-lg">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
        <script>
            setTimeout(function() {
                let flashMessage = document.getElementById('flash-message');
                if (flashMessage) {
                    flashMessage.style.transition = 'opacity 0.5s ease';
                    flashMessage.style.opacity = '0';
                    setTimeout(() => flashMessage.remove(), 500);
                }
            }, 3000);
        </script>
    </body>
</html>
