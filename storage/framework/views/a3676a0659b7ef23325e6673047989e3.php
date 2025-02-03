

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left;">Add User</h4>
                        <a href="#" style="float:right" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addUser">
                            <i class="fa fa-plus"></i> Add New User</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <!--<th>Phone</th>-->
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php if($user->is_admin == 1): ?> Admin
                                        <?php else: ?> Cashier

                                        <?php endif; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editUser<?php echo e($user->id); ?>" class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i>Edit
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteUser<?php echo e($user->id); ?>" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <!--modal for edit user-->
                                <div class="modal right fade" id="editUser<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel">Edit User</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <?php echo e($user->id); ?>

                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('users.update', ['user' => $user->id])); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('put'); ?>
                                                    <div class="form-group">
                                                        <label for="">Name</label><br>
                                                        <input type="text" name="name" value="<?php echo e($user->name); ?>" id=""><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">E-mail</label><br>
                                                        <input type="email" name="email" value="<?php echo e($user->email); ?>" id=""><br>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Phone</label><br>
                                                        <input type="text" name="phone" value="<?php echo e($user->name); ?>" id=""><br>
                                                    </div> -->

                                                    <div class="form-group">
                                                        <label for="">Password</label><br>
                                                        <input type="password" name="password" value="<?php echo e($user->password); ?>" id=""><br>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Confirm Password</label><br>
                                                        <input type="password" name="confirm-password" id=""><br>
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="">Role</label><br>
                                                        <select name="is_admin" id="" class="form-control"><br>
                                                            <option value="1" <?php if($user->is_admin==1): ?> selected <?php endif; ?>>Admin</option>
                                                            <option value="2" <?php if($user->is_admin==2): ?> selected <?php endif; ?>>Cashier</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-warning btn-block">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--modal for delete user-->
                                <div class="modal right fade" id="deleteUser<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel">Delete User</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <?php echo e($user->id); ?>

                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('users.destroy', ['user' => $user->id])); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <p>Are you Sure you want to Delete <?php echo e($user->name); ?> ?</p>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Search User</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal of adding new user-->

<div class="modal right fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Add User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('users.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="">Name</label><br>
                        <input type="text" name="name" id=""><br>
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label><br>
                        <input type="email" name="email" id=""><br>
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label><br>
                        <input type="text" name="phone" id=""><br>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label><br>
                        <input type="password" name="password" id=""><br>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label><br>
                        <input type="password" name="confirm-password" id=""><br>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label><br>
                        <select name="is_admin" id="" class="form-control"><br>
                            <option value="1">Admin</option>
                            <option value="2">Cashier</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Save User</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


<Style>
    .modal.right .modal-dialog {
        top: 0;
        right: 0;
        margin-right: 20vh;
    }

    .modal.fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
    }

    body {
        font-family: 'Lato';
    }

    input {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 8px;
        width: 100%;
        margin: 10px;
    }

    button {
        width: 100%;
    }
</Style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Assignments\ShopPos\resources\views/users/index.blade.php ENDPATH**/ ?>