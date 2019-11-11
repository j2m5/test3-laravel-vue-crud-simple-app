@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    <li class="list-group-item">
                        <img src="/images/{{ $driver->photo ?? 'default.jpg' }}" alt="" style="height: 150px;">
                    </li>
                    <li class="list-group-item">Название: <b>{{ $vehicle->title }}</b></li>
                    <li class="list-group-item">Тип: <b>{{ $vehicle->type }}</b></li>
                    <li class="list-group-item">Статус: <b>{{ $vehicle->status }}</b></li>
                    <li class="list-group-item">Закреплено за: <b>{{ $vehicle->driver->firstname }} {{ $vehicle->driver->lastname }}</b></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
