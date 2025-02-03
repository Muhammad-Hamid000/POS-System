<div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h4 style="float: left;">Order Products</h4>
                        <a href="#" style="float:right" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addproduct">
                            <i class="fa fa-plus"></i> Add New Products</a>
                    </div>
                    <!-- 
                    <form action="{{ route('orders.store') }}" method="post">
                        @csrf -->
                    <div class="card-body">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @elseif(session()->has('info'))
                        <div class="alert alert-info">
                            {{ session('info') }}
                        </div>
                        @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif


                        <div class="no">
                            <form wire:submit.prevent="inserttocart">
                                <input type="text" name="" wire:model="product_code" id="" class="form-control" placeholder="Enter Product Code here.....">
                            </form>
                        </div>
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th colspan="6">Total</th>
                                    <!-- <th><a href="#" class="btn btn-sm btn-success add_more"><i class="fa fa-plus"></i></a></th> -->
                                </tr>
                            </thead>
                            <tbody class="addMoreProduct">
                                @foreach($productincart as $cart)
                                <tr>
                                    <td class="no">{{ $loop->iteration }}</td>
                                    <td width="30%">
                                        <input type="text" value="{{ $cart->product->product_name }}" class="form-control" style="width: 90%;">
                                    </td>
                                    <td>
                                        <div class="row" style="padding-top:15px">
                                            <div class="col-md-4">
                                                <button wire:click.prevent="IncrementQty({{ $cart->id }})" class="btn btn-sm btn-success" style="text-align:left; display:flex;align-items: center;justify-content: center;">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="">{{ $cart->product_qty }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                <button wire:click.prevent="DecrementQty({{ $cart->id }})" class="btn btn-sm btn-danger" style="text-align:left; display:flex;align-items: center;justify-content: center;">
                                                    <i class="fa fa-minus"></i>
                                            </div>

                                        </div>
                                        <!-- <input type="number"
                                            value="{{ $cart->product_qty }}"
                                            name="quantity[]"
                                            id="quantity"
                                            class="form-control quantity"
                                            style="width: 90%;"> -->
                                    </td>

                                    <td>
                                        <input type="number" value="{{ $cart->product->price }}" class="form-control price" style="width: 90%;">
                                    </td>

                                    <td>
                                        <input type="number" class="form-control discount" style="width: 90%;">
                                    </td>

                                    <td>
                                        <input type="number" value="{{  $cart->product_qty * $cart->product->price }}" class="form-control total_amount" style="width: 90%;">
                                    </td>
                                    <td><a href="#" class="btn btn-sm btn-danger">
                                            <i class="fa fa-times" wire:click.prevent="removeproduct({{ $cart->id }})"></i>
                                        </a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Total <b class="total">{{ $productincart->sum('product_price') }}</b></h4>
                        <input type="hidden" name="total" id="totalInput" value="">
                    </div>
                    <form action="{{ route('orders.store') }}" method="post">
                        @csrf
                        @foreach($productincart as $cart)
                        <input type="hidden" value="{{ $cart->product->id }}" name="product_id[]" class="form-control" style="width: 90%;">
                        <input type="hidden" name="quantity[]" value="{{ $cart->product_qty }}">
                        <input type="hidden" value="{{ $cart->product->price }}" name="price[]" class="form-control price" style="width: 90%;">
                        <input type="hidden" name="discount[]" id="discount" class="form-control discount" style="width: 90%;">
                        <input type="hidden" value="{{  $cart->product_qty * $cart->product->price }}" name="total_amount[]" class="form-control total_amount" style="width: 90%;">
                        @endforeach


                        <div class="card-body">
                            <div class="btn-group" style="width: 90%;">
                                <button type="button" onclick="printreceiptcontent('print')" class="btn btn-dark" style="width: 30%;">
                                    <i class="fa fa-print"></i> Print
                                </button>
                                <button type="button" onclick="printreceiptcontent('print')" class="btn btn-primary" style="width: 30%;">
                                    <i class="fa fa-print"></i> History
                                </button>
                                <button type="button" onclick="printreceiptcontent('print')" class="btn btn-danger" style="width: 30%;">
                                    <i class="fa fa-print"></i> Report
                                </button>
                            </div>
                            <div class="panel">
                                <div class="row">
                                    <table class="table table-stripped">
                                        <tr>
                                            <td>
                                                <label for="">Customer Name</label>

                                                <input type="text" name="customer_name">

                                            </td>
                                            <td>
                                                <label for="">Customer Phone</label>

                                                <input type="text" name="customer_number">

                                            </td>
                                        </tr>
                                    </table>
                                    <td>
                                        Payment Method <br>
                                        <span class="radio-item">
                                            <input type="radio" name="payment_method" id="payment_method" class="true" value="cash" checked="checked">
                                            <label for="payment_method"><i class="fa fa-money text-success"></i> Cash</label>

                                            <input type="radio" name="payment_method" id="payment_method" class="true" value="bank transfer">
                                            <label for="payment_method"><i class="fa fa-bank text-success"></i> Bank Transfer</label>

                                            <input type="radio" name="payment_method" id="payment_method" class="true" value="Credit Card">
                                            <label for="payment_method"><i class="fa fa-credit-card text-success"></i> Credit Card</label>

                                        </span>
                                    </td><br>

                                    <td>Payment <input wire:model="paymoney" type="number" name="paid_amount" id="paid_amount" class="form-control" style="width: 90%;"></td>
                                    <td>Returning Change <input wire:model="balance" type="number" readonly name="balance" id="balance" class="form-control" style="width: 90%;"></td>
                                    <td>
                                        <button style="background-color:rgb(44, 125, 192);color:#fff;height:40px;" class="btn-primary btn-lg btn-block mt-5">Save</button>
                                    </td>
                                    <td>
                                        <button style="background-color:rgb(180, 40, 36);color:#fff;height:40px;" class="btn-danger btn-lg btn-block mt-2">Calculator</button>
                                    </td>
                                    <td>
                                        <a href="#" class="text-danger" style="text-align: center;"><i class="fa fa-sign-out"></i> Logout</a>
                                    </td>
                                </div>
                            </div>
                        </div>
                    </form>
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

        </div>
    </div>
</div>