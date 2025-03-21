@extends('site.layout.layout')

@section('title', __('search.search_results_for') .' "'. $query . '" - Character Wiki')

@section('content')
    <h1 class="text-3xl mt-4 mb-10">{{ __('search.search_results_for') }}: <span class="font-semibold">{{ $query }}</span></h1>

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
