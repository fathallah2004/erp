

<?php $__env->startSection('title', 'Clients List'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-header">
        <h1>Clients Management</h1>
        <p class="subtitle">Manage your client relationships</p>
    </div>

    <div class="clients-grid">
        <?php $__empty_1 = true; $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="client-card">
                <div class="client-card-header">
                    <div class="client-avatar">
                        <?php echo e(strtoupper(substr($client['name'], 0, 2))); ?>

                    </div>
                    <div class="client-info">
                        <h3><?php echo e($client['name']); ?></h3>
                        <p class="client-company"><?php echo e($client['company']); ?></p>
                    </div>
                    <span class="status-badge status-<?php echo e(strtolower($client['status'])); ?>">
                        <?php echo e($client['status']); ?>

                    </span>
                </div>
                <div class="client-card-body">
                    <div class="client-detail">
                        <i class="icon">📧</i>
                        <span><?php echo e($client['email']); ?></span>
                    </div>
                    <div class="client-detail">
                        <i class="icon">📞</i>
                        <span><?php echo e($client['phone']); ?></span>
                    </div>
                    <div class="client-detail">
                        <i class="icon">📅</i>
                        <span>Joined: <?php echo e($client['created_at']); ?></span>
                    </div>
                </div>
                <div class="client-card-footer">
                    <a href="<?php echo e(route('clients.show', $client['id'])); ?>" class="btn btn-primary">
                        View Profile
                    </a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="empty-state">
                <p>No clients found.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fatha\OneDrive\Desktop\erp\resources\views/clients/index.blade.php ENDPATH**/ ?>