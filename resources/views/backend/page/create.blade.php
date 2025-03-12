@extends('backend.layout.layout')

@section('content')
    @include('backend.page.partials.form', [
    'action' => route('pages.store'),
    'method' => 'POST',
    'data' => null,
])
@endsection
