@extends('layout.main')

@section('title')
    {{ env('APP_NAME') }} v.2
@endsection

@section('content')
    <h1>{{ env('APP_NAME') }}</h1>
@endsection
