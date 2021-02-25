
@extends('layouts.emp')

@section('content')
<h1>Create Company</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($empData, array('route' => array('employee.update', $empData->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('First_name', 'First Name') }}
        {{ Form::text('First_name', Input::old('First_name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Last_name', 'Last Name') }}
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
    

   <!-- <div class="form-group">
        {{ Form::label('shark_level', 'shark Level') }}
        {{ Form::select('shark_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('shark_level'), array('class' => 'form-control')) }}
    </div>-->

    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection