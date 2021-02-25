@extends('layouts.app')

@section('content')

<h1>Company List</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Gst</td>
            <td>Website</td>
            <td>Logo</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($companyList as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->gst }}</td>
            <td>{{ $value->website }}</td>
            <td>{{ $value->logo }}</td>
            

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('company/' . $value->id) }}">View</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('company/' . $value->id . '/edit') }}">Edit</a>

            </td>
        </tr>
    @endforeach
    <tr><td colspan="7">{{ $companyList->links() }}</td></tr>
    </tbody>
</table>

</div>
@endsection