<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    public  function index(){
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        return response()->json($posts);
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function search(Request $request){
        $posts = Post::search($request->search_query)['hits'];
        return response()->json($posts);
    }
}
