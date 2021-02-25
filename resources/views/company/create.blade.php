@extends('layouts.app')

@section('content')

<h1>Create Company</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'company','files'=>true)) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('website', 'Website') }}
        {{ Form::text('website', Input::old('website'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('logo', 'logo') }}
        <div><input type="file" name="logo"> </div><br/>
    </div>

    <div class="form-group">
        {{ Form::label('gst', 'Gst') }}
        {{ Form::text('gst', Input::old('gst'), array('class' => 'form-control')) }}
    </div>

   <!-- <div class="form-group">
        {{ Form::label('shark_level', 'shark Level') }}
        {{ Form::select('shark_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('shark_level'), array('class' => 'form-control')) }}
    </div>-->

    {{ Form::submit('Create!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection