<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>قائمة المرضى</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
<div class="container">
    <div class="card shadow rounded-4 p-4">
        <h2 class="mb-4 text-center">📋 قائمة المرضى</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ url('/createpatient') }}" class="btn btn-primary mb-3">➕ إضافة مريض جديد</a>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>رقم المريض</th>
                    <th>رقم الهاتف</th>
                    <th>العنوان</th>
                    <th>تاريخ الميلاد</th>
                    <th>رقم المستخدم</th>
                </tr>
            </thead>
            <tbody>
                @forelse($patients as $patient)
                    <tr>
                        <td>{{ $patient['patient_id'] ?? '-' }}</td>
                        <td>{{ $patient['phone'] ?? '-' }}</td>
                        <td>{{ $patient['address'] ?? '-' }}</td>
                        <td>{{ $patient['birth_date'] ?? '-' }}</td>
                        <td>{{ $patient['users_id'] ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">لا يوجد بيانات</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
