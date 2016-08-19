<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Author;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    /**
     * PostsController constructor.
     */
    public function __construct()
    {


        $this->middleware(Author::class, ['except' => [
            'index',
            'show',
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        return view('home')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new \StdClass;
        return view('posts.create')->with('model', $model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $post = new Post($request->all());
        Auth::user()->posts()->save($post);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.single-post')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Post::findOrFail($id);
        return view('posts.create')->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostsRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, $id)
    {
        Post::findOrFail($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
    }
}
