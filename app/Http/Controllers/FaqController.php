<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;

class FaqController extends Controller
{
    public function index() {
        {
            $faq = FaqCategory::with('faqitems')->get(); 
            return view('pages.faq', ['faq' => $faq]);
        }
    }

    public function adminIndex() {
    return view('admin.faq.index');
    }

}
