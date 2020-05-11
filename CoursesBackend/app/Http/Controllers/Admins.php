<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admins extends Controller
{
    public function getIndex()
    {
        $users = DB::table('users')->where('isAdmin', false)->get();
        return response()->json($users,200);
    }

    public function block($id)
    {
        $user = User::find($id);
        $user->isBlocked = true;
        $user->save();
        return response()->json($user, 200);
    }
    public function unBlock($id)
    {
        $user = User::find($id);
        $user->isBlocked = false;
        $user->save();
        return response()->json($user, 200);
    }
}
