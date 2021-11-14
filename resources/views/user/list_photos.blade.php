@extends('layout.admin_template')

@section('title', 'Административный раздел')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ dump(__('Dashboard')) }}
        </h2>
    </x-slot>
    <div class="col-12 mb-5">
        eeee
    </div>
@endsection
