@props([
    'action',
    'method' => 'POST',
    'data' => null,
])

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif
    <div>
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Titel</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', '') }}"
            required
            class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
        />
    </div>
    <div>
        <label for="image_path" class="block mb-2 text-sm font-medium text-gray-900">Afbeelding</label>
        <input
            id="image_path"
            name="image_path"
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
        >{{ old('content', '') }}</textarea>
    </div>
    <div>
        <button
            type="submit"
            class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 focus:outline-none"
        >
            Submit
        </button>
    </div>
</form>
