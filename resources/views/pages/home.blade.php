@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <h2>Welcome to ReviewFlix!</h2>
    <p>Your favorite rating platform</p>
    
    <hr>

    <h3>Latest News</h3>
    <ul>
        @forelse($latestNews as $news)
            <li>
                <strong>{{ $news->title }}</strong> 
                <span style="color: gray; font-size: 0.9em;">({{ $news->created_at->format('d-m-Y') }})</span>
            </li>
        @empty
            <p>No news articles available yet.</p>
        @endforelse
    </ul>

    <hr>

    <h3>Latest Movies</h3>
    <ul>
        @forelse($latestMovies as $movie)
            <li>
                <strong>{{ $movie->title }}</strong> 
                <span style="color: gray; font-size: 0.9em;">({{ $movie->release_date?->format('d-m-Y') ?? 'N/A' }})</span>
                - <em>{{ $movie->genre ?? 'Unknown' }}</em>
            </li>
        @empty
            <p>No movies added yet.</p>
        @endforelse
    </ul>
    
    <hr>

    <h3>Latest Series</h3>
    <ul>
        @forelse($latestSeries as $series)
            <li>
                <strong>{{ $series->title }}</strong> 
                <span style="color: gray; font-size: 0.9em;">({{ $series->release_date?->format('d-m-Y') ?? 'N/A' }})</span>
                - <em>{{ $series->genre ?? 'Unknown' }}</em>
            </li>
        @empty
            <p>No series added yet.</p>
        @endforelse
    </ul>

    <hr>

    <h3>Latest Reviews</h3>
    <ul>
        @forelse($latestReviews as $review)
            <li>
                <strong>
                    <!-- Dit tekent 5 sterren -->
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            <span style="color: gold;">★</span> <!-- Ingevulde ster -->
                        @else
                            <span style="color: lightgray;">★</span> <!-- Lege/grijze ster -->
                        @endif
                    @endfor
                </strong> 
                <br>
                <span style="color: gray; font-size: 0.9em;">
                    by {{ $review->user->username ?? 'Unknown user' }}
                </span>
                
                @if($review->opinion)
                    <br>
                    <small>"{{ \Illuminate\Support\Str::limit($review->opinion, 500) }}"</small>
                @endif
            </li>
        @empty
            <p>No reviews written yet.</p>
        @endforelse
    </ul>
@endsection