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
        $products = [
            [
                'name' => 'Catcher In The Rye',
                'price' => 200,
                'image' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1398034300i/5107.jpg',
                'description' => 'By J. D. Salinger',
                'quantity'=>100,
                'status'=>1,
                
            ],
            [
                'name' => 'The Ballad of Reading Gaol',
                'price' => 300,
                'image' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1371918695i/1329726.jpg',
                'description' => 'By Oscar Wilde',
                'quantity'=>100,
                'status'=>1,
                
            ],
            [
                'name' => 'Salina',
                'price' => 250,
                'image' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1352265287i/1672275.jpg',
                'description' => 'By A. Samad Said',
                'quantity'=>100,
                'status'=>1,
                
            ],
        ];
        Product::insert($products);
    }
}
