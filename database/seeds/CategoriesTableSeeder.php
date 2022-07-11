<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=['Dungeons&Dragons', 'Sine Reque', 'Legends of the Five Rings', 'Vulcania'];

        foreach ($data as $game) {
            $new_category = new Category();
            $new_category->name = $game;
            $new_category->slug = Str::slug($game, '-');
            $new_category->save();
        }
    }
}
