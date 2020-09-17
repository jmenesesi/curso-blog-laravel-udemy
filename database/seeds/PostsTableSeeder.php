<?php

use App\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Storage::disk('public')->deleteDirectory('posts');
    	Post::truncate();
        $post = new Post;
        $post->title = 'Mi primer post';
        $post->url = str_slug($post->title);
        $post->excerpt = 'Mi primer post'; 
        $post->body = 'In ut labore velit officia incididunt quis anim do reprehenderit commodo reprehenderit incididunt laboris labore in quis dolore enim.';
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = 'Mi segundo post';
        $post->url = str_slug($post->title);
        $post->excerpt = 'Mi segundo post'; 
        $post->body = 'Occaecat non sint sunt elit mollit veniam in sunt reprehenderit voluptate non commodo proident dolore quis ut officia dolore cillum laborum eu fugiat dolor ullamco sint officia eu et duis adipisicing labore.';
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 2;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = 'Mi tercer post';
        $post->url = str_slug($post->title);
        $post->excerpt = 'Mi tercer post'; 
        $post->body = 'Ullamco magna dolor laborum est laborum est eu reprehenderit ut aliquip in exercitation exercitation aliquip ut ad velit aliquip qui ex do enim tempor veniam sit mollit excepteur consectetur officia in nisi magna eiusmod in non eu anim quis nisi ex tempor enim mollit incididunt consectetur enim dolor in mollit magna elit do dolore adipisicing ut enim reprehenderit excepteur anim irure qui dolore in nostrud dolore id cupidatat amet elit enim dolore duis do incididunt irure ex exercitation cillum adipisicing ex dolor sed labore voluptate aute officia voluptate proident non laboris labore cillum sed cupidatat aliqua fugiat nostrud reprehenderit ex incididunt in culpa laborum sunt voluptate dolor pariatur nisi do in aliquip tempor eiusmod reprehenderit sint aliqua qui dolor anim adipisicing ut elit cupidatat eu velit elit laboris sed eu dolore eiusmod duis.';
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 3;
        $post->user_id = 2;
        $post->save();
    }
}
