<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;
use App\Models\User;

class NewsController extends Controller 
{
    public function index() {
            $news = NewsItem::latest()->get();
            return view('pages.news', ['news' => $news]);
    }
    
    // Admin: List all
    public function adminIndex()
    {
        $news = NewsItem::with('user')->latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    // Admin: Create form
    public function create()
    {
        return view('admin.news.create');
    }

    // Admin: Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news_images', 'public');
        }

        NewsItem::create($validated);

        return redirect(route('news.admin-index'))->with('success', 'News created!');
    }

    // Admin: Edit form
    public function edit($id)
    {
        $newsItem = NewsItem::findOrFail($id);
        return view('admin.news.edit', compact('newsItem'));
    }

    // Admin: Update
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news_images', 'public');
        } else {
            unset($validated['image']);
        }

        $newsItem = NewsItem::findOrFail($id);
        
        $newsItem->update($validated);

        return redirect(route('news.admin-index'))->with('success', 'News updated!');
    }

    // Admin: Delete
    public function destroy($id)
    {
        $newsItem = NewsItem::findOrFail($id);
        $newsItem->delete();

        return redirect(route('news.admin-index'))->with('success', 'News deleted!');
    }
}