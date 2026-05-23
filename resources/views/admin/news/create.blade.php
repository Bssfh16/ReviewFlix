@extends('layouts.layout')

@section('title', 'Create News')

@section('content')
    <h2>Create News Article</h2>

    <form method="POST" action="{{ route('news.store') }}">
        @csrf

        <label>Title:</label>
        <input type="text" name="title" required>
        @error('title') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Content:</label>
        <textarea name="content" rows="10" required></textarea>
        @error('content') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Image URL:</label>
        <input type="url" name="image">
        @error('image') <p style="color: red;">{{ $message }}</p> @enderror

        <button type="submit">Create</button>
    </form>
@endsection