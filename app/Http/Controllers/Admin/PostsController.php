<?php

namespace App\Http\Controllers\Admin;

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
    	return view('admin.posts.index', compact('posts'));
    }

    public function create() 
    {
        $this->authorize('create', new Post);
    	$categorias = Category::all();
    	$tags = Tag::all();
    	return view('admin.posts.create', compact('categorias', 'tags'));
    }

    public function store(Request $request) 
    {
     $this->validate($request, ['title' => 'required|min:3']);
     
     $post = Post::create($request->all());

     return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post) 
    {
        $this->authorize('update', $post);

        return view('admin.posts.edit', [
            'post' => $post,
            'categorias' => Category::all(),
            'tags' => Tag::all()
        ]);
    }


    public function update(Post $post, StorePostRequest $request) 
    {
        $this->authorize('update', $post);

        $post->update($request->all());

        $post->syncTags($request->get('tags'));
        
        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación ha sido guardada.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('flash', 'La publicación ha sido eliminada.');   
    }
   
}
