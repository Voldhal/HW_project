@extends('layouts.admin')

@section('content')
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.cars.index') }}">{{ __('translation.buttons.cars') }}</a>
</li>
    <h1>{{ __('translation.owners_list') }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>{{ __('translation.table_headers.id') }}</th>
                <th>{{ __('translation.table_headers.name') }}</th>
                <th>{{ __('translation.table_headers.surname') }}</th>
                <th>{{ __('translation.table_headers.cars') }}</th>
                <th>{{ __('translation.table_headers.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($owners as $owner)
                <tr>
                    <td>{{ $owner->id }}</td>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->surname }}</td>
                    <td>
                        @foreach ($owner->cars as $car)
                            <div>{{ $car->brand }} {{ $car->model }}</div>
                        @endforeach
                    </td>
                    <td>
                    <a href="{{ route('admin.cars.create', ['owner_id' => $owner->id]) }}" class="btn btn-sm btn-primary">{{ __('translation.buttons.create_car') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
