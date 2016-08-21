<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * @return $this
     */
    public function index(){
        $users = User::all();
        return view('admin.admin')->with('users', $users);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeRole(Request $request){
        $user = User::findOrFail($request->user_id);
        $user->role = $request->role;
        $user->update();
        return redirect()->back();
    }
}
