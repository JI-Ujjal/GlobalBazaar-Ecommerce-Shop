<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList(){
        $Users=User::paginate(10);
        return view('backend.pages.user.userList', compact('Users'));
    }
}
