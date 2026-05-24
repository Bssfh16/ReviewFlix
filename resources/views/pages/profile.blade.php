@extends('layouts.layout')

@section('title', $user->username)

@section('content')
    <div>
        <h2>Username: {{ $user->username }}</h2>
        
        @if($user->pp)
            @php
                $imageUrl = str_starts_with($user->pp, 'http') ? $user->pp : asset('storage/' . $user->pp);
            @endphp
            <img src="{{ $imageUrl }}" alt="{{ $user->username }}" style="width: 200px; height: 200px; object-fit: cover; border-radius: 10px; margin-bottom: 20px;">
        @endif
        
        @if(auth()->check() && auth()->user()->id === $user->id)
            
            @if(request('edit') === 'true')
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <label>Username:</label>
                    <input type="text" name="username" value="{{ $user->username }}" required>
                    @error('username') <p style="color: red;">{{ $message }}</p> @enderror

                    <label>Profile Picture (URL):</label>
                    <input type="file" name="pp" accept="image/*">
                    @error('pp') <p style="color: red;">{{ $message }}</p> @enderror

                    <label>Favorite Flavors (Hold CTRL/CMD to select multiple):</label>
                    <select name="flavors[]" multiple style="height: 120px;">
                        @foreach($genres as $genre)
                            <option value="{{ $genre }}" {{ is_array($user->flavors) && in_array($genre, $user->flavors) ? 'selected' : '' }}>
                                {{ $genre }}
                            </option>
                        @endforeach
                    </select>
                    @error('flavors') <p style="color: red;">{{ $message }}</p> @enderror

                    <label>About Me:</label>
                    <textarea name="about" rows="4">{{ $user->about ?? '' }}</textarea>

                    <label>Country:</label>
                    <input type="text" name="country" value="{{ $user->country ?? '' }}">
                    
                    <label>Birthday:</label>
                    <input type="date" name="birthday" value="{{ $user->birthday?->format('Y-m-d') }}">
                    
                    <br><br>
                    <button type="submit">Save Changes</button>
                    <a href="/profile/{{ $user->username }}">Cancel</a>
                </form>

            @else
                <p><strong>About:</strong> {{ $user->about ?? '' }}</p>
                <p><strong>Country:</strong> {{ $user->country ?? '' }}</p>
                <p><strong>Birthday:</strong> {{ $user->birthday?->format('d-m-Y') ?? '' }}</p>
                
                <p><strong>Favorite Flavors:</strong> 
                    @if(is_array($user->flavors) && count($user->flavors) > 0)
                        {{ implode(', ', $user->flavors) }}
                    @else

                    @endif
                </p>
                
                <a href="/profile/{{ $user->username }}?edit=true">Edit Profile</a>
            @endif

        @else
            <p><strong>About:</strong> {{ $user->about ?? '' }}</p>
            <p><strong>Country:</strong> {{ $user->country ?? '' }}</p>
            <p><strong>Birthday:</strong> {{ $user->birthday?->format('d-m-Y') ?? '' }}</p>
            
            <p><strong>Favorite Flavors:</strong> 
                @if(is_array($user->flavors) && count($user->flavors) > 0)
                    {{ implode(', ', $user->flavors) }}
                @else
                
                @endif
            </p>
        @endif
    </div>
@endsection