<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaItem extends Model
{
    use HasFactory;

    protected $fillable = [
    'type',
    'title',
    'image',
    'summary',
    'genre',
    'duration',
    'release_date',
    'episodes',
    ];

    protected $casts = [
        'release_date' => 'date',
    ];

    public function reviews() {
        return $this->hasMany(Review::class);
    }
    
}
