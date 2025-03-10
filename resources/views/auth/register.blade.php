@extends('site.layout.layout')
@section('content')
    <form method="POST" action="{{ route('register') }}" enctype="application/x-www-form-urlencoded" class="space-y-6">
        @csrf
        <div>
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">{{ __('auth.label.username') }}</label>
            <input
                type="text"
                name="username"
                id="username"
                value="{{ old('username') }}"
                required
                class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
            />
            <x-input-error :messages="$errors->get('username')" />
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">{{ __('auth.label.email') }}</label>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                required
                class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
            />
            <x-input-error :messages="$errors->get('email')" />
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">{{ __('auth.label.password') }}</label>
            <input
                type="password"
                name="password"
                id="password"
                required
                class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
            />
            <x-input-error :messages="$errors->get('password')" />
        </div>
        <div>
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">{{ __('auth.label.password_confirmation') }}</label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                required
                class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>
        <div>
            <button
                type="submit"
                class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 focus:outline-none"
            >
                {{ __('app.register') }}
            </button>
        </div>
    </form>
@endsection
