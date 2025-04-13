<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'price',
        'image_path',
    ];
    protected $casts = [
        'capacity' => 'integer',
        'price' => 'decimal:2',
    ];
}
