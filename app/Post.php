<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

    public function category(){
        return $this->belongsTo('App\Category');
    }

    protected $fillable=[
        "title",
        "slug",
        "category_id",
        "content",
    ];

    public static function generateSlug($title){
        $slug = Str::slug($title, '-');
        $standard_slug = $slug;
        $i = 0;

        // Verifico che lo slug non sia già presente
        $is_already_present = Post::where('slug', $slug)->first();

        // Genero un altro slug
        while($is_already_present){
            $slug = $standard_slug . '-' . $i;
            $i++;
            $is_already_present = Post::where('slug', $slug)->first();
        }

        return $slug;
    }
}
