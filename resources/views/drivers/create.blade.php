@extends('layouts.app')

@section('content')
    <div class="container">
        @include('messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('drivers.store') }}" method="post">
                    @csrf
                    <input class="form-control mt-2" type="text" name="firstname" value="{{ old('firstname') }}" placeholder="Имя">
                    <input class="form-control mt-2" type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Фамилия">
                    <input class="form-control mt-2" type="text" name="age" value="{{ old('age') }}" placeholder="Возраст">
                    <button class="btn btn-primary mt-2" type="submit">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
