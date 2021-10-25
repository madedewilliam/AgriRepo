<?php $__env->startSection('content'); ?>

    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.js"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js" defer></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.js"></script>

    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <script type="text/javascript">
        $(document).ready(function() {
            $('.officersTable').DataTable();
        });
    </script>

    <div class="push-top">
        <?php if(session()->get('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success')); ?>

            </div><br />
        <?php endif; ?>
            <div class="alert alert-warning" align="center">
                <a href="<?php echo e(route('officers.create')); ?>" class="btn btn-primary btn-sm">Add Officer</a>
            </div>
            <table class="table table-bordered officersTable">
                <thead>
                    <tr class="table-warning">
                        <td>Username</td>
                        <td>Name</td>
                        <td>Last Name</td>
                        <td>Role</td>
                        <td>Password</td>
                        <td class="text-center">Action</td>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $officer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $officers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($officers->username); ?></td>
                        <td><?php echo e($officers->name); ?></td>
                        <td><?php echo e($officers->lastname); ?></td>
                        <td><?php echo e($officers->role); ?></td>
                        <td><?php echo e($officers->password); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('officers.edit', $officers->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <?php if($officers->role != "Admin"): ?>
                                <form action="<?php echo e(route('officers.destroy', $officers->id)); ?>" method="post" style="display: inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/william/williamApp/resources/views/index.blade.php ENDPATH**/ ?>