<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id'; // Nama kolom primary key
    public $incrementing = false; // Nonaktifkan auto-increment
    protected $keyType = 'string'; // Tipe data primary key (UUID)

    protected $fillable = [
        'id', // Tetapkan 'id' sebagai fillable karena kita harus mengisinya secara manual
        'rundown',
        'jam_mulai',
        'jam_selesai',
        'tanggal',
    ];

    // Jika ingin mendefinisikan format tanggal yang diambil dari database
    protected $dates = [
        'tanggal', // Kolom tanggal
    ];
}
