<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rental;
use Illuminate\Http\Request;

class ProductController extends Controller
{
      public function show(Product $product)
    {
        return view('product-detail', compact('product'));
    }

   public function checkAvailability(Request $request)
    {
       
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'tanggal_rental' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_rental'
        ]);

        $product = Product::findOrFail($request->product_id);

       
        $bookedCount = Rental::join('rental_items', 'rentals.id', '=', 'rental_items.rental_id')
            ->where('rental_items.product_id', $request->product_id)
            ->whereIn('rentals.status_sewa', ['pending', 'ongoing']) 
            ->where(function ($query) use ($request) {
           
                $query->whereBetween('rentals.tanggal_rental', [$request->tanggal_rental, $request->tanggal_selesai])
                      ->orWhereBetween('rentals.tanggal_selesai', [$request->tanggal_rental, $request->tanggal_selesai])
                      ->orWhere(function($q) use($request){
                          $q->where('rentals.tanggal_rental', '<=', $request->tanggal_rental)
                            ->where('rentals.tanggal_selesai', '>=', $request->tanggal_selesai);
                      });
            })
            ->count();

        $sisaStok = $product->jumlah_unit - $bookedCount;

        return response()->json([
            'available' => $sisaStok > 0,
            'sisa_kamera' => $sisaStok
        ]);
    }
}
