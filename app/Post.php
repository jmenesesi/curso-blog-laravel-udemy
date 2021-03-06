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

    protected $appends = ['published_date'];

    //protected $with = ['category','tags', 'owner', 'photos'];

    public static function create(array $attributes=[])
    {
        $attributes['user_id'] = auth()->id();
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
    	$query->with(['category','tags', 'owner', 'photos'])
            ->whereNotNull('published_at')
    		->where('published_at', '<=', Carbon::now())
    		->latest('published_at');
    }

    public function scopeAllowed($query)
    {
        if(auth()->user()->can('view', $this))
        {
            return $query;
        }

        return $query->where('user_id', auth()->id());
    }

    public function scopeByYearAndMonth($query)
    {
        return $query->selectRaw('year(published_at) year')
            ->selectRaw('monthname(published_at) monthname')
            ->selectRaw('month(published_at) month')
            ->selectRaw('count(*) posts')
            ->groupBy('year', 'monthname','month')
            ->orderBy('published_at');
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

    public function getPublishedDateAttribute()
    {
        return optional($this->published_at)->diffForHumans();   
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

    public function viewType($home = '')
    {
        if($this->photos->count() == 1)
                return 'posts.photo';
        else if($this->photos->count() > 1)
                return $home == 'home' ? 'posts.carousel-preview' : 'posts.carousel';
        else if($this->iframe) 
                return 'posts.iframe';
        return null;
    }

}
