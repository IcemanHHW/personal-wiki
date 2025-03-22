@extends('backend.layout.layout')

@section('title', __('app.model.create', ['model' => __('page.model')])  . ' - Character Wiki Backend')

@section('content')
    @include('backend.page.partials.form', [
    'action' => route('pages.store'),
    'method' => 'POST',
    'data' => null,
])
@endsection
