@extends('layout')

@section('content')
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success')}}
        </div>
    @endif

    <div>
        <a class="btn btn-success" href="{{ route('create') }}">Add User</a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>User Age</th>
            <th>Actions</th>
        </tr>

        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{$employee->age }}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('edit', ['id' => $employee->id]) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('destroy', ['id' => $employee->id]) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection