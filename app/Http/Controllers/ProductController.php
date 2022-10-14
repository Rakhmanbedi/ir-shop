<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index()
    {
        return view('product.index',['products'=>Product::all(),'categories'=>Category::all()]);
    }


    public function create()
    {
        return view('product.create',['categories'=>Category::all()]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'url' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id'=> 'required|numeric|exists:categories,id',
            'size' => 'required'

        ]);

        Product::create($validated);
        return redirect(route('product.index'))->with('message', 'Submitted successfully');
    }


    public function show(Product $product)
    {
        return view('product.productshow',['products'=>$product]);

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'));
    }

    public function productsByCategory(Category $category){
        $products= $category->products;
        return view('product.index', ['products' => $products, 'categories'=>Category::all()]);
    }

}
