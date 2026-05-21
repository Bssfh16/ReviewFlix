<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;

class FaqController extends Controller
{
    public function index() {
        {
            $faq = FaqCategory::with('faqitems')->get(); 
            return $faq;
        }
    }

}
