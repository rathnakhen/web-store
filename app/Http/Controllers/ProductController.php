<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
        $this->authorize('create', Product::class);
        return view('products.create',[
            'categories' => Category::with('products')->get(),
            'brands' => Brand::with('products')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Product::class);
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
            'category_id' => $request->category,
            'brand_id' => $request->brand,
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
        $this->authorize('update', $product);
        $categories = Category::with('products')->get()->pluck('name', 'id');
        $brands = Brand::with('products')->get()->pluck('name', 'id');

        return view('products.edit', compact('product','categories', 'brands'));
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
        $this->authorize('update', $product);
        $newImageName = null;
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
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
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
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
        $this->authorize('delete', $product);
        if($product->image){
            unlink(public_path('images').'/'.$product->image);
            $product->delete();
        } else {
            $product->delete();
        }
        return redirect()->route('products.index');
    }
}
