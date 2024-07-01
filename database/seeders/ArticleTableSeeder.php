<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Consommer l'API
        $response = Http::get('https://ioayoub.fr/api/eshop');

        if ($response->successful()) {
            $products = $response->json();

            foreach ($products as $product) {
                DB::table('articles')->insert([
                    'name' => $product['name'],
                    'category' => $product['category'],
                    'featured' => $product['featured'],
                    'homepage' => $product['homepage'],
                    'rating' => $product['rating'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'picture' => $product['picture'],
                    'picture_resized' => $product['picture_resized'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        } else {
            $this->command->error('Erreur lors de la récupération des données de l\'API.');
        }


    }
}
