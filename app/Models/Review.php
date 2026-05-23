<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'media_item_id',
        'rating',
        'opinion',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function mediaItem() {
        return $this->belongsTo(MediaItem::class);
    }
    
}
