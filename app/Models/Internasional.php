<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Support\Str;

class Internasional extends Model
{
    use HasFactory;

    protected $table = 'internasional';
    protected $primaryKey = 'id'; // Nama kolom primary key
    public $incrementing = false; // Nonaktifkan auto-increment
    protected $keyType = 'string'; // Tipe data primary key (UUID)

    protected $fillable = [
        'id', // Tetapkan 'id' sebagai fillable karena kita harus mengisinya secara manual
        'foto',
        'kalimat',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
