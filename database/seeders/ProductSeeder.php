<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('products.products');
        foreach ($products as $product) {
            $new_product = new Product();
            $new_product->src = $product['src'];
            $new_product->title = $product['titolo'];
            $new_product->type = $product['tipo'];
            $new_product->cooking_time = $product['cottura'];
            $new_product->weight = $product['peso'];
            $new_product->description = $product['descrizione'];
            $new_product->save();
        }
    }
}
