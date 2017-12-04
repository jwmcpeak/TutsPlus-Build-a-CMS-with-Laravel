<?php

namespace App\Http\Controllers\Admin;

use Auth;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;


class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isAdminOrEditor()) {
            $posts = Post::paginate(5);
        } else {
            $posts = Auth::user()->posts()->pageinate(5);
        }

        return view('admin.blog.index', ['model' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create')->with('model', new Post());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        Auth::user()->posts()->save(
            new Post($request->only(['title','slug',
            'published_at','excerpt','body']))
        );

        return redirect()->route('blog.index')->with('status', 'The post was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $blog)
    {
        return view('admin.blog.edit')->with('model', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Post $blog)
    {
        if (Auth::user()->cant('update', $blog)) {
            return redirect()->route('blog.index')->with('status', 'You do not have permission to edit that post.');
        }

        $blog->fill($request->only(['title','slug',
            'published_at','excerpt','body']))->save();

        return redirect()->route('blog.index')->with('status', 'The post was updated.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {
        if (Auth::user()->cant('delete', $blog)) {
            return redirect()->route('blog.index')->with('status', 'You do not have permission to delete that post.');
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('status', 'The post was deleted.');
        
    }
}
