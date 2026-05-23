@extends('layouts.layout')

@section('title', 'Create FAQ Category')

@section('content')
    <h2>Create FAQ Category</h2>

    <form method="POST" action="{{ route('faq.category-store') }}">
        @csrf

        <label>Category Subject:</label>
        <input type="text" name="subject" required>
        @error('subject') <p style="color: red;">{{ $message }}</p> @enderror

        <button type="submit">Create</button>
    </form>
@endsection