@extends('layouts.layout')

@section('title', 'Edit FAQ Item')

@section('content')
    <h2>Edit FAQ Item</h2>

    <form method="POST" action="{{ route('faq.item-update', $item->id) }}">
        @csrf
        @method('PATCH')

        <label>Category:</label>
        <select name="faq_category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $item->faq_category_id === $category->id ? 'selected' : '' }}>{{ $category->subject }}</option>
            @endforeach
        </select>
        @error('faq_category_id') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Question:</label>
        <input type="text" name="question" value="{{ $item->question }}" required>
        @error('question') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Answer:</label>
        <textarea name="answer" rows="5" required>{{ $item->answer }}</textarea>
        @error('answer') <p style="color: red;">{{ $message }}</p> @enderror

        <button type="submit">Update</button>
        <a href="{{ route('faq.admin-index') }}">Cancel</a>
    </form>
@endsection