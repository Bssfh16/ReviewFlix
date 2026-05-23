@extends('layouts.layout')

@section('title', 'Series')

@section('content')
    <h2>Our Series</h2>

    @foreach($series as $serie)
        <div>
            <h3>{{ $serie->title }}</h3>
            <p><strong>Type:</strong> {{ $serie->type }}</p>
            <img src="{{ $serie->image }}" alt="{{ $serie->title }}">
            <p><strong>Genre:</strong> {{ $serie->genre }}</p>
            <p><strong>Summary:</strong> {{ $serie->summary }}</p>
            <p><strong>Episodes:</strong> {{ $serie->episodes }}</p>
            <p><strong>Release Date:</strong> {{ $serie->release_date?->format('d-m-Y') }}</p>

            @if(auth()->check())
                <a href="{{ route('review.create', $serie->id) }}">Write Review</a>
            @else
                <p><a href="/login">Login to write a review</a></p>
            @endif
        </div>
    @endforeach
@endsection