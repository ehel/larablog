<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function likeComment($id)
    {
        $this->toggleLike('App\Comment', $id);
        return redirect()->back();
    }

    public function likePost($id)
    {
        $this->toggleLike('App\Post', $id);
        return redirect()->back();
    }

    private function toggleLike($type, $id)
    {
        $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();
        if (is_null($existing_like)) {
            Like::create([
                'user_id' => Auth::id(),
                'likeable_id' => $id,
                'likeable_type' => $type,
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }
}
