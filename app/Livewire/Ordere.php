<?php

namespace App\Livewire;

use App\Models\product;
use App\Models\Cart;
use Livewire\Component;

class Ordere extends Component
{
    public $orders, $products = [], $product_code, $message = '', $productincart;

    public $paymoney, $balance = 0;

    public function mount()
    {

        $this->products = Product::all();
        $this->productincart = Cart::all();
    }
    public function inserttocart()
    {
        $countProduct = Product::where('id', $this->product_code)->first();
        if (!$countProduct) {
            return $this->message = 'Product not Found';
        }
        $countcartproduct = Cart::where('product_id', $this->product_code)->count();
        if ($countcartproduct > 0) {
            return $this->message = 'Product' . $countProduct->product_name . ' Already Exist in Cart Please add quantity';
        }
        $add_to_cart = new Cart;
        $add_to_cart->product_id = $countProduct->id;
        $add_to_cart->product_qty = 1;
        $add_to_cart->product_price = $countProduct->price;
        $add_to_cart->user_id = '1'; //we will handle it later
        $add_to_cart->save();

        $this->productincart->prepend($add_to_cart);

        $this->product_code = ' ';
        return $this->message = 'Product Added Successfully';
        // dd($countProduct);
    }
    public function IncrementQty($cartid)
    {
        $carts = Cart::find($cartid);
        $carts->increment('product_qty', 1);
        $updateprice = $carts->product_qty * $carts->product->price;
        $carts->update(['product_price' => $updateprice]);
        $this->mount();
    }
    public function DecrementQty($cartid)
    {
        $carts = Cart::find($cartid);
        if ($carts->product_qty == 1) {
            return session()->flash('info', 'Quantity of Product ' . $carts->product->product_name . '  cannot be 0 Remove Product');
        }
        $carts->decrement('product_qty', 1);
        $updateprice = $carts->product_qty * $carts->product->price;
        $carts->update(['product_price' => $updateprice]);
        $this->mount();
    }

    public function removeproduct($cartid)
    {
        $deletecart = Cart::find($cartid);
        $deletecart->delete();

        $this->message = "Product Removed from Cart";

        $this->productincart = $this->productincart->except($cartid);
        $this->mount();
    }
    public function render()
    {
        if ($this->paymoney != '') {
            $totalAmount = $this->productincart->sum('product_price');
            $this->balance = $totalAmount;
        }
        return view('livewire.ordere');
    }
}
