@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('drivers.index') }}">Водители</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('vehicles.index') }}">Транспорт</a>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection
