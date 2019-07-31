<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'excerpt', 'published_at', 'category_id', 'user_id',
    ];

    /**Hacer al formato de carbon*/
    protected $dates = ['published_at'];

    /** Devolver la fecha en formato que necesitados, creamos un accesor */
    protected $appends = ['created_date'];

    /**
     * Relaciones
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Mandamos un objecto de tipo Post para buscar, entonces para tener la url 
     * amigable en el navegador buscamos por la URL 
     * "www.pagina.com/posts/Mi-post-uno" 
     * en vez de esto
     * "www.pagina.com/posts/2"
     */
    public function getRouteKeyName()
    {
        return 'url';
    }

    /*
    * Sobrescribir el metodo create que viene por defecto para que
    * la url sea unica y no se repita.
    */
    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();
        $post = static::query()->create($attributes);
        $post->generarUrl();
        
        return $post;
    }

    public function generarUrl()
    {
        $url = str_slug($this->title);

        if($this::where('url', $url)->exists())
        {
            $url = "{$url}-{$this->id}";
        }
        
        $this->url = $url;
        $this->save();
    }

    /**
     * Al momento de eliminar el post, debemos hacerlo con sus relaciones
     * de etiquetas y fotos, con esta funcion lo hacemos de manera automatica.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

    /**
     * Query Scope.
     */
    public function scopePublished($query)
    {
        $query->with(['category', 'tags', 'owner', 'photos'])
                    ->WhereNotNull('created_at')
                    ->where('created_at', '<=', Carbon::now())
                    ->latest('created_at');
    }

    public function scopeAllowed($query)
    {
        if(auth()->user()->can('view', $this))
        {
            return $query;
        }
        return $query->where('user_id', auth()->id());
    }

    /**
     * Revisamos la fecha y el dia de la publicacion
     * Si tiene una fecha quiere decir que es publico el post, de lo contrario no se mostrara a los usuarios.
     * Si la fecha de la publicacion es menor que la fecha actual, quiere decir que el post es programado.
     */
    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today();
    }

    //Accesores y mutadores

    public function getCreatedDateAttribute()
    {
        return optional($this->created_at)->format('M d, Y');
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category) ? $category : Category::create(['name' => $category])->id;
    }

    public function syncTags($tag)
    {
        $tagsIds = collect($tag)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagsIds);
    }


}
