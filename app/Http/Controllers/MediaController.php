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

    // Admin: List all
    public function adminIndex()
    {
        $media = MediaItem::latest()->paginate(10);
        return view('admin.media.index', compact('media'));
    }

    // Admin: Create form
    public function create()
    {
        $genres = \App\Models\MediaItem::select('genre')
                    ->distinct()
                    ->whereNotNull('genre')
                    ->pluck('genre');

        return view('admin.media.create', compact('genres'));
    }

    // Admin: Store
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:Movie,Serie',
            'title' => 'required|string|max:255',
            'image' => 'nullable|url',
            'summary' => 'nullable|string',
            'genre' => 'nullable|string',
            'duration' => 'nullable|integer',
            'release_date' => 'nullable|date',
            'episodes' => 'nullable|integer',
        ]);

        $finalGenre = $request->filled('new_genre') ? $request->new_genre : $request->genre;
        $request->merge([
            'genre' => $finalGenre
        ]);

        MediaItem::create($request->all());

        return redirect(route('media.admin-index'))->with('success', 'Media created!');
    }

    // Admin: Edit form
    public function edit($id)
    {
        $mediaItem = MediaItem::findOrFail($id);
        return view('admin.media.edit', compact('mediaItem'));
    }

    // Admin: Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:Movie,Serie',
            'title' => 'required|string|max:255',
            'image' => 'nullable|url',
            'summary' => 'nullable|string',
            'genre' => 'nullable|string',
            'duration' => 'nullable|integer',
            'release_date' => 'nullable|date',
            'episodes' => 'nullable|integer',
        ]);

        $mediaItem = MediaItem::findOrFail($id);
        $mediaItem->update($request->all());

        return redirect(route('media.admin-index'))->with('success', 'Media updated!');
    }

    // Admin: Delete
    public function destroy($id)
    {
        $mediaItem = MediaItem::findOrFail($id);
        $mediaItem->delete();

        return redirect(route('media.admin-index'))->with('success', 'Media deleted!');
    }

}    
