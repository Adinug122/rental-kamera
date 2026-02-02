<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $produk = Product::latest()
                    ->take(4)
                    ->get();
        $testimoni = Testimoni::where('is_active',true)
                    ->latest()
                    ->take(6)
                    ->get();
                    
        return view('welcome',compact('produk','testimoni'));
    }

    public function storeContact(Request $request){
      $validate =  $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|string',
            'pesan' => 'required|string',
        ]); 

        Comment::create($validate);

        return redirect()->to(route('landing') . '#contact')->with('success', 'Berhasil Mengirim Pesan');
    }
}
