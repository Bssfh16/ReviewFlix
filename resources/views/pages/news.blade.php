@extends('layouts.layout')

@section('title', 'News')

@section('content')
    <h2>Our News</h2>

    @foreach($news as $article)
        <div>
            <h3>{{ $article->title }}</h3>
            
            @if($article->image)
                <img src="{{ $article->image }}" alt="" style="width: 200px;">
            @endif
            
            <p>{{ $article->content }}</p>
            
            <p><small>Published: {{ $article->created_at->format('d-m-Y H:i') }}</small></p>
            
            <hr>
        </div>
    @endforeach
@endsection