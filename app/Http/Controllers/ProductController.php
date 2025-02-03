<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Picqer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', ['products' => $products]);
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

        //product code section
        $product_code = rand(1023401023, 10000000000);
        $redColor = '255 , 0, 0';
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML;
        $barcode = $generator->getBarcode(
            $product_code,
            $generator::TYPE_STANDARD_2_5
        );
        //Product::create($request->all());
        $products = new Product;
        $products->product_name = $request->product_name;
        $products->product_code = $product_code;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->brand = $request->brand;
        $products->description = $request->description;
        $products->alert_stock = $request->alert_stock;
        $products->barcode = $barcode;
        $products->save();

        return redirect()->back()->with('Success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product_code = rand(1023401023, 10000000000);

        $generator = new Picqer\Barcode\BarcodeGeneratorHTML;
        $barcode = $generator->getBarcode(
            $product_code,
            $generator::TYPE_STANDARD_2_5
        );
        $products = Product::find($id);

        if (!$products) {
            return redirect()->back()->with('Error', 'Product not found.');
        }
        // Product::create($request->all());
        // $products = new Product;
        $products->product_name = $request->product_name;
        $products->product_code = $product_code;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->brand = $request->brand;
        $products->description = $request->description;
        $products->alert_stock = $request->alert_stock;
        $products->barcode = $barcode;
        $products->save();
        //$product->update($request->all());

        return redirect()->back()->with('Success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();

        return redirect()->back()->with('Success', 'Product Deleted Successfully');
    }
    public function GetProductBarcodes()
    {
        $productsBarcode = Product::select('barcode', 'product_code')->get();

        return view('products.barcode.index', compact('productsBarcode'));
    }
}
