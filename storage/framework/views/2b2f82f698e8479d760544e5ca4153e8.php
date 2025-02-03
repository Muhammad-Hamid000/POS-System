<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="C:\DRIVERS\font-awesome-4.7.0\font-awesome-4.7.0\css\font-awesome.css">
    <!-- Styles -->
    

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .navbar-header {
            margin-top: 10px;
            position: relative;
            width: 100%;
        }
    </style>
</head>

<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <?php echo $__env->make('includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>


    </nav>

    <?php echo $__env->yieldContent('content'); ?>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <h4 class="card-header" style="background: #008b8b;color:#fff">
                        <marquee behavior="" direction="">POS Managment System</marquee>
                    </h4>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--sidebar section-->
    <!-- Modal -->
    <div class="modal left fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Sidebar</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $__env->make('includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <style>
                .modal.left .modal-dialog {
                    position: absolute;
                    top: 0;
                    left: 0;
                    margin: 0;
                }

                .modal.left .modal-dialog.modal-sm {
                    max-width: 300px;
                }

                .modal.left .modal-content {
                    min-height: 100vh;
                    border: 0;
                }

                h4 {
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                    font-size: 20px;
                    font-weight: bolder;
                    text-transform: uppercase;
                }
            </style>
            <!-- JavaScripts -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
            
</body>

</html><?php /**PATH C:\Assignments\ShopPos\resources\views/home.blade.php ENDPATH**/ ?>