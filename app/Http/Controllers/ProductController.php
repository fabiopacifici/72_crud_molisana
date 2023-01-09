<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
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
        // Validate data
        //dd($request);
        $val_data = $request->validated();
        //dd($val_data);
        // Save all data
        $product = Product::create($val_data);
        // redirect to a get route
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
        //$val_data = $this->validation($request->all());
        $val_data = $request->validated();

        $product->update($val_data);

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

   /* Rimuovere, ora usiamo le form request
    private function validation($data)
    {
        // Validator::make($data, $rules, $message)
        $validator = Validator::make($data, [
            'title' => 'required|min:5|max:100',
            'src' => 'nullable|max:255',
            'description' => 'nullable',
            'type' => 'nullable|max:20',
            'cooking_time' => 'nullable|max:10',
            'weight' => 'nullable|max:10'
        ], [
            'title.required' => 'Il titolo é obbligatorio',
            'title.min' => 'Il titolo deve essere almeno :min caratteri',
            'title.max' => 'Il titolo deve essere almeno :max caratteri',
            'src.max' => "L'immagine puó essere massimo :max caratteri",
            'type.max' => 'Il tipo di pasta puó essere massimo :max caratteri',
            'cooking_time.max' => 'Il tempo di cottura puó essere massimo :max caratteri',
            'weight.max' => 'Il tempo di cottura puó essere massimo :max caratteri'

        ])->validate();

        return $validator;
    } */

}
