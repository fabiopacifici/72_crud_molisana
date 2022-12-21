<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderByDesc('id')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //dd($request->all());
        //dd($request['title']);

        //TODO: validata all request data

        // Save all data
        $product = new Product();
        $product->title = $request['title'];
        $product->src = $request['src'];
        $product->description = $request['description'];
        $product->weight = $request['weight'];
        $product->type = $request['type'];
        $product->cooking_time = $request['cooking_time'];
        $product->save();

        // redirect to a get route!?
        // return redirect()->route('products.index');
        return to_route('products.index')->with('message', "$product->title added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //dd($request->all(), $product);
        $data = [
            'title' => $request['title'],
            'src' => $request['src'],
            'description' => $request['description'],
            'type' => $request['type'],
            'weight' => $request['weight'],
            'cooking_time' => $request['cooking_time'],

        ];

        $product->update($data);

        // return redirect()->route('products.index');
        return to_route('products.index')->with('message', "$product->title update successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        // return redirect()->route('products.index');
        return to_route('products.index')->with('message', "$product->title deleted successfully");
    }
}
