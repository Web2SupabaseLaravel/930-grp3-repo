<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة مريض</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <h2 class="mb-4">إضافة مريض جديد</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('patient.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="phone" class="form-label">رقم الهاتف</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">العنوان</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="birth_date" class="form-label">تاريخ الميلاد</label>
                <input type="date" name="birth_date" id="birth_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="users_id" class="form-label">رقم المستخدم (users_id)</label>
                <input type="text" name="users_id" id="users_id" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">حفظ</button>
            <a href="{{ route('patient.index') }}" class="btn btn-secondary">عودة للقائمة</a>
        </form>
    </div>
</body>
</html>
