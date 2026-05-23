@extends('layouts.layout')

@section('title', 'Admin - FAQ')

@section('content')
    <h2>Manage FAQ</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div style="margin-bottom: 20px;">
        <a href="{{ route('faq.category-create') }}" style="margin-right: 10px;">+ Create Category</a>
        <a href="{{ route('faq.item-create') }}">+ Create Item</a>
    </div>

    @foreach($categories as $category)
        <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
            <h3 style="margin-top: 0;">{{ $category->subject }}</h3>
            
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 1px solid #ccc;">
                        <th style="padding: 10px; text-align: left;">Question</th>
                        <th style="padding: 10px; text-align: left;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category->faqItems as $item)
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 10px;">{{ $item->question }}</td>
                            <td style="padding: 10px;">
                                <a href="{{ route('faq.item-edit', $item->id) }}">Edit</a> |
                                <form action="{{ route('faq.item-destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form action="{{ route('faq.category-destroy', $category->id) }}" method="POST" style="margin-top: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete category and all items?')" style="color: red;">Delete Category</button>
            </form>
        </div>
    @endforeach
@endsection