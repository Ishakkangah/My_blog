<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catagories = collect(['Kecantikan', 'Sejarah', 'Makanan', 'Kesehatan', 'Olahraga', 'Cerita']);
        $catagories->each(function($c) {
            \App\Models\category::create([
                'title' => $c,
                'slug' => \Str::slug($c),
            ]);
        });
    }
}
