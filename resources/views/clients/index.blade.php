@extends('layouts.app')

@section('title', 'Clients List')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Clients Management</h1>
        <p class="subtitle">Manage your client relationships</p>
    </div>

    <div class="clients-grid">
        @forelse($clients as $client)
            <div class="client-card">
                <div class="client-card-header">
                    <div class="client-avatar">
                        {{ strtoupper(substr($client['name'], 0, 2)) }}
                    </div>
                    <div class="client-info">
                        <h3>{{ $client['name'] }}</h3>
                        <p class="client-company">{{ $client['company'] }}</p>
                    </div>
                    <span class="status-badge status-{{ strtolower($client['status']) }}">
                        {{ $client['status'] }}
                    </span>
                </div>
                <div class="client-card-body">
                    <div class="client-detail">
                        <i class="icon">📧</i>
                        <span>{{ $client['email'] }}</span>
                    </div>
                    <div class="client-detail">
                        <i class="icon">📞</i>
                        <span>{{ $client['phone'] }}</span>
                    </div>
                    <div class="client-detail">
                        <i class="icon">📅</i>
                        <span>Joined: {{ $client['created_at'] }}</span>
                    </div>
                </div>
                <div class="client-card-footer">
                    <a href="{{ route('clients.show', $client['id']) }}" class="btn btn-primary">
                        View Profile
                    </a>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <p>No clients found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

