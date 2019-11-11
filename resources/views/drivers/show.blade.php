@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    <li class="list-group-item">
                        <img src="/images/{{ $driver->photo ?? 'default.jpg' }}" alt="" style="height: 150px;">
                    </li>
                    <li class="list-group-item">ФИО водителя: <b>{{ $driver->firstname }} {{ $driver->lastname }}</b></li>
                    <li class="list-group-item">Возраст водителя: <b>{{ $driver->age }}</b></li>

                    <li class="list-group-item">Закрепленный транспорт:
                        @forelse($vehicles as $vehicle)
                            <b>{{ $vehicle->title }} | </b>
                        @empty
                            <b>Нет закрепленного транспорта</b>
                        @endforelse
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
