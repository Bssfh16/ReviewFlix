<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaqCategory extends Model
{
    use HasFactory;

    protected $fillable = [
    'subject',
    ];

    public function faqitems() {
        return $this->hasMany(FaqItem::class);
    }
  
}
