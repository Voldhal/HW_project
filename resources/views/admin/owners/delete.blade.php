@extends('layouts.admin')

@section('content')
    <h1>Delete Owner</h1>

    <form action="{{ route('admin.owners.destroy', $owner) }}" method="POST">
        @csrf
        @method('DELETE')

        <p>Are you sure you want to delete this owner?</p>

        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
