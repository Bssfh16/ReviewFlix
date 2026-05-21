<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaItem;


class MediaController extends Controller
{
    public function movies() {
        $movies = MediaItem::where('type', 'Movie')->get(); 
        return $movies;
    }

    public function series() {
        $series = MediaItem::where('type', 'Serie')->get(); 
        return $series;
    }

}    
