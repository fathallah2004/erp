@extends('layouts.app')

@section('title', 'Client Profile - ' . $client['name'])

@section('content')
<div class="container">
    <div class="page-header">
        <a href="{{ route('clients.index') }}" class="back-link">← Back to Clients</a>
        <h1>Client Profile</h1>
    </div>

    <div class="profile-layout">
        <div class="profile-sidebar">
            <div class="profile-card">
                <div class="profile-avatar-large">
                    {{ strtoupper(substr($client['name'], 0, 2)) }}
                </div>
                <h2>{{ $client['name'] }}</h2>
                <p class="profile-company">{{ $client['company'] }}</p>
                <span class="status-badge status-{{ strtolower($client['status']) }}">
                    {{ $client['status'] }}
                </span>
            </div>

            <div class="action-menu">
                <a href="{{ route('clients.edit', $client['id']) }}" class="action-btn">
                    <span class="icon">✏️</span>
                    Update Client Information
                </a>
                <button class="action-btn" onclick="openModal('interactionModal')">
                    <span class="icon">💬</span>
                    Submit Interaction or Feedback
                </button>
                <button class="action-btn" onclick="openModal('complaintModal')">
                    <span class="icon">⏰</span>
                    Submit Complaint or Support Request
                </button>
                <a href="{{ route('clients.insights', $client['id']) }}" class="action-btn">
                    <span class="icon">📊</span>
                    Request Client Insights
                </a>
            </div>
        </div>

        <div class="profile-content">
            <div class="info-section">
                <h3>Contact Information</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <label>Email</label>
                        <p>{{ $client['email'] }}</p>
                    </div>
                    <div class="info-item">
                        <label>Phone</label>
                        <p>{{ $client['phone'] }}</p>
                    </div>
                    <div class="info-item">
                        <label>Address</label>
                        <p>{{ $client['address'] }}</p>
                    </div>
                    <div class="info-item">
                        <label>Client Since</label>
                        <p>{{ $client['created_at'] }}</p>
                    </div>
                </div>
            </div>

            <div class="info-section">
                <h3>Statistics</h3>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-value">{{ $client['total_orders'] }}</div>
                        <div class="stat-label">Total Orders</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">${{ number_format($client['total_revenue']) }}</div>
                        <div class="stat-label">Total Revenue</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">{{ $client['last_interaction'] }}</div>
                        <div class="stat-label">Last Interaction</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Interaction/Feedback Modal -->
<div id="interactionModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Submit Interaction or Feedback</h2>
            <span class="close" onclick="closeModal('interactionModal')">&times;</span>
        </div>
        <form action="{{ route('clients.interaction', $client['id']) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="interaction_type">Type *</label>
                <select name="type" id="interaction_type" required>
                    <option value="">Select Type</option>
                    <option value="Interaction">Interaction</option>
                    <option value="Feedback">Feedback</option>
                </select>
            </div>
            <div class="form-group">
                <label for="interaction_subject">Subject *</label>
                <input type="text" name="subject" id="interaction_subject" required>
            </div>
            <div class="form-group">
                <label for="interaction_date">Date *</label>
                <input type="date" name="date" id="interaction_date" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="interaction_message">Message *</label>
                <textarea name="message" id="interaction_message" rows="5" required></textarea>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeModal('interactionModal')">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- Complaint/Support Request Modal -->
<div id="complaintModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Submit Complaint or Support Request</h2>
            <span class="close" onclick="closeModal('complaintModal')">&times;</span>
        </div>
        <form action="{{ route('clients.complaint', $client['id']) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="complaint_type">Type *</label>
                <select name="type" id="complaint_type" required>
                    <option value="">Select Type</option>
                    <option value="Complaint">Complaint</option>
                    <option value="Support Request">Support Request</option>
                </select>
            </div>
            <div class="form-group">
                <label for="complaint_priority">Priority *</label>
                <select name="priority" id="complaint_priority" required>
                    <option value="">Select Priority</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                    <option value="Urgent">Urgent</option>
                </select>
            </div>
            <div class="form-group">
                <label for="complaint_subject">Subject *</label>
                <input type="text" name="subject" id="complaint_subject" required>
            </div>
            <div class="form-group">
                <label for="complaint_date">Date *</label>
                <input type="date" name="date" id="complaint_date" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="complaint_description">Description *</label>
                <textarea name="description" id="complaint_description" rows="5" required></textarea>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeModal('complaintModal')">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
}
</script>
@endpush

