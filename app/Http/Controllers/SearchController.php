<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function search(Request $request){

        $posts = Post::search($request->search_query)['hits'];

        return view('search.search_result')->with('posts', $posts);
    }
}
