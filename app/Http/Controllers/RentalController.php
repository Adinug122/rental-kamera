<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rental;
use App\Models\RentalItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Random\CryptoSafeEngine;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request){



    $query = Rental::where('user_id',Auth::user()->id)
                ->with(['item.product']);
          
    $query->when($request->search,function($q) use ($request){
        return $q->where(function($subQuery) use ($request){
           $subQuery->where('kode_booking', 'LIKE', '%' . $request->search . '%')
           ->orWhereHas('item.product',function($productQuery) use ($request){
            $productQuery->where('nama_produk','LIKE','%'. $request->search . '%');
           });
        });
    });
    

    $history = $query->latest()->paginate(10)->withQueryString();

    return view('history',compact('history'));
    }



   public function success($kode) // Tangkap kodenya (String)
    {
      
        $rental = Rental::where('kode_booking', $kode)
                    ->with('item.product') 
                    ->firstOrFail();

        return view('components.success', compact('rental'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $productId = $request->query('product_id');
        $tanggal_rental = $request->query('start_date');
        $tanggal_selesai = $request->query('end_date');
      if (!$productId || !$tanggal_rental || !$tanggal_selesai) {
        return redirect()->back()->with('error', 'Data booking tidak lengkap.');
    }
        
        $product = Product::findOrFail($productId);

        $start = Carbon::parse($tanggal_rental);
        $end = Carbon::parse($tanggal_selesai);
        $days = $start->diffInDays($end);
        if ($days == 0) $days = 1;

        return view('booking', compact('product', 'tanggal_rental', 'tanggal_selesai', 'days'));
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
        'qty' => 'required|integer|min:1',
        'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'jaminan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $days = Carbon::parse($request->tanggal_rental)
            ->diffInDays($request->tanggal_selesai);
            $product = Product::findOrFail($request->product_id);
        $harga = $product->harga;
        if($product->discount && $product->discount > 0){
         $persen = min($product->discount, 100); 
        $potongan = $harga * ($persen / 100);
        $harga = $harga - $potongan;

        }
      
        $total = $harga * $days * $request->qty;

        $buktiPath = null;
        if($request->hasFile('bukti_pembayaran')){
        $buktiPath = $request->file('bukti_pembayaran')->store('payments','public');
        }

        $jaminan = null;
        if($request->hasFile('jaminan')){
            $jaminan = $request->file('jaminan')->store('jaminan','public');
        }

        $rental = Rental::create([
             'user_id' => $user->id,
        'kode_booking' => 'BK-' . strtoupper(Str::random(6)),
        'tanggal_rental' => $request->tanggal_rental,
        'tanggal_selesai' => $request->tanggal_selesai,
        'total_harga' => $total,
        'status_sewa' => 'pending',
        'jaminan' => $jaminan,
        'bukti_pembayaran' => $buktiPath,
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
