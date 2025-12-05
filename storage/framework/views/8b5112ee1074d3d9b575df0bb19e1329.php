

<?php $__env->startSection('title', 'Client Profile - ' . $client['name']); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-header">
        <a href="<?php echo e(route('clients.index')); ?>" class="back-link">← Back to Clients</a>
        <h1>Client Profile</h1>
    </div>

    <div class="profile-layout">
        <div class="profile-sidebar">
            <div class="profile-card">
                <div class="profile-avatar-large">
                    <?php echo e(strtoupper(substr($client['name'], 0, 2))); ?>

                </div>
                <h2><?php echo e($client['name']); ?></h2>
                <p class="profile-company"><?php echo e($client['company']); ?></p>
                <span class="status-badge status-<?php echo e(strtolower($client['status'])); ?>">
                    <?php echo e($client['status']); ?>

                </span>
            </div>

            <div class="action-menu">
                <a href="<?php echo e(route('clients.edit', $client['id'])); ?>" class="action-btn">
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
                <a href="<?php echo e(route('clients.insights', $client['id'])); ?>" class="action-btn">
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
                        <p><?php echo e($client['email']); ?></p>
                    </div>
                    <div class="info-item">
                        <label>Phone</label>
                        <p><?php echo e($client['phone']); ?></p>
                    </div>
                    <div class="info-item">
                        <label>Address</label>
                        <p><?php echo e($client['address']); ?></p>
                    </div>
                    <div class="info-item">
                        <label>Client Since</label>
                        <p><?php echo e($client['created_at']); ?></p>
                    </div>
                </div>
            </div>

            <div class="info-section">
                <h3>Statistics</h3>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-value"><?php echo e($client['total_orders']); ?></div>
                        <div class="stat-label">Total Orders</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">$<?php echo e(number_format($client['total_revenue'])); ?></div>
                        <div class="stat-label">Total Revenue</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value"><?php echo e($client['last_interaction']); ?></div>
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
        <form action="<?php echo e(route('clients.interaction', $client['id'])); ?>" method="POST">
            <?php echo csrf_field(); ?>
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
                <input type="date" name="date" id="interaction_date" value="<?php echo e(date('Y-m-d')); ?>" required>
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
        <form action="<?php echo e(route('clients.complaint', $client['id'])); ?>" method="POST">
            <?php echo csrf_field(); ?>
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
                <input type="date" name="date" id="complaint_date" value="<?php echo e(date('Y-m-d')); ?>" required>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fatha\OneDrive\Desktop\erp\resources\views/clients/show.blade.php ENDPATH**/ ?>