@extends('layouts.layout')

@section('title', 'Admin - Media')

@section('content')
    <h2>Manage Movies & Series</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('media.create') }}">+ Create Media</a>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="border-bottom: 2px solid #ccc;">
                <th style="padding: 10px; text-align: left;">Title</th>
                <th style="padding: 10px; text-align: left;">Type</th>
                <th style="padding: 10px; text-align: left;">Genre</th>
                <th style="padding: 10px; text-align: left;">Date</th>
                <th style="padding: 10px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($media as $item)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px;">{{ $item->title }}</td>
                    <td style="padding: 10px;">{{ $item->type }}</td>
                    <td style="padding: 10px;">{{ $item->genre ?? 'N/A' }}</td>
                    <td style="padding: 10px;">{{ $item->created_at->format('d-m-Y') }}</td>
                    <td style="padding: 10px;">
                        <a href="{{ route('media.edit', $item->id) }}">Edit</a> |
                        <form action="{{ route('media.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $media->links() }}
@endsection