<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products = null;
        if ($request->search){
            $products = Product::where('name', 'LIKE','%'.$request->search.'%')
                ->get();
        }
        else{
            $products = Product::all();
        }
        return view('product.index',['products'=>$products,'categories'=>Category::all()]);
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
            'url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id'=> 'required|numeric|exists:categories,id',
            'size' => 'required',
            'name_en' => 'required|max:255',
            'name_kz' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'img_1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'img_2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'img_3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',

        ]);
        $fileName = time().$request->file('url')->getClientOriginalName();

        $image_path = $request->file('url')->storeAs('products', $fileName, 'public');
        $validated['url'] = '/storage/'.$image_path;

        $fileName = time().$request->file('img_1')->getClientOriginalName();

        $image_path = $request->file('img_1')->storeAs('products', $fileName, 'public');
        $validated['img_1'] = '/storage/'.$image_path;

        $fileName = time().$request->file('img_2')->getClientOriginalName();

        $image_path = $request->file('img_2')->storeAs('products', $fileName, 'public');
        $validated['img_2'] = '/storage/'.$image_path;

        $fileName = time().$request->file('img_3')->getClientOriginalName();

        $image_path = $request->file('img_3')->storeAs('products', $fileName, 'public');
        $validated['img_3'] = '/storage/'.$image_path;
//       Product::create($validated + ['user_id' => Auth::user()->id]);
//        Auth::user()->products()->create($validated);
       Product::create($validated);
        return redirect(route('product.index'))->with('message', (__('message.Submitted successfully')));
    }


    public function show(Product $product)
    {
        $myRating = 0;
        if (Auth::check()){
            $productRated = Auth::user()->productsRated()->where('product_id', $product->id)->first();
            if($productRated != null)
                $myRating = $productRated->pivot->rating;
        }
        $avgRating =0;
        $sum=0;
        $ratedUsers = $product->usersRated()->get();
        foreach ($ratedUsers as $ru){
            $sum += $ru->pivot->rating;
        }
        if (count($ratedUsers) > 0)
            $avgRating = $sum/count($ratedUsers);
        return view('product.productshow',['products'=>$product, 'comment'=>Comment::all(), 'avgRating' => $avgRating,'myRating' =>$myRating]);

    }


    public function edit(Product $product)
    {
        $this->authorize('edit', $product);
        return view('product.edit', ['product'=>$product,'categories'=>Category::all()]);
    }


    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required|max:255',
            'url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id'=> 'required|numeric|exists:categories,id',
            'size' => 'required',
            'name_en' => 'required|max:255',
            'name_kz' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'img_1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'img_2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'img_3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',

        ]);


        if ($request->url != null || $request->img_1  != null || $request->img_2  != null || $request->img_3  != null){
            $fileName = time().$request->file('url')->getClientOriginalName();
            $file1 = time().$request->file('img_1')->getClientOriginalName();
            $file2 = time().$request->file('img_2')->getClientOriginalName();
            $file3 = time().$request->file('img_3')->getClientOriginalName();


            $image_path = $request->file('url')->storeAs('products', $fileName, 'public');
            $img_1 = $request->file('img_1')->storeAs('products', $file1, 'public');
            $img_2 = $request->file('img_2')->storeAs('products', $file2, 'public');
            $img_3 = $request->file('img_3')->storeAs('products', $file3, 'public');


            $product->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'category_id' => $request->category_id,
                'url' => '/storage/'.$image_path,
                'img_1' => '/storage/' .$img_1,
                'img_2' => '/storage/' .$img_2,
                'img_3' => '/storage/' .$img_3,
                'price' => $request->price,
                'size' => $request->size
            ]);
        }else{
            $product->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'size' => $request->size
            ]);
        }
        return redirect(route('product.index'))->with('message', (__('message.Changed successfully')));
    }




    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return redirect(route('product.index'))->withErrors(__('message.destroy'));
    }

    public function productsByCategory(Category $category){
        $products= $category->products;
        return view('product.index', ['products' => $products, 'categories'=>Category::all()]);
    }

    public function rate(Request $request, Product $product){
        $request->validate([
            'rate' => 'required|min:1|max:5'
        ]);
        $productsRated = Auth::user()->productsRated()->where('product_id',$product->id)->first();
        if ($productsRated != null){
            Auth::user()->productsRated()->updateExistingPivot($product->id, ['rating' => $request->input('rate')]);
        }else{
            Auth::user()->productsRated()->attach($product->id, ['rating' => $request->input('rate')]);
        }

        return back();
    }
    public function unrate(Product $product){
        $productsRated = Auth::user()->productsRated()->where('product_id', $product->id)->get();
        if ($productsRated != null){
            Auth::user()->productsRated()->detach($product->id);
        }
        return back();
    }

    public function basketAll(Request $request, Product $product){
       $request->validate([
          'color' => 'required',
          'size' => 'required',
           'amount' => 'required|min:1|max:100|numeric'

       ]);
//        dd($product);
       Auth::user()->basketProduct()->attach($product->id,['color' => $request->input('color'),'size' => $request->input('size'),'amount' => $request->input('amount')]);
       return back()->with('message', (__('message.Added to basket')));
    }

    public function unbasketAll(Product $product){
        $basketProduct = Auth::user()->basketProduct()->where('product_id', $product->id)->get();
        if ($basketProduct != null) {
            Auth::user()->basketProduct()->detach($product->id);
        }
        return back()->withErrors((__('message.Removed from basket')));
    }

    public function basket(){
        $productAll = Basket::where('status','in_cart')->with('user','product')->get();

        return view('product.basket',['products' => $productAll]);
    }

    public function editbasket(Basket $basket){
        $basket->update([
            'status'=> 'ordered',
        ]);

        return back();
    }
    public function profile(){
        return view('product.profile');
    }
    public function about(Product $product){
        return view('product.about',['products'=>$product]);
    }


}
