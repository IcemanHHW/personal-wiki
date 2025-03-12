@extends('site.layout.layout')
@section('content')
    <div class="flex justify-between items-center border-b pb-3 mb-4">
        <h1>{{ $page->title }}</h1>
    </div>
    <p>{{ $page->content }}</p>
@endsection
