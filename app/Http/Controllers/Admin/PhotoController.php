<?php

namespace App\Http\Controllers\Admin;


use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /*
        Revisar el model Photo,
    */

    public function store(Post $post){
        $this->validate(request(), [
            'photo' => 'required|image' 
        ]); 
        
        $photo = request()->file('photo')->store('posts');

        Photo::create([
            'url' => $photo,
            'post_id' => $post->id
        ]);

    }

    public function destroy(Photo $photo){

        $photo->delete();
        return back()->with('flash', 'Foto eliminada');
    }


}
