<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutomationController;

/*
|--------------------------------------------------------------------------
| Web Routes - Technical VA Automation Pipeline
|--------------------------------------------------------------------------
*/

// مسار عرض لوحة تحكم الأتمتة والمساعد الافتراضي
Route::get('/automation/dashboard', [AutomationController::class, 'index'])->name('automation.index');

// مسار معالجة ورفع الملفات وبدء الأتمتة الخلفية
Route::post('/automation/execute', [AutomationController::class, 'uploadCatalog'])->name('automation.execute');
