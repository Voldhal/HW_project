@extends('layouts.admin')

@section('content')
    <h1>Add Car</h1>

    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="reg_number">Registration Number</label>
            <input type="text" class="form-control" id="reg_number" name="reg_number" required>
        </div>
        @error('reg_number')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="image">Car Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" required>
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" name="model" required>
        </div>

        <div class="form-group">
            <label for="owner_id">Owner ID</label>
            <input type="number" class="form-control" id="owner_id" name="owner_id" value="{{ $owner_id }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Car</button>
    </form>
@endsection
