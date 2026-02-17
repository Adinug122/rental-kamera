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

    public function produk(Request $request){
        $query = Product::query();

        $query->when($request->search,function ($q)  use ($request){
            return $q->where('nama_produk', 'LIKE', '%' . $request->search . '%');
        });

        $query->when($request->min_price, function ($q) use ($request) {
            return $q->where('harga', '>=' . $request->min_price);
        });

        $query->when($request->max_price, function($q) use ($request){
            return $q->where('harga', '<=' . $request->max_price);
        });

        if ($request->sort == 'price_low') {
        $query->orderBy('harga', 'asc');
    } elseif ($request->sort == 'price_high') {
        $query->orderBy('harga', 'desc');
    } else {
        $query->latest(); 
    }

    $products = $query->paginate(12)->withQueryString();

    return view('produk', compact('products'));
    }

    public function store(Request $request){
      $validate =  $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|string',
            'pesan' => 'required|string',
        ]); 

        Comment::create($validate);

        return redirect()->to(route('landing') . '#contact')->with('success', 'Berhasil Mengirim Pesan');
    }
}
