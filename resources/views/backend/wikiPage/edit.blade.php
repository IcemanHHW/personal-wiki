@extends('backend.layout.layout')

@section('content')
    @include('backend.wikiPage.partials.form', [
    'action' => route('wiki-pages.update', $wikiPage),
    'method' => 'patch',
    'data' => $wikiPage,
])
@endsection
