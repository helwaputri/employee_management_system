<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Nama tabel (opsional, Laravel otomatis mengenali dari nama model)
    protected $table = 'employees';

    // Kolom yang bisa diisi (mass-assignable)
    protected $fillable = [
        'name',
        'email',
        'position',
        'salary',
        'photo'
    ];
}
