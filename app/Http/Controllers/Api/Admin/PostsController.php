<?php

namespace App\Http\Controllers\Api\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
 
class PostsController extends Controller
{

	public function _construct() 
    {
        $this->middleware('auth');
    }


    public function index() 
    {

    	$posts = Post::allowed()->get();
    	return response()->json($posts);
    }

    
   
}
