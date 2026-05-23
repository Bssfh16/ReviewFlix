<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaItem;


class MediaController extends Controller
{
    public function movies() {
        $movies = MediaItem::where('type', 'Movie')->get(); 
        return view('pages.movies', ['movies' => $movies]);
    }

    public function series() {
        $series = MediaItem::where('type', 'Serie')->get(); 
        return view('pages.series', ['series' => $series]);
    }

    public function adminIndex() {
    return view('admin.media.index');
    }

}    
