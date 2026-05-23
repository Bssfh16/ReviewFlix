@extends('layouts.layout')

@section('title', $user->username)

@section('content')
    <div>
        <h2>{{ $user->username }}</h2>
        
        @if($user->profile_photo)
            <img src="{{ $user->profile_photo }}" alt="{{ $user->username }}" style="width: 200px; border-radius: 10px;">
        @endif
        
        @if(auth()->check() && auth()->user()->id === $user->id)
            @if(request('edit') === 'true')
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    
                    <label>Username:</label>
                    <input type="text" name="username" value="{{ $user->username }}" required>
                    @error('username') <p style="color: red;">{{ $message }}</p> @enderror

                    <label>About Me:</label>
                    <textarea name="about">{{ $user->about ?? '' }}</textarea>

                    <label>Country:</label>
                    <input type="text" name="country" value="{{ $user->country ?? '' }}">
                    
                    <label>Birthday:</label>
                    <input type="date" name="birthday" value="{{ $user->birthday?->format('Y-m-d') }}">
                    
                    <button type="submit">Save Changes</button>
                    <a href="/profile/{{ $user->username }}">Cancel</a>
                </form>
            @else
                <p><strong>About:</strong> {{ $user->about ?? '' }}</p>
                <p><strong>Country:</strong> {{ $user->country ?? '' }}</p>
                <p><strong>Birthday:</strong> {{ $user->birthday?->format('d-m-Y') ?? '' }}</p>
                
                <a href="/profile/{{ $user->username }}?edit=true">Edit Profile</a>
            @endif

        @else
            <p><strong>About:</strong> {{ $user->about ?? '' }}</p>
            <p><strong>Country:</strong> {{ $user->country ?? '' }}</p>
            <p><strong>Birthday:</strong> {{ $user->birthday?->format('d-m-Y') ?? '' }}</p>
        @endif
    </div>
@endsection