@extends('backend.layout.layout')

@section('content')
    @include('backend.wikiPage.partials.form', [
    'action' => route('wiki-pages.store'),
    'method' => 'POST',
    'data' => null,
])
@endsection
