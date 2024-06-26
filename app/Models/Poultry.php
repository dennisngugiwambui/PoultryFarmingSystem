<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poultry extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmerName',
        'farmerPhone',
        'number',
        'type',
        'date',
        'comments',
    ];
}
