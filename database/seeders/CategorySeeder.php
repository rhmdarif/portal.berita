<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            "Electronic", "Digital", "Market", "Economic", "Politic", "Crypto", "Esport", "Programming", "University"
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
