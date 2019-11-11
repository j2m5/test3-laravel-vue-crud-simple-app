@extends('layouts.app')

@section('content')
    <div class="container">
        @include('messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('drivers.update', $driver->id) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <input class="form-control mt-2" type="text" name="firstname" value="{{ $driver->firstname }}" placeholder="Имя">
                    <input class="form-control mt-2" type="text" name="lastname" value="{{ $driver->lastname }}" placeholder="Фамилия">
                    <input class="form-control mt-2" type="text" name="age" value="{{ $driver->age }}" placeholder="Возраст">
                    <button class="btn btn-primary mt-2" type="submit">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
