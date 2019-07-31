<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Revisar el modelo Post para mas informacion.
     */
    public function show(Post $post)
    {
        if ($post->isPublished() || auth()->check()) {
        
            $data = [
                'post' => $post->load('photos', 'tags'),
                'tags' => Tag::all(),
                'recentPosts' => Post::published()->get()->take(4),
            ];
            
            return $data;
        }
    }
}
