<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    public function items() {
        return $this->hasMany(FaqItem::class);
    }

    
}
