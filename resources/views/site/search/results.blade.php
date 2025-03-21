@extends('site.layout.layout')

@section('title', __('search.search_results_for') .' "'. $query . '" - Character Wiki')

@section('content')
    <h1 class="text-3xl mt-4 mb-10">{{ __('search.search_results_for') }}: <span class="font-semibold">{{ $query }}</span></h1>

    <form action="{{ route('search.results') }}" method="GET" class="mb-6">
        <div class="flex">
            <input type="text" name="q" required placeholder="{{ __('search.search_placeholder') }}"
                   class="w-full p-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700 cursor-pointer">
                {{ __('search.search_button') }}
            </button>
        </div>
    </form>

    @if($results->isNotEmpty())
        <ul>
            @foreach($results as $item)
                <li class="mt-4 mb-4">
                    <a href="{{ route('wiki.show', $item->slug) }}" class="text-blue-600 hover:underline text-lg">{{ $item->title }}</a>
                    <p class="text-gray-700">
                        {{ strip_tags(Str::limit($item->content, 150)) }}
                    </p>
                </li>
            @endforeach
        </ul>
    @else
        <p>{{ __('search.no_results_found') }}</p>
    @endif
@endsection
