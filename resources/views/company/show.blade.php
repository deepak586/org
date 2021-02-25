@extends('layouts.app')

@section('content')

<h1>Showing {{ $companyDetails->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $companyDetails->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $companyDetails->email }}<br>
            <strong>Website:</strong> {{ $companyDetails->website }}<br>
            <strong>Gst:</strong> {{ $companyDetails->gst }}
        </p>
    </div>

</div>

@endsection