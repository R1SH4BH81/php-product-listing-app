<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();
       $limit = 20;
       for ($i=0; $i < $limit; $i++) { 
        if ($i <= 6) {
            Product::create(['name' => "Lorem ipsum dolor sit amet. Sit voluptas voluptas vel iusto autem ut voluptatibus", 'description' => "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, Lorem ipsum dolor sit amet.., comes from a line in section 1.10.32.", 'image' => "https://flowbite.com/docs/images/products/apple-watch.png",'owner_id' => 1,'price' => rand(100, 1000)]);
        } else {
            Product::create(['name' => fake()->sentence(), 'description' => fake()->paragraph(2),'image' => fake()->imageUrl(),'owner_id' => 1,'price' => rand(100, 1000)]);
        }
       }
    }
}
