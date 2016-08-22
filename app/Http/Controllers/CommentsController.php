<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentsRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param CommentsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentsRequest $request)
    {
        $comment = new Comment($request->all());
        Auth::user()->comments()->save($comment);
        return back();

    }
}
