<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ]);
        $fileName = time().$request->file('image')->getClientOriginalName();

        $image_path = $request->file('image')->storeAs('products', $fileName, 'public');


        $user = User::create([
            'img'=>'/storage/'.$image_path,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => Role::where('name', 'user')->first()->id
        ]);
        Auth::login($user);
        return redirect()->route('product.index');
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',

            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ]);


        if ($request->image != null){
            $fileName = time().$request->file('image')->getClientOriginalName();

            $image_path = $request->file('image')->storeAs('products', $fileName, 'public');



            $user->update([
                'img'=>'/storage/'.$image_path,
                'name' => $request->input('name'),
                'email' => $request->input('email'),

            ]);
        }else{
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),

            ]);
        }
        return back()->with('message', (__('message.Changed successfully')));
    }
}
