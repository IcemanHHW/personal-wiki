@props([
    'action',
    'method' => 'POST',
    'data' => null,
])

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif
    <label for="title" class="block mb-2 text-sm font-medium text-secondary-900">Titel</label>
    <input type="text" name="title" id="title" value="{{ old('title', '') }}" required class="bg-secondary-50 border border-secondary-300 text-secondary-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
    />
    <label for="image_path" class="block mb-2 text-sm font-medium text-secondary-900">Afbeelding</label>
    <input id="image_path" name="image_path" type="file">
    <label for="content" class="block mb-2 text-sm font-medium text-secondary-900">Content</label>
    <textarea name="content" id="content" required class="bg-secondary-50 border border-secondary-300 text-secondary-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
    >{{ old('content', '') }}</textarea>
    <button type="submit" class="bg-secondary-50 border border-secondary-300 text-secondary-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block">
        Submit
    </button>
</form>
