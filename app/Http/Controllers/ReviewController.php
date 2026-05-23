<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Review;
use App\Models\MediaItem;

class ReviewController extends Controller
{
    public function index() {
        {
            $reviews = Review::with('mediaItem', 'user')->latest()->get();
            return view('pages.reviews', ['reviews' => $reviews]);
        }
    }

    public function create($id)
    {
        $mediaItem = MediaItem::findOrFail($id);
        return view('pages.create-review', ['mediaItem' => $mediaItem]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'media_item_id' => 'required|exists:media_items,id',
            'rating' => 'required|integer|min:1|max:5',
            'opinion' => 'nullable|string',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'media_item_id' => $request->media_item_id,
            'rating' => $request->rating,
            'opinion' => $request->opinion,
        ]);

        return redirect('/reviews')->with('success', 'Review posted!');
    }
}  