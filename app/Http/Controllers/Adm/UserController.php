<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){

        $users = null;
        if ($request->search){
            $users = User::where('name', 'LIKE','%'.$request->search.'%')->orWhere('email', 'LIKE', '%'.$request->search.'%')
                ->with('role')->get();

        }
        else{
            $users = User::with('role')->get();
        }

        return view('adm.users', ['users' => $users]);
    }

    public function edit(User $user){
        return view('adm.editrole',['role' => Role::all(),'user' =>$user]);
    }

    public function update(Request $request, User $user){
        $user->update([
            'role_id'=>$request->role_id,

        ]);
        return redirect(route('adm.users.index'))->with('message', (__('message.Changed successfully')));
    }

    public function ban(User $user){
        $this->authorize('ban',  $user);
        $user->update([
            'is_active' => false,
        ]);
        return back();
    }

    public function unban(User $user){
        $this->authorize('unban',  $user);
        $user->update([
            'is_active' => true,
        ]);
        return back();
    }

    public function comment(){
        return view('adm.commentaries',['comments'=>Comment::all()]);
    }

    public function balance(){
        return view('product.mybalance');
    }


    public function basket(){
        $rr = Basket::where('status','ordered')->with('user','product')->get();


        return view('adm.basket',['basket' => $rr]);
    }

    public function updateBasket(Basket $basket){

        $basket->update([
            'status' => 'confirmed',
        ]);

        $pp = $basket->user->balans-($basket->product->price*$basket->amount);
        $basket->user->update([
            'balance' => $pp,
        ]);

        return back();

    }

    public function addBalance(Request $request,User $user){
        $ss = 0;
        if($user->balance != null){
            $ss = $user->balance + $request->balance;
        }else{
            $ss = $request->balance;
        }

        $user->update([
            'balance' => $ss,
        ]);

        return redirect(route('product.index'));
    }

}
