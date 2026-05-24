@extends('layouts.layout')

@section('title', 'News')

@section('content')
    <h2>Our News</h2>

    @foreach($news as $article)
        <div>
            <h3>{{ $article->title }}</h3>
            
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width: 100%; max-width: 400px; border-radius: 8px;">
            @endif
            
            <p>{{ $article->content }}</p>
            
            <p><small>Published: {{ $article->created_at->format('d-m-Y H:i') }}</small></p>
            
            <hr>
        </div>
    @endforeach
@endsection