@extends('layouts.admin')
<?php   use Illuminate\Support\Facades\Storage; ?>
@section('content')
    <div class="container">
        <h1>{{ __('translation.pages.edit_car') }}</h1>
        <form action="{{ route('admin.cars.update', $car) }}" method="POST" enctype="multipart/form-data">

        @csrf
            @method('PUT')

            <div class="form-group">
                <label for="reg_number">{{ __('translation.table_headers.reg_number') }}</label>
                <input type="text" class="form-control" id="reg_number" name="reg_number" value="{{ $car->reg_number }}" required>
            </div>

            <div class="form-group">
                <label for="image">Car Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            @if ($car->image)
                <div class="form-group">
                    <label>Current Image</label>
                    <img src="{{ asset('storage/cars/' . $car->image) }}" alt="Car Image" style="max-width: 200px;">
                </div>
            @endif


            <div class="form-group">
                <label for="brand">{{ __('translation.table_headers.brand') }}</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $car->brand }}" required>
            </div>

            <div class="form-group">
                <label for="model">{{ __('translation.table_headers.model') }}</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ $car->model }}" required>
            </div>

            <div class="form-group">
                <label for="owner_id">{{ __('translation.pages.owner') }}</label>
                <select class="form-control" id="owner_id" name="owner_id">
                    @foreach($owners as $owner)
                        <option value="{{ $owner->id }}" @if($owner->id === $car->owner_id) selected @endif>{{ $owner->name }} {{ $owner->surname }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('translation.buttons.update') }}</button>
        </form>
    </div>
@endsection
