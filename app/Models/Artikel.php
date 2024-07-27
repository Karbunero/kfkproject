<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';
    protected $primaryKey = 'id'; // Nama kolom primary key
    public $incrementing = false; // Nonaktifkan auto-increment
    protected $keyType = 'string'; // Tipe data primary key (UUID)

    protected $fillable = [
        'id', // Tetapkan 'id' sebagai fillable karena kita harus mengisinya secara manual
        'foto',
        'penulis',
        'judul',
        'kalimat',
        'tanggal',
    ];
}
