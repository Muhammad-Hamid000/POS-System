

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left;">Add Products</h4>
                        <a href="#" style="float:right" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addproduct">
                            <i class="fa fa-plus"></i> Add New Products</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>quantity</th>
                                    <th>Alert Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($product->product_name); ?></td>
                                    <td><?php echo e($product->brand); ?></td>
                                    <td><?php echo e(number_format($product->price,2)); ?></td>
                                    <td><?php echo e($product->quantity); ?></td>
                                    <td><?php if($product->alert_stock >= $product->quantity): ?><span class="badge bg-danger"> Stock Lower Then > <?php echo e($product->alert_stock); ?></span>
                                        <?php else: ?> <span class="badge bg-success"> <?php echo e($product->alert_stock); ?></span>
                                        <?php endif; ?>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editproduct<?php echo e($product->id); ?>" class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i>Edit
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteproduct<?php echo e($product->id); ?>" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <!--modal for edit product-->
                                <div class="modal right fade" id="editproduct<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel">Edit product</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <?php echo e($product->id); ?>

                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('products.update',$product->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('put'); ?>
                                                    <div class="form-group">
                                                        <label for="">Product Name</label><br>
                                                        <input type="text" name="product_name" value="<?php echo e($product->product_name); ?>" id=""><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Brand</label><br>
                                                        <input type="text" name="brand" value="<?php echo e($product->brand); ?>" id=""><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Alert Stock</label><br>
                                                        <input type="number" name="alert_stock" value="<?php echo e($product->alert_stock); ?>" id=""><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Sell Price</label><br>
                                                        <input type="number" name="price" value="<?php echo e($product->price); ?>" id=""><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Quantity</label><br>
                                                        <input type="number" name="quantity" value="<?php echo e($product->quantity); ?>" id=""><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Description</label><br>
                                                        <textarea name="description" id="" cols="30" rows="2" class="form-control"><?php echo e($product->description); ?></textarea>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary btn-block">Update product</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--modal for delete product-->
                                <div class="modal right fade" id="deleteproduct<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel">Delete product</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <?php echo e($product->id); ?>

                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('products.destroy', ['product' => $product->id])); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <p>Are you Sure you want to Delete <?php echo e($product->product_name); ?> ?</p>
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
                        <?php echo e($products->links()); ?>



                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Search product</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal of adding new product-->

<div class="modal right fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Add product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('products.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="">Product Name</label><br>
                        <input type="text" name="product_name" id=""><br>
                    </div>
                    <div class="form-group">
                        <label for="">Brand</label><br>
                        <input type="text" name="brand" id=""><br>
                    </div>
                    <div class="form-group">
                        <label for="">Alert Stock</label><br>
                        <input type="number" name="alert_stock" id=""><br>
                    </div>
                    <div class="form-group">
                        <label for="">Sell Price</label><br>
                        <input type="number" name="price" id=""><br>
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label><br>
                        <input type="number" name="quantity" id=""><br>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label><br>
                        <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Save product</button>
                    </div>
                </form>
            </div>
        </div>

        </di>
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
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Assignments\ShopPos\resources\views/products/index.blade.php ENDPATH**/ ?>