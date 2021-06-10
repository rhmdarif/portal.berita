<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\Image($faker));

        for($i=0;$i<=25;$i++) {
            $title = $faker->sentence(rand(5,15), true);
            $author = User::inRandomOrder()->first()->id;
            $content = $faker->paragraphs(rand(7, 15), true);

            Post::create([
                'url' => $author."-".date("Ymd")."-".str_replace(" ", '-', preg_replace("/[^A-Za-z\ ]/", '', $title)),
                'title' => $title,
                'thumbnail' => $faker->imageUrl(720, 480),
                'image' => $faker->imageUrl(1500, 1200),
                'author' => $author,
                'content' => $content,
                'sort_content' => substr($content, 0, 200),
                'category_id' => Category::inRandomOrder()->first()->id,
            ]);
        }
    }
}
