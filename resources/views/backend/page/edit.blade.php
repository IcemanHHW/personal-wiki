@extends('backend.layout.layout')

@section('title', $page->title . ' ' . strtolower(__('app.edit')) . ' - Character Wiki Backend')

@section('content')
    @include('backend.page.partials.form', [
    'action' => route('pages.update', $page),
    'method' => 'patch',
    'data' => $page,
])
@endsection
