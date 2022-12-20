<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'about' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'img' => 'required'

        ]);

        $fileName = time().$request->file('img')->getClientOriginalName();

        $image_path = $request->file('img')->storeAs('products', $fileName, 'public');
        $validated['img'] = '/storage/'.$image_path;
        Profile::create($validated);
        return back()->with('message', (__('message.Comment sent successfully')));
    }

}
