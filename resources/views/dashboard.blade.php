<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3>{{ __("You're logged in!") }}</h3>

                    @if (session()->has('user'))
                        <p><strong>البريد الإلكتروني:</strong> {{ session('user')['user']['email'] }}</p>
                        <p><strong>الدور:</strong> {{ session('user')['user']['role'] ?? 'غير محدد' }}</p>
                        <p><strong>المعرف (UUID):</strong> {{ session('user')['user']['id'] }}</p>
                    @else
                        <p>لا يوجد بيانات مستخدم.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
