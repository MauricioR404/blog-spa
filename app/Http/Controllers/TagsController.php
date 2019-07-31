<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $data = [
            'posts' => $tag->posts()->published()->paginate(3),
            'tags' => Tag::all(),
            'recentPosts' => Post::published()->get()->take(4)
        ];
    
        return $data;
     }
}
