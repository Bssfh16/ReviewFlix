@extends('layouts.layout')

@section('title', 'Review: ' . $mediaItem->title)

@section('content')
    <h2>Write a Review for: {{ $mediaItem->title }}</h2>

    <form method="POST" action="{{ route('review.store') }}">
        @csrf
        
        <input type="hidden" name="media_item_id" value="{{ $mediaItem->id }}">
        
        <label>Rating (1-5 stars):</label>
        <select name="rating" required>
            <option value="">Select rating</option>
            <option value="1">⭐</option>
            <option value="2">⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="5">⭐⭐⭐⭐⭐</option>
        </select>
        @error('rating') <p style="color: red;">{{ $message }}</p> @enderror
        
        <label>Your Opinion:</label>
        <textarea name="opinion" rows="5"></textarea>
        @error('opinion') <p style="color: red;">{{ $message }}</p> @enderror
        
        <button type="submit">Post Review</button>
    </form>
@endsection