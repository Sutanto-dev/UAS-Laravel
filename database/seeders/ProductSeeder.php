<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = [
            [
                'nama' => 'Kopi',
                'status' => true,
                'stok' => 100,
                'harga' => 15000
            ],
            [
                'nama' => 'Air Mineral',
                'status' => true,
                'stok' => 200,
                'harga' => 5000
            ],
            [
                'nama' => 'Green Tea',
                'status' => true,
                'stok' => 50,
                'harga' => 8000
            ],
            [
                'nama' => 'Indomie',
                'status' => true,
                'stok' => 100,
                'harga' => 3000
            ],
            [
                'nama' => 'Mie Seedap',
                'status' => true,
                'stok' => 100,
                'harga' => 3000
            ],
            [
                'nama' => 'Kecap ABC',
                'status' => true,
                'stok' => 200,
                'harga' => 6000
            ],
            [
                'nama' => 'Rexona',
                'status' => true,
                'stok' => 150,
                'harga' => 5000
            ],
            [
                'nama' => 'Tolak Angin',
                'status' => true,
                'stok' => 80,
                'harga' => 3000
            ],
            [
                'nama' => 'Baygon',
                'status' => true,
                'stok' => 100,
                'harga' => 5000
            ],
            [
                'nama' => 'Adem Sari Ching-Ku',
                'status' => true,
                'stok' => 100,
                'harga' => 6000
            ]

        ];
		 foreach ($product as $product) {
            Product::Create([
                "nama" => $product["nama"],
                "status" => $product["status"],
                "stok" => $product["stok"],
                "harga" => $product["harga"]
            ]);
        }
    }
}
