@extends('layouts.app')

@section('title', 'Client Insights - ' . $client['name'])

@section('content')
<div class="container">
    <div class="page-header">
        <a href="{{ route('clients.show', $client['id']) }}" class="back-link">← Back to Profile</a>
        <h1>Client Insights</h1>
        <p class="subtitle">{{ $client['name'] }} - {{ $client['company'] }}</p>
    </div>

    <div class="insights-layout">
        <div class="insights-overview">
            <div class="insight-card">
                <div class="insight-icon">💬</div>
                <div class="insight-content">
                    <div class="insight-value">{{ $insights['total_interactions'] }}</div>
                    <div class="insight-label">Total Interactions</div>
                </div>
            </div>
            <div class="insight-card">
                <div class="insight-icon">⚠️</div>
                <div class="insight-content">
                    <div class="insight-value">{{ $insights['total_complaints'] }}</div>
                    <div class="insight-label">Total Complaints</div>
                </div>
            </div>
            <div class="insight-card">
                <div class="insight-icon">🆘</div>
                <div class="insight-content">
                    <div class="insight-value">{{ $insights['total_support_requests'] }}</div>
                    <div class="insight-label">Support Requests</div>
                </div>
            </div>
            <div class="insight-card">
                <div class="insight-icon">⏱️</div>
                <div class="insight-content">
                    <div class="insight-value">{{ $insights['average_response_time'] }}</div>
                    <div class="insight-label">Avg Response Time</div>
                </div>
            </div>
            <div class="insight-card">
                <div class="insight-icon">⭐</div>
                <div class="insight-content">
                    <div class="insight-value">{{ $insights['satisfaction_score'] }}/5.0</div>
                    <div class="insight-label">Satisfaction Score</div>
                </div>
            </div>
        </div>

        <div class="insights-charts">
            <div class="chart-card">
                <h3>Revenue Trend</h3>
                <canvas id="revenueChart"></canvas>
            </div>
            <div class="chart-card">
                <h3>Interaction Trend</h3>
                <canvas id="interactionChart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Revenue Trend Chart
const revenueCtx = document.getElementById('revenueChart').getContext('2d');
const revenueData = @json($insights['revenue_trend']);

new Chart(revenueCtx, {
    type: 'line',
    data: {
        labels: Object.keys(revenueData),
        datasets: [{
            label: 'Revenue ($)',
            data: Object.values(revenueData),
            borderColor: 'rgb(75, 192, 192)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Interaction Trend Chart
const interactionCtx = document.getElementById('interactionChart').getContext('2d');
const interactionData = @json($insights['interaction_trend']);

new Chart(interactionCtx, {
    type: 'bar',
    data: {
        labels: Object.keys(interactionData),
        datasets: [{
            label: 'Interactions',
            data: Object.values(interactionData),
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>
@endpush

