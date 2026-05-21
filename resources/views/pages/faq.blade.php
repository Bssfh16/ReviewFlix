@extends('layouts.layout')

@section('title', 'FAQ')

@section('content')
    <h2>Frequently Asked Questions</h2>

    @foreach($faq as $category)
        <div>
            <h3>{{ $category->name }}</h3>
            
            @foreach($category->faqitems as $item)
                <div>
                    <h4>{{ $item->question }}</h4>
                    <p>{{ $item->answer }}</p>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection