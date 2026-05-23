@extends('layouts.layout')

@section('title', $user->username)

@section('content')
    <div>
        <h2>{{ $user->username }}</h2>
        
        @if($user->profile_photo)
            <img src="{{ $user->profile_photo }}" alt="{{ $user->username }}" style="width: 200px; border-radius: 10px;">
        @endif
        
        @if($user->birthday)
            <p><strong>Birthday:</strong> {{ $user->birthday->format('d-m-Y') }}</p>
        @endif
        
        @if($user->country)
            <p><strong>Country:</strong> {{ $user->country }}</p>
        @endif
        
        @if($user->about)
            <p><strong>About:</strong> {{ $user->about }}</p>
        @endif

        @if(auth()->check() && auth()->user()->id === $user->id)
            <a href="/profile/edit">Edit Profile</a>
        @endif
    </div>
@endsection