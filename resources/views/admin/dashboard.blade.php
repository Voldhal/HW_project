@extends('layouts.admin')

<h1 class="text-primary">
    <a class="nav-link" href="{{ route('admin.owners.index') }}">{{ __('translation.buttons.owners') }}</a>
</h1>
<h1 class="text-primary">
    <a class="nav-link" href="{{ route('admin.cars.index') }}">{{ __('translation.buttons.cars') }}</a>
</h1>