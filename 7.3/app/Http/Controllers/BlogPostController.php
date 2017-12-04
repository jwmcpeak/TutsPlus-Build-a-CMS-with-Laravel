<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BlogPostController extends Controller
{
    public function index() {
        $published = Post::with('user')
                        ->where('published_at', '<', Carbon::now())
                        ->orderBy('published_at', 'desc')
                        ->paginate(15);

        return view('blog.index')->with('posts',$published);
    }

    public function view($slug) {
        $post = Post::with('user')
                    ->where([
                        ['slug','=', $slug],
                        ['published_at', '<', Carbon::now()]
                    ])
                    ->firstOrFail();
                    
        return view('blog.view')->with('post', $post);
    }
}
