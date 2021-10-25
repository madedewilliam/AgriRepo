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
        <div class="card-header">
            Edit & Update
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
            <form method="post" action="<?php echo e(route('officers.update', $officer->id)); ?>">
                <div class="form-group">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <label for="name">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo e($officer->username); ?>"/>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo e($officer->name); ?>"/>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="<?php echo e($officer->lastname); ?>"/>
                </div>
                <div class="form-group">
                    <label for="role">Last Name</label>
                    <select class="form-control" name="role">
                        <option value="<?php echo e($officer->role); ?>"><?php echo e($officer->role); ?></option>
                        <?php if($officer->role == "Admin"): ?>
                            <option value="User">User</option>
                        <?php else: ?>
                            <option value="Admin">Admin</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" value="<?php echo e($officer->password); ?>"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Update User</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/william/williamApp/resources/views/edit.blade.php ENDPATH**/ ?>