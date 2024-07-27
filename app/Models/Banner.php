<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Support\Str;
use PDO;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banner';

    protected $fillable = [
        'foto',
    ];
}
