<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        //
        $faker = Faker\Factory::create("id_ID");
        // $faker->addProvider(new Faker\Provider\Person($faker));

        for($i=0; $i<= 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('arif1234'),
            ]);
        }
        // $faker->addProvider(new Faker\Provider\Lorem($faker));
        // $faker->addProvider(new Faker\Provider\Internet($faker));
        */
        User::create([
            'name' => "Admin Portal",
            'email' => "admin@portal.com",
            'password' => Hash::make('admin123'),
        ]);
    }
}
