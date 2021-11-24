@extends('layout.main')

@section('content')
    @guest
        <photo-list :photos='@json($listPhotos)'></photo-list>
    @endguest
    @auth
        <photo-list-extended :photos='@json($listPhotos)' ref="listPhotos"></photo-list-extended>
        <modal-window ref="modal"></modal-window>
    @endauth
@endsection
