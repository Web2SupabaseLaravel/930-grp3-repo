<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة مريض جديد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
<div class="container">
    <div class="card shadow rounded-4 p-4">
        <h2 class="mb-4 text-center">🩺 إضافة مريض جديد</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('patient.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="phone" class="form-label">رقم الهاتف</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="address" class="form-label">العنوان</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="birth_date" class="form-label">تاريخ الميلاد</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="users_id" class="form-label">رقم المستخدم</label>
                    <input type="text" name="users_id" id="users_id" class="form-control" required>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success px-4">💾 حفظ</button>
                <a href="{{ route('patient.index') }}" class="btn btn-secondary">🔙 عودة للقائمة</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
