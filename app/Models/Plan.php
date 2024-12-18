<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plans';

    protected $fillable = [
        'ceremony_type',
        'location',
        'customizations',
        'seventh_day',
        'death_anniversary',
        'extras',
        'final_observations',
    ];

    // Cast JSON fields to arrays
    protected $casts = [
        'customizations' => 'array',
        'extras' => 'array',
    ];
}
