<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{
    //

    public function allusers()
    {
        $users = User::all();
        return view('admin.allusers', compact('users'));
    }
}
