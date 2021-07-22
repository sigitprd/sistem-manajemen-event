<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // return redirect('/login');
        return view('/home');
    }

    public function login()
    {
        return view('login.login');
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function user()
    {
        return view('user.index');
    }
}
