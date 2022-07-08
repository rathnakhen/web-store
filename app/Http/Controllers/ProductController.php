<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category', 'brand')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newImageName = null;
        $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required|integer',
            'sku' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,bmp,png,svg',
            'description' => 'required|min:15'
        ]);
        if($request->file('image')){
            $file = $request->file('image');
            $newImageName = time().'-'. preg_replace('/\s+/', '-', $request->name).'.'.$request->image->extension();
            $file->move(public_path('images'), $newImageName);
        }
//        dd($newImageName);
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'sku' => $request->sku,
            'image' => $newImageName,
            'description' => $request->description,
        ]);
        return redirect()->route('products.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $newImageName = null;
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'sku' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,bmp,png,svg',
            'description' => 'required|min:15'
        ]);
        if($request->file('image')){
            $file = $request->file('image');
            $newImageName = time().'-'. preg_replace('/\s+/', '-', $request->name).'.'.$request->image->extension();
            $file->move(public_path('images'), $newImageName);
        } else {
            $newImageName = $product->image;
        }
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'sku' => $request->sku,
            'image' => $newImageName,
            'description' => $request->description,
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
//        if(Storage::delete($product->image)){
//            $product->delete();
//        }
        if($product->image){
            unlink(public_path('images').'/'.$product->image);
            $product->delete();
        } else {
            $product->delete();
        }
        return redirect()->route('products.index');
    }
}
