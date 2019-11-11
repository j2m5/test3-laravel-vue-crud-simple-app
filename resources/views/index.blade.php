@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @forelse($vehicles as $vehicle)
                <div class="col-md-4 mt-5">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $vehicle->photo ?? asset('images/default.jpg') }}" class="card-img-top" alt="{{ $vehicle->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $vehicle->title }}</h5>
                            <a href="{{ route('show', ['id' => $vehicle->id]) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            @empty
                <div>Нет данных для отображения</div>
            @endforelse
        </div>
    </div>
@endsection
