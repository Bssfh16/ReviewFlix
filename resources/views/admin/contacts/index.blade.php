@extends('layouts.layout')

@section('title', 'Admin - Contact Messages')

@section('content')
    <h2>Contact Messages</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="border-bottom: 2px solid #ccc;">
                <th style="padding: 10px; text-align: left;">Name</th>
                <th style="padding: 10px; text-align: left;">Email</th>
                <th style="padding: 10px; text-align: left;">Subject</th>
                <th style="padding: 10px; text-align: left;">Message</th>
                <th style="padding: 10px; text-align: left;">Date</th>
                <th style="padding: 10px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px;">{{ $contact->firstname }} {{ $contact->lastname }}</td>
                    <td style="padding: 10px;">{{ $contact->email }}</td>
                    <td style="padding: 10px;">{{ $contact->subject ?? 'N/A' }}</td>
                    <td style="padding: 10px; max-width: 300px; overflow: hidden; text-overflow: ellipsis;">{{ substr($contact->message, 0, 50) }}...</td>
                    <td style="padding: 10px;">{{ $contact->created_at->format('d-m-Y H:i') }}</td>
                    <td style="padding: 10px;">
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
@endsection