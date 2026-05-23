<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaqItem extends Model
{
    use HasFactory;

    protected $fillable = [
    'faq_category_id',
    'question',
    'answer',
    ];

    public function category() {
        return $this->belongsTo(FaqCategory::class);
    }


}
