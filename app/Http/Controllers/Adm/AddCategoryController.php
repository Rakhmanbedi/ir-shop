<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AddCategoryController extends Controller
{
    public function addcategory(){
        return view('adm.addcategory',['category' => Category::all()]);
    }

    public function addname(){
        return view('adm.addcategoryname');
    }

    public function create(){
        return view('adm.categories.create');
    }
    public function store(Request $request){
        $validated =  $request->validate([
            'name' => 'required',
            'code' => 'required',
            'name_en' => 'required',
            'name_kz' => 'required',
            'name_ru' => 'required',
        ]);

        Category::create($validated);
        return back()->with('message', (__('message.Successfully connected')));

    }
    public function delete(Category $category){
        $this->authorize('delete', $category);
        $category->delete();
        return redirect(route('adm.categories'));
    }

}
