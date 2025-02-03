<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\product;
use App\Models\User;
use App\Models\transaction;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        //last order
        $lastID = Order_Detail::max('order_id');
        $order_receipt = Order_Detail::where('order_id', $lastID)->get();
        return view(
            'orders.index',
            [
                'products' => $products,
                'orders' => $orders,
                'order_receipt' => $order_receipt
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request->all();

        DB::transaction(function () use ($request) {
            //order modal
            $orders = new Order;
            $orders->name = $request->customer_name;
            $orders->address = $request->customer_number;
            $orders->save();
            $order_id = $orders->id;

            //other details modal
            for ($p_id = 0; $p_id < count($request->product_id); $p_id++) {
                $order_details = new Order_Detail();
                $order_details->order_id = $order_id;
                $order_details->product_id = $request->product_id[$p_id];
                $order_details->unitprice = $request->price[$p_id];
                $order_details->quality = $request->quantity[$p_id];
                $order_details->discount = $request->discount[$p_id];
                $order_details->amount = $request->total_amount[$p_id];
                $order_details->save();
            }
            // 'order_id','paid_amount'
            //     ,'balance','payment_method',
            //     'user_id','transaction_date','transaction_amouny'
            //transaction modal
            $total = $request->input('total');
            $transaction = new transaction();
            $transaction->order_id = $order_id;
            $transaction->user_id = 5;
            $transaction->balance = $request->balance;
            $transaction->payment_method = $request->payment_method;
            $transaction->paid_amount = $request->paid_amount;
            $transaction->transaction_amount = $request->paid_amount - $request->balance;
            $transaction->transaction_date = date('Y-m-d');
            $transaction->save();

            Cart::truncate();

            //last order history
            $products11 = Product::all();
            $order_details = Order_Detail::where('order_id', $order_id)->get();
            $orderedby = Order::where('id', $order_id)->get();

            $orderedby = Order::where('id', $order_id)->get();


            return view(
                'orders.index',
                [
                    'products' => $products11,
                    'order_details' => $order_details,
                    'customer_orders' => $orderedby

                ]
            );
        });

        return back()->with("Product orders Failed to be inserted");
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
