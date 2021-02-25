@extends('layouts.emp')

@section('content')

<h1>Showing {{ $empDetails->First_name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $empDetails->First_name ." ".$empDetails->Last_name }}</h2>
        <p>
            <strong>Email:</strong> {{ $empDetails->email }}<br>
            <strong>Website:</strong> {{ $empDetails->phone }}<br>
            <strong>Company:</strong> {{ $empDetails->name}}
        </p>
    </div>

</div>

@endsection