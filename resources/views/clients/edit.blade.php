@extends('layouts.app')

@section('title', 'Update Client Information - ' . $client['name'])

@section('content')
<div class="container">
    <div class="page-header">
        <a href="{{ route('clients.show', $client['id']) }}" class="back-link">← Back to Profile</a>
        <h1>Update Client Information</h1>
    </div>

    <div class="form-container">
        <form action="{{ route('clients.update', $client['id']) }}" method="POST" class="client-form">
            @csrf
            <div class="form-section">
                <h3>Personal Information</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $client['name']) }}" required>
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $client['email']) }}" required>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone', $client['phone']) }}" required>
                        @error('phone')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status *</label>
                        <select name="status" id="status" required>
                            <option value="Active" {{ old('status', $client['status']) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status', $client['status']) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="Pending" {{ old('status', $client['status']) == 'Pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                        @error('status')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Company Information</h3>
                <div class="form-group">
                    <label for="company">Company Name</label>
                    <input type="text" name="company" id="company" value="{{ old('company', $client['company']) }}">
                    @error('company')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" rows="3">{{ old('address', $client['address']) }}</textarea>
                    @error('address')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('clients.show', $client['id']) }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Client</button>
            </div>
        </form>
    </div>
</div>
@endsection

