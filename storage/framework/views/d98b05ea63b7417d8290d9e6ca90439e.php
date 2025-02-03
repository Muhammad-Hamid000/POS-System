

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left;">Products Barcodes</h4>
                    </div>
                    <div class="card-body">
                        <div id="print">

                            <div class="row">
                                <?php $__empty_1 = true; $__currentLoopData = $productsBarcode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barcode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-lg-3 col-md-4 col-sm-12 mt-3 text-center">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php echo $barcode->barcode; ?>

                                            <h4 class="text-center" style="padding: 1em; margin-top:2em"> <?php echo e($barcode->product_code); ?></h4>
                                        </div>
                                    </div>
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <h2> NO DATA </h2>

                                <?php endif; ?>

                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Assignments\ShopPos\resources\views/products/barcode/index.blade.php ENDPATH**/ ?>