@extends('layouts.layout')

@section('title', 'Edit Media')

@section('content')
    <h2>Edit Media</h2>

    <form method="POST" action="{{ route('media.update', $mediaItem->id) }}">
        @csrf
        @method('PATCH')

        <label>Type:</label>
        <select name="type" required>
            <option value="Movie" {{ $mediaItem->type === 'Movie' ? 'selected' : '' }}>Movie</option>
            <option value="Serie" {{ $mediaItem->type === 'Serie' ? 'selected' : '' }}>Serie</option>
        </select>
        @error('type') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Title:</label>
        <input type="text" name="title" value="{{ $mediaItem->title }}" required>
        @error('title') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Genre:</label>
        <input type="text" name="genre" value="{{ $mediaItem->genre }}">

        <label>Summary:</label>
        <textarea name="summary" rows="5">{{ $mediaItem->summary }}</textarea>

        <label>Image URL:</label>
        <input type="url" name="image" value="{{ $mediaItem->image }}">

        <label>Duration (minutes):</label>
        <input type="number" name="duration" value="{{ $mediaItem->duration }}">

        <label>Episodes (for Series):</label>
        <input type="number" name="episodes" value="{{ $mediaItem->episodes }}">

        <label>Release Date:</label>
        <input type="date" name="release_date" value="{{ $mediaItem->release_date?->format('Y-m-d') }}">

        <button type="submit">Update</button>
        <a href="{{ route('media.admin-index') }}">Cancel</a>
    </form>
@endsection