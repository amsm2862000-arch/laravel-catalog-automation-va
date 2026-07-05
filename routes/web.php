<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// الصفحة الرئيسية للموقع
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// مسارات إدارة المهام (عرض، إضافة، تعديل، حذف)
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
