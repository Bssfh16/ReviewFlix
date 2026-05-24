@extends('layouts.layout')

@section('title', 'Reviews')

@section('content')
    <h2>Our Reviews</h2>

    @foreach($reviews as $review)
        <div>
            <h3>{{ $review->mediaItem->title }}</h3>
            
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $review->rating)
                    <span style="color: gold;">★</span>
                @else
                    <span style="color: lightgray;">★</span>
                @endif
            @endfor

            @if($review->opinion)
                <p>{{ $review->opinion }}</p>
            @endif

            <p>By: {{ $review->user->username }}</p>
            
            <p><small>Posted: {{ $review->created_at->format('d-m-Y H:i') }}</small></p>
            <hr>
        </div>
    @endforeach
@endsection