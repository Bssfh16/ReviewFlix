@extends('layouts.layout')

@section('title', 'Edit News')

@section('content')
    <h2>Edit News Article</h2>

    <form method="POST" action="{{ route('news.update', $newsItem->id) }}">
        @csrf
        @method('PATCH')

        <label>Title:</label>
        <input type="text" name="title" value="{{ $newsItem->title }}" required>
        @error('title') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Content:</label>
        <textarea name="content" rows="10" required>{{ $newsItem->content }}</textarea>
        @error('content') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Image URL:</label>
        <input type="url" name="image" value="{{ $newsItem->image }}">
        @error('image') <p style="color: red;">{{ $message }}</p> @enderror

        <button type="submit">Update</button>
        <a href="{{ route('news.admin-index') }}">Cancel</a>
    </form>
@endsection