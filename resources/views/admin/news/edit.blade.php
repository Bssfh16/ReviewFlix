@extends('layouts.layout')

@section('title', 'Edit News')

@section('content')
    <h2>Edit News Article</h2>

    <form method="POST" action="{{ route('news.update', $newsItem->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label>Title:</label>
        <input type="text" name="title" value="{{ $newsItem->title }}" required>
        @error('title') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Content:</label>
        <textarea name="content" rows="10" required>{{ $newsItem->content }}</textarea>
        @error('content') <p style="color: red;">{{ $message }}</p> @enderror

        @if($newsItem->image)
            <div style="margin-top: 15px; margin-bottom: 10px;">
                <p style="margin-bottom: 5px;"><strong>Current Image:</strong></p>
                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Current image" style="max-width: 200px; border-radius: 8px;">
            </div>
        @endif

        <label>News Image (Upload new to replace):</label>
        <input type="file" name="image" accept="image/*">
        @error('image') <p style="color: red;">{{ $message }}</p> @enderror

        <br><br>
        <button type="submit">Update</button>
        <a href="{{ route('news.admin-index') }}">Cancel</a>
    </form>
@endsection