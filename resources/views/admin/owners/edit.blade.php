@extends('layouts.admin')


@section('content')
    <h1>{{ __('translation.pages.edit_owner') }}</h1>

    <form action="{{ route('admin.owners.update', $owner) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">{{ __('translation.table_headers.name') }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $owner->name }}" required>
        </div>
        <div class="form-group">
            <label for="surname">{{ __('translation.table_headers.surname') }}</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ $owner->surname }}" required>
        </div>

        <!-- Submit button for updating owner -->
        <button type="submit" class="btn btn-primary">{{ __('translation.buttons.update') }}</button>
    </form>

    <hr>

    <h2>{{ __('translation.pages.owner_cars', ['name' => $owner->name]) }}</h2>

    @if ($owner->cars->isEmpty())
        <p>{{ __('translation.messages.no_cars') }}</p>
    @else
        @foreach($owner->cars as $car)
            <div>
                <span>{{ __('translation.table_headers.brand') }}: {{ $car->brand }}</span>
                <span>{{ __('translation.table_headers.model') }}: {{ $car->model }}</span>
                <span>{{ __('translation.table_headers.reg_number') }}: {{ $car->reg_number }}</span>

                <!-- Delete button for the car -->
                <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="event.preventDefault(); confirmDelete(this);">{{ __('translation.buttons.delete') }}</button>
                </form>

                <!-- Edit button for the car -->
                <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-primary">{{ __('translation.buttons.edit') }}</a>
            </div>
        @endforeach
        <a href="{{ route('admin.cars.create', ['owner_id' => $owner->id]) }}" class="btn btn-sm btn-primary">{{ __('translation.buttons.create_car') }}</a>
    @endif

    <!-- JavaScript function to handle the form submission -->
    <script>
        function confirmDelete(form) {
            if (confirm('{{ __('translation.messages.confirm_delete') }}')) {
                form.submit();
            }
        }
    </script>
@endsection
