<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index() {
        {
            $reviews = Review::with('mediaItem', 'user')->get();
            return view('pages.reviews', ['reviews' => $reviews]);
        }
    }
    
}    