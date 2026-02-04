<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rental;
use App\Models\RentalItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function success()
    {
        return view('components.success');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('booking');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
        'user_id' => 'required',
        'tanggal_rental' => 'required|date',
        'product_id' => 'required',
        'tanggal_selesai' => 'required|date|after:tanggal_rental',
        'qty' => 'required|integer|min:1'
        ]);


        $days = Carbon::parse($request->tanggal_rental)
            ->diffInDays($request->tanggal_selesai);
            $product = Product::findOrFail($request->product_id);
        $harga = $product->harga;
        $total = $harga * $days * $request->qty;

        $rental = Rental::create([
             'user_id' => $user->id,
        'kode_booking' => 'BK-' . strtoupper(Str::random(6)),
        'tanggal_rental' => $request->tanggal_rental,
        'tanggal_selesai' => $request->tanggal_selesai,
        'total_harga' => $total,
        'status_sewa' => 'pending'
        ]);

        RentalItem::create([
            'rental_id' => $rental->id,
            'product_id' => $product->id,
            'qty' => $request->qty,
            'subtotal' => $total
        ]);

        
    return redirect()->route('booking.success', $rental->kode_booking);
    }

   

  
    
}
