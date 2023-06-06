@extends('layouts.admin')

@section('content')
    <h1>Edit Car</h1>

    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="reg_number">Registration Number</label>
            <input type="text" class="form-control" id="reg_number" name="reg_number" value="{{ $car->reg_number }}" required>
        </div>

        <div class="form-group">
            <label
