@extends('layouts.app')

@section('content')
    <h2>{{ $titleForm ?? 'Appointment Form' }}</h2>

    @if ($errors->any())
        <div style="color: red;">
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

        <label for="date">Date:</label><br>
        <input type="date" name="appointment_date" value="{{ old('appointment_date', $appointment->appointment_date ?? '') }}"><br><br>

        <label for="time">Time:</label><br>
        <input type="time" name="appointment_time" value="{{ old('appointment_time', $appointment->appointment_time ?? '') }}"><br><br>

        <label for="status">Status:</label><br>
        <input type="text" name="status" value="{{ old('status', $appointment->status ?? '') }}"><br><br>

        <label for="service_id">Service ID:</label><br>
        <input type="number" name="services_id" value="{{ old('services_id', $appointment->services_id ?? '') }}"><br><br>

        <label for="user_id">User ID:</label><br>
        <input type="number" name="users_id" value="{{ old('users_id', $appointment->users_id ?? '') }}"><br><br>

        <label for="patient_id">Patient ID:</label><br>
        <input type="number" name="patients_id" value="{{ old('patients_id', $appointment->patients_id ?? '') }}"><br><br>

        <button type="submit">{{ $submitButton ?? 'Submit' }}</button>
    </form>
@endsection
