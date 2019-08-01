<?php

use Illuminate\Database\Seeder;

use App\Cat;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat::create([
            'name'=> 'business',
            'slug'=> 'business',
        ]);


        Cat::create([
            'name'=> 'computer science',
            'slug'=> 'computer-science',
        ]);


        Cat::create([
            'name'=> 'art and social sciences',
            'slug'=> 'art-and-social-sciences',
        ]);


        Cat::create([
            'name'=> 'medicine',
            'slug'=> 'medicine',
        ]);


        Cat::create([
            'name'=> 'engineering',
            'slug'=> 'engineering',
        ]);

    }
}
