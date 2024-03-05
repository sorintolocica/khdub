<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';

    protected $fillable = [
        'title',
        'type', // 'TV', 'OVA', 'Movie', 'Special', 'ONA', 'Music'
        'rating',
        'year',
        'genres',
        'studio',
        'episodes',
        'status',
        'description',
        'image',
    ];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
