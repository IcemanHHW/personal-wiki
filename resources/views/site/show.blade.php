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
            <div class="lg:w-1/3 w-full lg:pl-6">
                <div class="border rounded-lg bg-gray-50 p-4">
                    <h2 class="text-xl font-bold mb-4 text-center">{{ $page->title }}</h2>
                    <img src="/{{ $page->main_image }}" alt="{{ $page->title }}" class="w-full h-auto object-cover rounded mb-4">
                    <dl class="space-y-2 text-sm text-gray-800">
                        <div class="flex justify-between">
                            <dt class="font-semibold">{{ __('page.character_of') }}</dt>
                            <dd>{{ $page->user->username }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="font-semibold">{{ __('page.label.game') }}</dt>
                            <dd>{{ $page->game }}</dd>
                        </div>
                        @if($page->race)
                            <div class="flex justify-between">
                                <dt class="font-semibold">{{ __('page.label.race') }}</dt>
                                <dd>{{ $page->race }}</dd>
                            </div>
                        @endif
                        @if($page->class)
                            <div class="flex justify-between">
                                <dt class="font-semibold">{{ __('page.label.class') }}</dt>
                                <dd>{{ $page->class }}</dd>
                            </div>
                        @endif
                        @if($page->age)
                            <div class="flex justify-between">
                                <dt class="font-semibold">{{ __('page.label.age') }}</dt>
                                <dd>{{ $page->age }}</dd>
                            </div>
                        @endif
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
