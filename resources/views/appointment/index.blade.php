@extends('layouts.app')

@section('content')
<h2>All Appointments</h2>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<a href="{{ route('appointments.create') }}">Add Appointment</a>

<table border="1" cellpadding="5" cellspacing="0" style="margin-top: 20px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Service ID</th>
            <th>User ID</th>
            <th>Patient ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->appointment_id }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->appointment_time }}</td>
                <td>{{ $appointment->status }}</td>
                <td>{{ $appointment->services_id }}</td>
                <td>{{ $appointment->users_id }}</td>
                <td>{{ $appointment->patients_id }}</td>
                <td>
                    <a href="{{ route('appointments.edit', $appointment->appointment_id) }}">Edit</a> |
                    <form action="{{ route('appointments.destroy', $appointment->appointment_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
