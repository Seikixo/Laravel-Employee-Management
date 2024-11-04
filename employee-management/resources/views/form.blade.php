@extends('layout')

@section('content')
    <form method="POST" action="{{ route('store') }}" class="form">
        @csrf

        <div class="form-group">
            <label for="name">Username</label>
            <br>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') ?? $employee->name }}">

            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <br>
            <input type="text" name="age" id="age" class="form-control @error('age') is-invalid @enderror"
            value="{{ old('age') ?? $employee->age }}">

            @error('age')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection