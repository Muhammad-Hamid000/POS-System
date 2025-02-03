<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
<a href="{{ route('home') }}" class="btn btn-outline rounded-pill"><i class="fa fa-home"> Home</i></a>
<a href="{{ route('users.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-user"> User</i></a>
<a href="{{ route('products.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-archive"> Product</i></a>
<a href="{{ route('orders.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-desktop"> Cashier</i></a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-file-text"> Report</i></a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-money"> Transcation</i></a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-industry"> Supplier</i></a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-users"> Customers</i></a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-truck"> Incoming</i></a>
<a href="{{ route('products.barcode') }}" class="btn btn-outline rounded-pill"><i class="fa fa-barcode"> Barcode</i></a>



<style>
    .btn-outline {
        border-color: #008b8b;
        color: #008b8b;
    }

    .btn-outline:hover {
        background-color: #008b8b;
        color: white;
    }
</style>