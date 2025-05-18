{{-- resources/views/event/index_event.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Users List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->email }}</td>
                <td>{{ $event->role }}</td>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
