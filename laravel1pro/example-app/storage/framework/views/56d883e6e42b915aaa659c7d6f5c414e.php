<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>قائمة المستخدمين</h2>
    <table class="table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الإيميل</th>
                <th>الدور</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($event->name); ?></td>
                <td><?php echo e($event->email); ?></td>
                <td><?php echo e($event->role); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hp\Desktop\laravel1pro\example-app\resources\views/event/index_event.blade.php ENDPATH**/ ?>