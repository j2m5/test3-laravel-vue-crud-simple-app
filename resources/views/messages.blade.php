@if($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@if(session('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
        </div>
    </div>
@endif
