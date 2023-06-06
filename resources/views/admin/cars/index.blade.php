@extends('layouts.admin')
@section('content')
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.owners.index') }}">{{ __('translation.buttons.owners') }}</a>
</li>
<h1>{{ __('translation.cars_list') }}</h1>
<table class="table">
    <thead>
        <tr>
            <th>{{ __('translation.table_headers.id') }}</th>
            <th><a href="{{ route('admin.cars.index', ['sort' => 'reg_number']) }}">{{ __('translation.table_headers.reg_number') }}</a></th>
            <th><a href="{{ route('admin.cars.index', ['sort' => 'brand']) }}">{{ __('translation.table_headers.brand') }}</a></th>
            <th><a href="{{ route('admin.cars.index', ['sort' => 'model']) }}">{{ __('translation.table_headers.model') }}</a></th>
            <th>{{ __('translation.table_headers.owner_name') }}</th>
            <th>{{ __('translation.table_headers.actions') }}</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->reg_number }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>
                <td>
                    <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-success">{{ __('translation.buttons.edit') }}</a>
                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">{{ __('translation.buttons.delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
