@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f5f7fa;
        color: #333;
    }
    .container {
        max-width: 1000px;
        margin: 40px auto;
        background: #fff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }
    h2 {
       color: #2c3e50;
       margin-bottom: 30px;
       font-weight: 700;
       letter-spacing: 0.5px;
       font-size: 28px;
       padding-bottom: 10px;
    }
    .btn-custom {
        background: linear-gradient(45deg, #28a745, #218838);
        color: #fff;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 25px;
    }
    
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 15px;
    }
    thead th {
        background: #007bff;
        color: white;
        padding: 12px 15px;
        text-align: left;
        font-weight: 700;
        border-radius: 12px 12px 0 0;
    }
    tbody tr {
        background: #fefefe;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border-radius: 12px;
        transition: transform 0.2s ease;
    }
    
    tbody td {
        padding: 15px 15px;
        vertical-align: middle; /* مهم لجعل المحتوى يتوسط عمودياً */
        border-bottom: none;
        color: #555;
    }
    tbody td.description {
        max-width: 350px;
        white-space: normal;
    }
    /* ضبط عمود الأكشن ليكون وسط عمودياً */
    tbody td.actions {
        display: flex;
        gap: 10px;
        justify-content: center; /* توسيط افقي */
        align-items: center; /* توسيط عمودي */
        vertical-align: middle; /* للجدول */
        min-width: 140px; /* اتساع مناسب للأزرار */
        
    }
    .btn-edit, .btn-delete {
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        color: #fff;
    }
    .btn-edit {
        background: #007bff;
    }
    
    .btn-delete {
        background: #dc3545;
    }
   
    .no-services {
        text-align: center;
        font-style: italic;
        color: #888;
        padding: 20px 0;
    }
</style>

<div class="container">
    <h2>All Services</h2>

    <a href="{{ route('dataservice.create') }}" class="btn-custom">Add New Service</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($services->isEmpty())
        <div class="no-services">No services found.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Doctor ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Fees ($)</th>
                    <th>Duration (min)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->service_id }}</td>
                    <td>{{ $service->doctors_id }}</td>
                    <td>{{ $service->service_name }}</td>
                    <td class="description">{{ $service->description }}</td>
                    <td>{{ number_format($service->fees, 2) }}</td>
                    <td>{{ $service->duration }}</td>
                    <td class="actions">
                        <a href="{{ route('dataservice.edit', $service->service_id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('dataservice.destroy', $service->service_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
