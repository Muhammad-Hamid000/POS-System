<nav class="active" id="sidebar">
    <ul class="list-unstyle lead">
        <li>
            <a href=""><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="<?php echo e(route('transactions.index')); ?>"><i class="fa fa-money"></i>Transaction</a>
        </li>
        <li>
            <a href="<?php echo e(route('orders.index')); ?>"><i class="fa fa-archive"></i>Order</a>
        </li>
        <li>
            <a href="<?php echo e(route('products.index')); ?>"><i class="fa fa-truck"></i>Products</a>
        </li>
    </ul>
</nav>

<style>
    .list-unstyle {
        list-style: none;
        align-content: center;
    }

    #sidebar ul.lead {
        border-bottom: 2px solid #47748b;
        width: fit-content;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
        width: 30vh;
        color: #008B8B;
    }

    #sidebar ul li a:hover {
        color: #fff;
        background: #008B8B;
        text-decoration: none !important;
    }

    #sidebar ul li a i {
        margin-right: 10px;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
        color: #fff;
        background: #008B8B;
    }
</style><?php /**PATH C:\Assignments\ShopPos\resources\views/includes/sidebar.blade.php ENDPATH**/ ?>