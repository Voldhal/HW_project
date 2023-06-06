@extends('layouts.admin')

<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.owners.index') }}">{{ __('translation.buttons.owners') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.cars.index') }}">{{ __('translation.buttons.cars') }}</a>
</li>