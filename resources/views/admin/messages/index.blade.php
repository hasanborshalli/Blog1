@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Contact Messages</h1>
</div>

<div class="admin-card">
    <form method="GET" action="{{ route('admin.messages.index') }}" class="admin-search-form">
        <input type="text" name="q" value="{{ $q }}" placeholder="Search by name, email, subject, or message">
        <button type="submit" class="admin-link-btn">Search</button>
    </form>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Status</th>
                <th>Date</th>
                <th style="width: 120px;">View</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->subject ?: '—' }}</td>
                <td>{{ \Illuminate\Support\Str::limit($message->message, 80) }}</td>
                <td>
                    @if($message->is_read)
                    <span class="status-badge status-approved">Read</span>
                    @else
                    <span class="status-badge status-pending">Unread</span>
                    @endif
                </td>
                <td>{{ $message->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('admin.messages.show', $message) }}" class="table-action edit">
                        View
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No messages found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination-wrap">
        {{ $messages->links() }}
    </div>
</div>
@endsection