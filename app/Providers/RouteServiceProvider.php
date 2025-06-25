<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * مسار الصفحة الرئيسية لتطبيقك. عادة بعد تسجيل الدخول.
     */
    public const HOME = '/dashboard';

    /**
     * تسجيل أي خدمات روت إضافية هنا.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // تحميل مسارات API
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // تحميل مسارات الويب
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
