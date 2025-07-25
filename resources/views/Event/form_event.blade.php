@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $titleForm }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ is_array($route) ? route($route[0], $route[1]) : route($route) }}" method="POST">
        @csrf
        @if($method === 'put')
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="text" name="user_id" class="form-control" value="{{ old('user_id', $event->user_id) }}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $event->name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $event->email) }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" name="role" class="form-control" value="{{ old('role', $event->role) }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ $submitButton }}</button>
    </form>
</div>
@endsection
