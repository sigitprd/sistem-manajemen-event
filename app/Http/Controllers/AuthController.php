<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\E_organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::user()){
            return redirect('/index');
        } else{
            return view('auth.login');
        }
    }

    public function signup()
    {
        if(Auth::user()){
            return redirect('/index');
        } else{
            return view('auth.signup');
        }
    } 

    public function signupEo()
    {
        if(Auth::user())
        {
            // dd(auth()->user()->id);
            if(Auth::user()->role == "eo"){
                return redirect()->route('indexEo');
            }
            elseif(auth()->user()->role == "user"){
                $eo = \DB::table('e_organizers')->select('*')->where('user_id', auth()->user()->id)->whereNull('deleted_at')->first();
                // dd($eo);
                return view('auth.signupeo', compact('eo'));
            }
            return abort(404);
            
        }

        return view('auth.signupeo');
    }

    public function submitResponse()
    {
        return view('auth.submit_response');
    }
    
    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password')))
        {
            if(Auth::user()->role == "superadmin")
            {
                return redirect()->route('admin_index');
            }
            return redirect()->route('indexUser');
            // if(Route::current()->getname() == 'login'){
            //     return redirect()->route('indexUser');
            // }
            // return redirect()->back();
        }
        return abort(404);
    }

    public function postlogineo(Request $request)
    {
        if(Auth::user())
        {
            if(Auth::user()->role == "eo")
                return redirect()->route('indexEo');
        }
        if(Auth::attempt($request->only('email', 'password')))
        {
            if(Auth::user()->role == "eo")
            {
                return redirect()->route('indexEo');
            }
            else 
            {
                return redirect()->route('indexUser');
            }
        }
        return abort(404);
    }

    public function postsignup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = "user";
        $user->avatar = "user.png";
        $user->remember_token = Str::random(60);
        $user->save();

        if(Auth::attempt($user->only('email', 'password')))
        {
            return redirect()->route('indexUser');
        }
        return redirect('/');
    }

    public function postsignupeo(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits_between:8,12|numeric',
            'identity_card_eo' => 'image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:50000',
        ]);

        if ($request->hasFile('identity_card_eo')) {
            $image = $request->file('identity_card_eo');
            $new_image = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("assets3/identity_card"), $new_image);
        }

        $eo = E_organizer::create([
                            'name_eo' => $request->name,
                            'address_eo' => $request->address,
                            'phone_number_eo' => $request->phone,
                            'identity_card_eo' => $new_image,
                            'status' => "waiting",
                            'user_id' => Auth::user()->id,
                        ]);

        User::where('id', $eo->user_id)
            ->update([
                'name' => $eo->name_eo,
                'phone_number' => $eo->phone_number_eo,
            ]);

        return redirect()->route('submit_response_eo');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
