@extends('layouts.emp')

@section('content')

<h1>Create Company</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'employee')) }}

    <div class="form-group">
        {{ Form::label('name', 'First Name') }}
        {{ Form::text('First_name', Input::old('First_name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Last Name') }}
        {{ Form::text('Last_name', Input::old('Last_name'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Phone') }}
        {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
    </div>



    <div class="form-group">
        {{ Form::label('company', 'Company') }}
        {{ Form::select('company_id', $options, Input::old('company_id'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection