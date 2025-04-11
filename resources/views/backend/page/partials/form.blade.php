@props([
    'action',
    'method' => 'POST',
    'data' => null,
])

<div class="flex justify-start mb-4">
    <a class="bg-gray-500 text-white py-2 px-6 rounded hover:bg-gray-600" href="{{ route('pages.index') }}">{{ __('app.back') }}</a>
</div>

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="max-w-7xl mx-auto bg-white p-6 rounded-lg space-y-6">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif
    <div>
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">{{ __('page.label.title') }} <span class="text-red-500">*</span></label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $data->title ?? '') }}"
            required
            class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
        />
        <x-input-error :messages="$errors->get('title')" />
    </div>
    <div class="flex items-center space-x-10">
        <label for="is_featured" class="text-sm font-medium text-gray-900">
            {{ __('page.label.is_featured') }}
        </label>
        <input type="hidden" name="is_featured" value="0" />
        <input
            type="checkbox"
            name="is_featured"
            id="is_featured"
            value="1"
            class="rounded border-gray-300 text-blue-600 focus:ring focus:ring-blue-500"
            {{ old('is_featured', $data->is_featured ?? false) ? 'checked' : '' }}
        />
        <x-input-error :messages="$errors->get('is_featured')" />
    </div>
    <div>
        <label for="game" class="block mb-2 text-sm font-medium text-gray-900">{{ __('page.label.game') }} <span class="text-red-500">*</span></label>
        <input
            type="text"
            name="game"
            id="game"
            value="{{ old('game', $data->game ?? '') }}"
            required
            class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
        />
        <x-input-error :messages="$errors->get('game')" />
    </div>
    <div>
        <label for="race" class="block mb-2 text-sm font-medium text-gray-900">{{ __('page.label.race') }}</label>
        <input
            type="text"
            name="race"
            id="race"
            value="{{ old('race', $data->race ?? '') }}"
            class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
        />
        <x-input-error :messages="$errors->get('race')" />
    </div>
    <div>
        <label for="class" class="block mb-2 text-sm font-medium text-gray-900">{{ __('page.label.class') }}</label>
        <input
            type="text"
            name="class"
            id="class"
            value="{{ old('class', $data->class ?? '') }}"
            class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
        />
        <x-input-error :messages="$errors->get('class')" />
    </div>
    <div>
        <label for="age" class="block mb-2 text-sm font-medium text-gray-900">{{ __('page.label.age') }}</label>
        <input
            type="number"
            name="age"
            id="age"
            value="{{ old('age', $data->age ?? '') }}"
            class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
        />
        <x-input-error :messages="$errors->get('age')" />
    </div>
    <div>
        <label for="main_image" class="block mb-2 text-sm font-medium text-gray-900">{{ __('page.label.main_image') }} <span class="text-red-500">*</span></label>
        @if (!empty($data?->main_image))
            <div class="mb-3">
                <img src="{{ asset('storage/' . $data->main_image) }}" alt="Huidige afbeelding" class="w-32 h-32 object-cover rounded">
            </div>
        @endif
        <input
            id="main_image"
            name="main_image"
            type="file"
            class="w-90 border border-gray-300 bg-gray-50 rounded-lg p-2 text-sm focus:ring-blue-500 focus:border-blue-500"
        />
        <x-input-error :messages="$errors->get('main_image')" />
    </div>
    <div>
        <label for="content" class="block mb-2 text-sm font-medium text-gray-900">{{ __('page.label.content') }} <span class="text-red-500">*</span></label>
        <textarea
            name="content"
            id="content"
        >{{ old('content', $data->content ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('content')" />
    </div>
    <div>
        <button
            type="submit"
            class="bg-blue-500 text-white py-2 px-6 rounded-lg cursor-pointer hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 focus:outline-none"
        >
            Submit
        </button>
    </div>
</form>

<script src="https://cdn.ckeditor.com/ckeditor5/44.3.0/ckeditor5.umd.js" crossorigin></script>
<script src="https://cdn.ckeditor.com/ckeditor5/44.3.0/translations/nl.umd.js" crossorigin></script>
