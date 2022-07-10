<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'trader'])->except('show');
    }

    public function index(){
        $products = auth()->user()->product()->latest()->get();
        return view('products.index', ['products' => $products]);
    }

    public function create(){
        $productTypes = auth()->user()->productType->sortDesc();
        $discounts = auth()->user()->discount->sortDesc();
        return view('products.create', ['discounts' => $discounts, 'productTypes' => $productTypes]);
    }

    public function store(ProductRequest $request){
        //$request->image->store('uploads', 'public');
        $product = Product::create([
            'name' => $request->name,
            'product_type_id' => $request->product_type_id,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'minimum' => $request->minimum,
            'maximum' => $request->maximum,
            'allergy_info' => $request->allergy_info,
            'image' => $request->image->move('uploads', 'public'),
            'status' => 1
        ]);
        $product->discount()->attach($request->discount_id);
        return redirect()->route('products.index')->with('message', alert('Product Created Successfully', 'primary'));
    }

    public function show($id){
        $product = Product::where('status', 0)->findOrFail($id);
        $similarProducts =  $product->productType->shop->user->product()->where('id','<>',$id)->limit(5)->get()->sortByDesc(function($value) use($product){
            return $value['product_type_id'] == $product->product_type_id;
        })->values();
        return view('products.show', compact('product', 'similarProducts'));
    }

    public function edit($id){
        $product = auth()->user()->product()->findOrFail($id);
        $productTypes = auth()->user()->productType->sortDesc();
        $discounts = auth()->user()->discount->sortDesc();
        return view('products.edit', ['product' => $product, 'discounts' => $discounts, 'productTypes' => $productTypes]);
    }

    public function update(UpdateProductRequest $request, $id){
        $product = auth()->user()->product()->findOrFail($id);
        $product->name = $request->name;
        $product->product_type_id = $request->product_type_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->minimum = $request->minimum;
        $product->maximum = $request->maximum;
        $product->allergy_info = $request->allergy_info;
        $product->status = 1;
    
        if($request->hasFile('image')){

            Storage::delete('public/' . $product->image);
             
          $product->image = $request->image->storeAs('uploads', 'public');
        }
        
        $product->update();
        
        $product->discount()->sync($request->discount_id);
        return redirect()->route('products.index')->with('message', alert('Product Updated Successfully', 'primary'));
    }

    public function destroy($id){
        auth()->user()->product()->findOrFail($id)->delete();
        return redirect()->route('products.index')->with('message', alert('Product Deleted Successfully', 'primary'));
    }
}
