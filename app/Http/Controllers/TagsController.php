<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
    	$posts = $tag->posts()->published()->paginate(10);
    	if(request()->wantsJson()) {
        	return [
        		'title' => "Publicaciones de la etiqueta \"{$tag->name}\"",
    			'posts' => $posts
        	];
    	}
    	return view('pages.home', [
    		'title' => "Publicaciones de la etiqueta \"{$tag->name}\"",
    		'posts' => $posts
    	]);
    }
}
