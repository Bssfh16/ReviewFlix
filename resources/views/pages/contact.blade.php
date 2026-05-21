@extends('layouts.layout')

@section('title', 'Contact')

@section('content')
    <h2>Contact Us</h2>

    @if(session('success'))
        {{ session('success') }}
    @endif

    <form method="POST" action="/contact">
        @csrf
        
        <label>First Name:</label>
        <input type="text" name="firstname" required>
        
        <label>Last Name:</label>
        <input type="text" name="lastname" required>
        
        <label>Email:</label>
        <input type="email" name="email" required>
        
        <label>Subject:</label>
        <input type="text" name="subject">
        
        <label>Message:</label>
        <textarea name="message" required></textarea>
        
        <button type="submit">Send</button>
    </form>
@endsection