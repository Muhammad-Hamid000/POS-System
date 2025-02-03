@extends('app')

@section('content')

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
                                @foreach($products as $key => $product)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $product->product_name}}</td>
                                    <td>{{ $product->brand}}</td>
                                    <td>{{ number_format($product->price,2)}}</td>
                                    <td>{{ $product->quantity}}</td>
                                    <td>@if ($product->alert_stock >= $product->quantity)<span class="badge bg-danger"> Stock Lower Then > {{$product->alert_stock}}</span>
                                        @else <span class="badge bg-success"> {{$product->alert_stock}}</span>
                                        @endif
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editproduct{{$product->id}}" class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i>Edit
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteproduct{{$product->id}}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <!--modal for edit product-->
                                <div class="modal right fade" id="editproduct{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel">Edit product</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                {{$product->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('products.update',$product->id) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label for="">Product Name</label><br>
                                                        <input type="text" name="product_name" value="{{$product->product_name}}" id=""><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Brand</label><br>
                                                        <input type="text" name="brand" value="{{$product->brand}}" id=""><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Alert Stock</label><br>
                                                        <input type="number" name="alert_stock" value="{{$product->alert_stock}}" id=""><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Sell Price</label><br>
                                                        <input type="number" name="price" value="{{$product->price}}" id=""><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Quantity</label><br>
                                                        <input type="number" name="quantity" value="{{$product->quantity}}" id=""><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Description</label><br>
                                                        <textarea name="description" id="" cols="30" rows="2" class="form-control">{{$product->description}}</textarea>
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
                                <div class="modal right fade" id="deleteproduct{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel">Delete product</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                {{$product->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('products.destroy', ['product' => $product->id]); }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <p>Are you Sure you want to Delete {{ $product->product_name }} ?</p>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                @endforeach

                            </tbody>
                        </table>
                        {{$products->links()}}


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
                <form action="{{ route('products.store') }}" method="post">
                    @csrf
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

    @endsection