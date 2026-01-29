<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimoni;

class TestimoniSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_user' => 'Andi Pratama',
                'isi_pesan' => 'Kameranya lengkap dan kondisi sangat bagus. Recommended!',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'nama_user' => 'Siti Rahma',
                'isi_pesan' => 'Pelayanan cepat, harga masuk akal. Bakal sewa lagi.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'nama_user' => 'Budi Santoso',
                'isi_pesan' => 'Kamera bersih, hasil foto mantap. Admin ramah.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'nama_user' => 'Dewi Lestari',
                'isi_pesan' => 'Sempat ragu, tapi ternyata aman dan terpercaya.',
                'foto' => null,
                'is_active' => false,
            ],
        ];

        foreach ($data as $item) {
            Testimoni::create($item);
        }
    }
}
