@props([
    'action',
    'method' => 'POST',
    'data' => null,
])

<div class="flex justify-start mb-4">
    <a class="bg-gray-500 text-white py-2 px-6 rounded hover:bg-gray-600" href="{{ route('wiki-pages.index') }}">Terug</a>
</div>

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif
    <div>
        <label for="is_featured" class="block mb-2 text-sm font-medium text-gray-900">Uitgelicht</label>
        <input type="hidden" name="is_featured" value="0" />
        <input
            type="checkbox"
            name="is_featured"
            id="is_featured"
            value="1"
            class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
            {{ old('is_featured', $data->is_featured ?? false) ? 'checked' : '' }}
        />
    </div>
    <div>
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Titel</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $data->title ?? '') }}"
            required
            class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
        />
    </div>
    <div>
        <label for="main_image" class="block mb-2 text-sm font-medium text-gray-900">Afbeelding</label>
        @if (!empty($data?->main_image))
            <div class="mb-3">
                <img src="{{ asset('storage/' . $data->main_image) }}" alt="Huidige afbeelding" class="w-32 h-32 object-cover rounded">
            </div>
        @endif
        <input
            id="main_image"
            name="main_image"
            type="file"
            class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
        />
    </div>
    <div>
        <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
        <textarea
            name="content"
            id="content"
            required
            class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
        >{{ old('content', $data->content ?? '') }}</textarea>
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
