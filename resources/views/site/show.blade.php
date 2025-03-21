@extends('site.layout.layout')

@section('title', $page->title . ' - Character Wiki')

@section('content')
    <div class="flex justify-between items-center border-b pb-3 mb-4">
        <h1>{{ $page->title }}</h1>
    </div>
    {!! $page->content !!}
@endsection
