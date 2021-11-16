@extends('layout.admin_template')

@section('title', 'Административный раздел')

@section('content')
    <div class="col-12 mb-5">
        <h2>Список фотографий</h2>
        @foreach ($photos as $photo)

        @endforeach
    </div>
@endsection
