<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['kecantikan', 'makanan', 'hiburan', 'kesehatan', 'berita']);
        $tags->each(function($c) {
            \App\Models\tag::create([
                'title' => $c,
                'slug' => \Str::slug($c),
            ]);
        });



        
    }
}
