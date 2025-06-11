<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Users List</h2>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <a href="<?php echo e(route('dataevent.create')); ?>" class="btn btn-primary mb-3">Add New User</a>

    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($event->user_id); ?></td>
                    <td><?php echo e($event->name); ?></td>
                    <td><?php echo e($event->email); ?></td>
                    <td><?php echo e($event->role); ?></td>
                    <td>
                        
                        <a href="<?php echo e(route('dataevent.edit', $event->user_id)); ?>" class="btn btn-sm btn-warning">Edit</a>

                        
                        <form action="<?php echo e(route('dataevent.destroy', $event->user_id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($events->isEmpty()): ?>
                <tr>
                    <td colspan="5" class="text-center">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hp\Desktop\930-grp3-repo\laravel1pro\example-app\resources\views/event/index_event.blade.php ENDPATH**/ ?>