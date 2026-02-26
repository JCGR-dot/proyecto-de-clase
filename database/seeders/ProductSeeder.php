<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    
    public function run(): void
    {
        $product1 = new Product();
        $product1->name = "Televisor";
        $product1->description = "Es un Televisor";
        $product1->price = "1000";
        $product1->category_id = Category::inRandomOrder()->first()->id;

        $product1->save();

        $product2 = new Product();
        $product2->name = "Celular";
        $product2->description = "Es un Celularr";
        $product2->price = "100";
        $product2->category_id = Category::inRandomOrder()->first()->id;

        $product2->save();

        $product3 = new Product();
        $product3->name = "Tablet";
        $product3->description = "Es una Tablet";
        $product3->price = "1000";
        $product3->category_id = Category::inRandomOrder()->first()->id;

        $product3->save();

    }
}
