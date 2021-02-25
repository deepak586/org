@extends('layouts.emp')

@section('content')

<h1>Employee List</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Company</td>
            
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($employeeList as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->First_name }}</td>
            <td>{{ $value->Last_name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->phone }}</td>
            <td>{{ $value->name }}</td>
            
            

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('employee/' . $value->id) }}">View</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('employee/' . $value->id . '/edit') }}">Edit</a>

            </td>
        </tr>
    @endforeach
    <tr><td colspan="7">{{ $employeeList->links() }}</td></tr>
    </tbody>
</table>

</div>
@endsection