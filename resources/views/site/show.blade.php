@extends('site.layout.layout')

@section('title', $page->title . ' - Character Wiki')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center border-b pb-3 mb-6">
            <h1 class="text-4xl font-semibold">{{ $page->title }}</h1>
            @auth
                @if(auth()->user()->id === $page->user->id)
                    <a href="{{ route('pages.edit', $page) }}" class="text-blue-600 hover:underline text-sm">
                        {{ __('app.edit') }}
                    </a>
                @endif
            @endauth
        </div>

        <div class="flex flex-col lg:flex-row gap-6">
            <div class="lg:flex-1">
                <div class="prose lg:prose-xl">
                    {!! $page->content !!}
                </div>
            </div>
            <div class="lg:w-1/3 w-full">
                <img src="/{{ $page->main_image }}" alt="{{ $page->title }}" class="w-full h-auto object-cover rounded-lg shadow-lg float-right ml-6 mb-6">
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between border-t pt-4">
            <div class="flex items-center">
                <span class="font-semibold text-gray-700">{{ __('page.character_of') }}:</span>
                <span class="ml-2 text-gray-900">{{ $page->user->username }}</span>
            </div>
        </div>
    </div>
@endsection
