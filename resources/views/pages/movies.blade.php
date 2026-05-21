@extends('layouts.layout')

@section('title', 'Movies')

@section('content')
    <h2>Our Movies</h2>

    @foreach($movies as $movie)
        <div>
            <h3>{{ $movie->title }}</h3>
            <p><strong>Type:</strong> {{ $movie->type }}</p>
            <img src="{{ $movie->image }}" alt="{{ $movie->title }}">
            <p><strong>Genre:</strong> {{ $movie->genre }}</p>
            <p><strong>Summary:</strong> {{ $movie->summary }}</p>
            <p><strong>Duration:</strong> {{ $movie->duration }} minutes</p>
            <p><strong>Release Date:</strong> {{ $movie->release_date }}</p>
        </div>
    @endforeach
@endsection