@extends('layout.admin_template')

@section('title', 'Административный раздел')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="col-12 mb-5">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg min-vh-100">
            <div class="p-4 bg-white border-b border-gray-200 d-flex justify-content-start">
                <div class="card d-flex flex-row align-items-center m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Управление фотографиями</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Добавление, редактирование, удаление фотографий</h6>
                        <a href="{{ route('admin.manage-photos') }}" class="card-link">Управление</a>
                    </div>
                </div>
                <div class="card d-flex flex-row align-items-center m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Настройки</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Настройки системы</h6>
                        <a href="{{ route('admin.manage-settings') }}" class="card-link">Управление</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
