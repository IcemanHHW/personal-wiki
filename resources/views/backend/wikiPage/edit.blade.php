@extends('backend.layout.layout')

@section('content')
    @include('backend.wikiPage.partials.form', [
    'action' => route('wiki-pages.update'),
    'method' => 'patch',
    'data' => $wikiPage,
])
@endsection
