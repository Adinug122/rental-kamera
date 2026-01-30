<?php

namespace App\Http\Controllers;

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
                    ->take(3)
                    ->get();
                    
        return view('welcome',compact('produk','testimoni'));
    }
}
