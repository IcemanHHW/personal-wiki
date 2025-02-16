<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wiki</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800">
    <div class="container gap-10 flex flex-col px-6 py-10 mx-auto lg:flex-row">
        <form method="POST" action="{{ route('register') }}" enctype="application/x-www-form-urlencoded" class="space-y-6">
            @csrf
            <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Gebruikersnaam</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    value="{{ old('username') }}"
                    required
                    class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                />
                @error('username')
                <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mail</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                    class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                />
                @error('email')
                <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Wachtwoord</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                />
                @error('password')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Wachtwoord bevestigen</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    required
                    class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                />
                @error('password_confirmation')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button
                    type="submit"
                    class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 focus:outline-none"
                >
                    Registreren
                </button>
            </div>
        </form>
    </div>
</body>
</html>
