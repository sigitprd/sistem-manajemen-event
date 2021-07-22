<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
  	$user = User::find(Auth::user()->id);
  	// dd($user);
    return view('myprofile', compact('user'));
  }
}
