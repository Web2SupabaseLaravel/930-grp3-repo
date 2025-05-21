@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Users List</h2>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add new user button --}}
    <a href="{{ route('dataevent.create') }}" class="btn btn-primary mb-3">Add New User</a>

    {{-- Users table --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->user_id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->email }}</td>
                    <td>{{ $event->role }}</td>
                    <td>
                        {{-- Edit button --}}
                        <a href="{{ route('dataevent.edit', $event->user_id) }}" class="btn btn-sm btn-warning">Edit</a>

                        {{-- Delete button --}}
                        <form action="{{ route('dataevent.destroy', $event->user_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($events->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">No users found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
