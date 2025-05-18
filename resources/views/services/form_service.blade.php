@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f5f7fa;
        color: #333;
        padding: 40px 0;
    }
    .container {
        max-width: 500px;
        margin: 0 auto;
        background: #fff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        margin-top: 20px;
    }
    h2 {
       color: #2c3e50;
       margin-bottom: 25px;
       font-weight: 700;
       letter-spacing: 0.5px;
       font-size: 26px;
    }
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #2c3e50;
    }
    input[type="text"], input[type="number"], textarea {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        resize: vertical;
        box-sizing: border-box;
    }
    button {
        background: linear-gradient(45deg, #28a745, #218838);
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.3s ease;
    }
    button:hover {
        background: linear-gradient(45deg, #218838, #1e7e34);
    }
</style>

<div class="container">
    <h2>{{ isset($service) ? 'Edit Service' : 'Add New Service' }}</h2>

    <form action="{{ is_array($route) ? route($route[0], $route[1]) : route($route) }}" method="POST">
        @csrf
        @if($method === 'put')
            @method('PUT')
        @endif

        {{-- Service ID --}}
        <label for="service_id">Service ID</label>
        <input type="text" name="service_id" id="service_id" value="{{ old('service_id', $service->service_id ?? '') }}" required>

        <label for="doctors_id">Doctor ID</label>
        <input type="number" name="doctors_id" id="doctors_id" value="{{ old('doctors_id', $service->doctors_id ?? '') }}" required>

        <label for="service_name">Service Name</label>
        <input type="text" name="service_name" id="service_name" value="{{ old('service_name', $service->service_name ?? '') }}" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" rows="4" required>{{ old('description', $service->description ?? '') }}</textarea>

        <label for="fees">Fees ($)</label>
        <input type="number" step="0.01" name="fees" id="fees" value="{{ old('fees', $service->fees ?? '') }}" required>

        <label for="duration">Duration (minutes)</label>
        <input type="number" name="duration" id="duration" value="{{ old('duration', $service->duration ?? '') }}" required>

        <button type="submit">Save Service</button>
    </form>
</div>
@endsection
