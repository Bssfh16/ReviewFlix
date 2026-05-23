@extends('layouts.layout')

@section('title', 'Create FAQ Item')

@section('content')
    <h2>Create FAQ Item</h2>

    <form method="POST" action="{{ route('faq.item-store') }}">
        @csrf

        <label>Category:</label>
        <select name="faq_category_id" required>
            <option value="">Select category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->subject }}</option>
            @endforeach
        </select>
        @error('faq_category_id') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Question:</label>
        <input type="text" name="question" required>
        @error('question') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Answer:</label>
        <textarea name="answer" rows="5" required></textarea>
        @error('answer') <p style="color: red;">{{ $message }}</p> @enderror

        <button type="submit">Create</button>
    </form>
@endsection