<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = [];
    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'iframe',
        'published_at',
        'category_id',
        'user_id'
    ];

    protected $dates = ['published_at'];

    public static function create(array $attributes=[])
    {
        $post = static::query()->create($attributes);

        $post->generateUrl();

        return $post;
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

    public function getRouteKeyName() 
    {
        return 'url';
    }

    public function category() {
    	return $this->belongsTo(Category::class);
    }

    public function tags() {
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

    public function scopePublished($query)
    {
    	$query->whereNotNull('published_at')
    		->where('published_at', '<=', Carbon::now())
    		->latest('published_at');
    }


    public function isPublished()
    {
        return (bool) ! is_null($this->published_at) && $this->published_at < today();
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
    }


    public function setPublishedAtAttribute($publishedAt)
    {
        $this->attributes['published_at'] = $publishedAt ? Carbon::parse($publishedAt) : null;
        
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category)  ? $category : Category::create(['name' => $category])->id; ;
    }

    public function syncTags($tags)
    {
        $tagsId = collect($tags)->map(function($tag)
        {
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id; 
        });

        return $this->tags()->sync($tagsId);
    }

    public function generateUrl()
    {
        $url = str_slug($this->title);
        
        if($this->where('url',  $url)->exists()) {
            $url.="-".$this->id; 
        }
        $this->url = $url;
        $this->save();
    }


}
