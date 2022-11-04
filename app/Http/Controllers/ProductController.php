<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    public function index()
    {
        return view('product.index',['products'=>Product::all(),'categories'=>Category::all()]);
    }


    public function create()
    {
        $this->authorize('create', Product::class);
        return view('product.create',['categories'=>Category::all()]);
    }


    public function store(Request $request)
    {
        $this->authorize('create', Product::class);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'url' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id'=> 'required|numeric|exists:categories,id',
            'size' => 'required'

        ]);

//       Product::create($validated + ['user_id' => Auth::user()->id]);
//        Auth::user()->products()->create($validated);
       Product::create($validated);
        return redirect(route('product.index'))->with('message', 'Submitted successfully');
    }


    public function show(Product $product)
    {
        return view('product.productshow',['products'=>$product, 'comment'=>Comment::all()]);

    }


    public function edit(Product $product)
    {
        return view('product.edit', ['product'=>$product,'categories'=>Category::all()]);
    }


    public function update(Request $request, Product $product)
    {
        $product->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'category_id' => $request->category_id,
            'url' => $request->url,
            'price' => $request->price,
            'size' => $request->size
        ]);
        return redirect(route('product.index'));
    }


    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return redirect(route('product.index'));
    }

    public function productsByCategory(Category $category){
        $products= $category->products;
        return view('product.index', ['products' => $products, 'categories'=>Category::all()]);
    }

}
