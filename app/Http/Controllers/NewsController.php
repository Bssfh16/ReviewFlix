<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;

class NewsController extends Controller 
{
    public function index() {
            $news = NewsItem::all();
            return view('pages.news', ['news' => $news]);
    }    
}
