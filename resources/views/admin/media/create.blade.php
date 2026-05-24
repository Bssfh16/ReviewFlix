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
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
            
            <select name="genre" id="genre_select" style="flex: 1;">
                <option value="">Select an existing genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre }}">{{ $genre }}</option>
                @endforeach
            </select>

            <input type="text" name="new_genre" id="new_genre_input" placeholder="Type new genre name..." style="display: none; flex: 1;">

            <button type="button" id="toggle_genre_btn" style="padding: 5px 10px; cursor: pointer;" title="Add new genre">
                ➕
            </button>
        </div>

        <script>
            document.getElementById('toggle_genre_btn').addEventListener('click', function() {
                let select = document.getElementById('genre_select');
                let input = document.getElementById('new_genre_input');
                
                if (select.style.display === 'none') {
                    select.style.display = 'block';
                    input.style.display = 'none';
                    input.value = '';
                    this.innerHTML = '➕';
                    this.title = 'Add new genre';
                } else {
                    select.style.display = 'none';
                    select.value = '';
                    input.style.display = 'block';
                    this.innerHTML = '✖️';
                    this.title = 'Cancel new genre';
                }
            });
        </script>

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