<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**Ruta principal de Vue-router */
    public function spa()
    {
        return view('pages.spa');
    }

    /**Donde accedemos a los datos para mostrar en el home, ir a Api.php para 
     * ver las rutas.
     */
    public function home()
    {   
        $data = [
            'posts' => Post::published()->paginate(3),
            'tags' => Tag::all(),
            'recentPosts' => Post::published()->get()->take(4),
        ];
        
        return $data;
    }
}
