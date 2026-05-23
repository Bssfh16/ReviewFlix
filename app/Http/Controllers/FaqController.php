<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqItem;

class FaqController extends Controller
{
    public function index() {
        {
            $faq = FaqCategory::with('faqitems')->get(); 
            return view('pages.faq', ['faq' => $faq]);
        }
    }

    // Admin: List all categories and items
    public function adminIndex()
    {
    $categories = FaqCategory::with(['faqItems' => function($query) {
        $query->latest();
    }])->get();
    return view('admin.faq.index', compact('categories'));
    }

    // Admin: Create category form
    public function createCategory()
    {
        return view('admin.faq.create-category');
    }

    // Admin: Store category
    public function storeCategory(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
        ]);

        FaqCategory::create($request->all());

        return redirect(route('faq.admin-index'))->with('success', 'Category created!');
    }

    // Admin: Delete category
    public function destroyCategory($id)
    {
        $category = FaqCategory::findOrFail($id);
        $category->delete();

        return redirect(route('faq.admin-index'))->with('success', 'Category deleted!');
    }

    // Admin: Create item form
    public function createItem()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.create-item', compact('categories'));
    }

    // Admin: Store item
    public function storeItem(Request $request)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FaqItem::create($request->all());

        return redirect(route('faq.admin-index'))->with('success', 'Item created!');
    }

    // Admin: Edit item form
    public function editItem($id)
    {
        $item = FaqItem::findOrFail($id);
        $categories = FaqCategory::all();
        return view('admin.faq.edit-item', compact('item', 'categories'));
    }

    // Admin: Update item
    public function updateItem(Request $request, $id)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $item = FaqItem::findOrFail($id);
        $item->update($request->all());

        return redirect(route('faq.admin-index'))->with('success', 'Item updated!');
    }

    // Admin: Delete item
    public function destroyItem($id)
    {
        $item = FaqItem::findOrFail($id);
        $item->delete();

        return redirect(route('faq.admin-index'))->with('success', 'Item deleted!');
    }

}
