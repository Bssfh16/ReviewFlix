@extends('layouts.layout')

@section('title', 'Create Media')

@section('content')
    <h2>Create Media (Movie/Serie)</h2>

    <form method="POST" action="{{ route('media.store') }}">
        @csrf

        <label>Type:</label>
        <select name="type" required>
            <option value="">Select type</option>
            <option value="Movie">Movie</option>
            <option value="Serie">Serie</option>
        </select>
        @error('type') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Title:</label>
        <input type="text" name="title" required>
        @error('title') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Genre:</label>
        <input type="text" name="genre">
        @error('genre') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Summary:</label>
        <textarea name="summary" rows="5"></textarea>

        <label>Image URL:</label>
        <input type="url" name="image">

        <label>Duration (minutes):</label>
        <input type="number" name="duration">

        <label>Episodes (for Series):</label>
        <input type="number" name="episodes">

        <label>Release Date:</label>
        <input type="date" name="release_date">

        <button type="submit">Create</button>
    </form>
@endsection