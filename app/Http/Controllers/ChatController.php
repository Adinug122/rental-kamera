<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gemini\Enums\ModelVariation;
use Gemini\GeminiHelper;
use Gemini\Laravel\Facades\Gemini;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function askAi(Request $request){
    $message = $request->input('message'); 

    $camera = Product::all(['nama_produk','harga','brands']);

$context = "DAFTAR PRODUK LENS.ID:\n";
foreach($camera as $cam){
    $context .= "- Produk: {$cam->nama_produk} | Harga: Rp " . number_format($cam->harga, 0, ',', '.') . "/hari\n";
}

$prompt = "Kamu adalah asisten Lens.id. 
           PENTING: JANGAN PERNAH gunakan tanda bintang (**) atau simbol markdown lainnya.
           Jawab dengan teks polos saja. 
           Gunakan baris baru (Enter) untuk memisahkan poin-poin.
           Contoh:
           Nama Produk: Sony ZV-E10
           Harga: Rp 100.000
           - Keunggulan 1
           - Keunggulan 2
           
           DATA PRODUK:
           $context

           TUGAS KAMU:
           1. Jawab pertanyaan user dengan gaya santai tapi TO THE POINT (Singkat & Padat).
           2. Gunakan format LIST (poin-poin) agar mudah dibaca.
           3. Gunakan BOLD (tebal) untuk nama produk dan harga.
           4. Berikan maksimal 2-3 keunggulan utama saja per produk, jangan terlalu panjang.
           5. Jika merekomendasikan, kelompokkan berdasarkan nama produk.

           Contoh Format Jawaban:
        
           Hai Bro! Buat kebutuhan vlog, gue saranin produk ini:
           
           * **Sony ZV-E10**
             - Harga: **Rp 100.000/hari**
             - Keunggulan: Fokus cepat (autofocus), layar putar, jernih buat video 4K.
           
           * **Tripod Excellence**
             - Harga: **Rp 20.000/hari**
             - Keunggulan: Kokoh & bikin video lo stabil.
         

           Pertanyaan User: $message";

                  try{
                      $result = Gemini::generativeModel(model:'gemini-2.5-flash')
                              ->generateContent($prompt);
                       
                      return response()->json([
                          'status' => 'success',
                          'reply' => $result->text()
                      ]);
                  }catch(\Exception $e){
                    if (str_contains($e->getMessage(), 'quota')) {
                return response()->json([
                    'status' => 'success',
                    'reply' => 'Sori Bro, gue lagi overwork nih (limit kuota habis). Coba tanya lagi semenit lagi ya!'
                ]);
            }

            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
                  }

    }
}
