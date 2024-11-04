<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Mengarahkan root URL (/) ke halaman daftar karyawan
Route::get('/', function () {
    return redirect()->route('employees.index');
});

// Rute untuk CRUD Employee
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');      // Menampilkan daftar karyawan
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create'); // Menampilkan form tambah karyawan
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');         // Menyimpan data karyawan baru
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');  // Menampilkan detail karyawan
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit'); // Menampilkan form edit karyawan
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');  // Mengupdate data karyawan
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy'); // Menghapus data karyawan
