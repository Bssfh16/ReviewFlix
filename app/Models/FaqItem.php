<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqItem extends Model
{
    public function category() {
    return $this->belongsTo(FaqCategory::class);
    }

    
}
