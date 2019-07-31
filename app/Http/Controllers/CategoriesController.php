<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**En el curso original se busca por categorias en la pagina de archivos,
     * pero como cambie de plantilla entonces no lo pude ocupar, pero en el PostController 
     * de la administracion siempre se sigue agregando la categoria al post que se publica.
     */
    public function show(Category $category){
        return view('pages.home', [
            'title' => "Publicaciones de la categoria {$category->name}",
            'posts' => $category->posts()->published()->paginate()
        ]);
    }
}
