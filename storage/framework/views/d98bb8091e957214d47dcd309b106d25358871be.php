<?php $__env->startSection('content'); ?>

    <style>
        .container {
            max-width: 450px;
        }
        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="card push-top">
        <div class="alert alert-warning" align="center">
            <a href="<?php echo e(route('officers.index')); ?>" class="btn btn-primary btn-sm">View Officers</a>
        </div>
        <div class="card-header">
            Create New Officer
        </div>

        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div><br />
            <?php endif; ?>
            <form method="post" action="<?php echo e(route('officers.store')); ?>">

                <div class="form-group">
                    <?php echo csrf_field(); ?>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username"/>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname"/>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password"/>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm Password</label>
                    <input type="text" class="form-control" name="password_confirmation"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Officer</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/william/williamApp/resources/views/create.blade.php ENDPATH**/ ?>