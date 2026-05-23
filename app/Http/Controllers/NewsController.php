<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;
use App\Models\User;

class NewsController extends Controller 
{
    public function index() {
            $news = NewsItem::all();
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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|url',
        ]);

        NewsItem::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'user_id' => auth()->id(),
        ]);

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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|url',
        ]);

        $newsItem = NewsItem::findOrFail($id);
        $newsItem->update($request->all());

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
