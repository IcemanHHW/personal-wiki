@extends('site.layout.layout')
@section('content')
    <div class="flex justify-between items-center border-b pb-3 mb-4">
        <h1 class="text-3xl font-bold">Blablabla</h1>
    </div>
    <img src="https://picsum.photos/1200/400" alt="Wiki Image" class="w-full h-64 object-cover rounded-lg mb-6">
    <form action="{{ route('search.results') }}" method="GET" class="mb-6">
        <div class="flex">
            <input type="text" name="q" required placeholder="{{ __('search.search_placeholder') }}"
                   class="w-full p-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700 cursor-pointer">
                {{ __('search.search_button') }}
            </button>
        </div>
    </form>
    @if($featuredPage)
        <div class="bg-gray-50 p-4 rounded-lg border">
            <h2 class="text-2xl font-semibold">{{ __('page.label.is_featured') }}</h2>
            <div class="flex items-center space-x-4 mt-2 mb-2">
                <img src="/{{ $featuredPage->main_image }}" alt="{{ $featuredPage->title }}" class="w-32 h-24 object-cover rounded-lg shadow-md">
                <div>
                    <a href="/wiki/{{ $featuredPage->slug }}" class="text-blue-600 hover:underline text-xl font-bold">
                        {{ $featuredPage->title }}
                    </a>
                    <p class="text-gray-700 mt-1 mb-1">
                        {!! Str::limit($featuredPage->content, 400) !!}
                    </p>
                    <a href="{{ route('wiki.show', $featuredPage->slug) }}" class="text-blue-600 hover:underline uppercase font-bold">Meer lezen</a>
                </div>
            </div>
        </div>
    @endif

    @if($latestPages->isNotEmpty())
        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-2">{{ __('app.model.newest', ['model' => __('page.models')]) }}</h2>
            <ul class="list-disc pl-5 space-y-1">
                @foreach($latestPages as $latestPage)
                    <li><a href="{{ route('wiki.show', $latestPage->slug) }}" class="text-blue-600 hover:underline">{{ $latestPage->title }}</a></li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
