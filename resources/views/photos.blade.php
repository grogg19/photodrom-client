@extends('layout.main')

@section('content')
    @guest
        <photo-list :photos='@json($listPhotos)'></photo-list>
    @endguest
    @auth
        <photo-list-extended :photos='@json($listPhotos)'></photo-list-extended>
    @endauth
@endsection
