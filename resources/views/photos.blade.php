@extends('layout.main')

@section('content')
    <photo-list :photos='@json($listPhotos)'></photo-list>
@endsection
