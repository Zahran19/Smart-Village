<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanWarga extends Model
{
    use HasFactory;

    protected $table = 'pesan_wargas';

    protected $fillable = [
        'nama',
        'no_telepon',
        'pesan',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
