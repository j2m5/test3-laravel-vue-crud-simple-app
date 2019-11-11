@extends('layouts.app')

@section('content')
    <div class="container">
        @include('messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="list-group">
                    @forelse($drivers as $driver)
                        <li class="list-group-item">
                            <div>
                                <a href="{{ route('drivers.show', $driver->id) }}">{{ $driver->firstname }} {{ $driver->lastname }}</a>
                            </div>
                            <div>
                                <a class="text-success" href="{{ route('drivers.edit', $driver->id) }}">Редактировать</a>
                                <form action="{{ route('drivers.destroy', $driver->id) }}" method="post" style="display: inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-link text-danger" type="submit">Удалить</button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">Нет данных для отображения</li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary mt-2" href="{{ route('drivers.create') }}">Добавить водителя</a>
            </div>
        </div>
    </div>
@endsection
