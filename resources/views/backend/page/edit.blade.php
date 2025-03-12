@extends('backend.layout.layout')

@section('content')
    @include('backend.page.partials.form', [
    'action' => route('pages.update', $page),
    'method' => 'patch',
    'data' => $page,
])
@endsection
