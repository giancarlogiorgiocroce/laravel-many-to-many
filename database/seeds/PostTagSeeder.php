<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            $random_post = Post::inRandomOrder()->first();
            $random_tag_id = Tag::inRandomOrder()->first()->id;

            $random_post->tags()->attach($random_tag_id);
        }
    }
}
