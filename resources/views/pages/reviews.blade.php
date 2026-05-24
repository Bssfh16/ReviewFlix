@extends('layouts.layout')

@section('title', 'Reviews')

@section('content')
    <h2>Our Reviews</h2>

    @foreach($reviews as $review)
        <div>
            <h3>{{ $review->mediaItem->title }}</h3>
            <p>By: {{ $review->user->username }}</p>
            <p>Rating: {{ $review->rating }}/5 stars</p>
            
            @if($review->opinion)
                <p>{{ $review->opinion }}</p>
            @endif
            
            <p><small>Posted: {{ $review->created_at->format('d-m-Y H:i') }}</small></p>
            <hr>
        </div>
    @endforeach
@endsection