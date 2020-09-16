<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'created_at' => now(),
            'name' => 'Uncategorized',
            'badge_color' => '#939393',
            'published' => 1
        ]);

        DB::table('category_slug')->insert([
            'category_id' => 1,
            'slug' => 'uncategorized',
            'active' => 1,
            'locale' => 'en'
        ]);
    }
}
