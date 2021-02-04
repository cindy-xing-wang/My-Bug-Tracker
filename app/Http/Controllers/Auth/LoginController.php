<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if( !auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('projects');
    }

    // public function redirectToProvider($website)
    // {
    //     return Socialite::driver($website)->redirect();
    // }
    
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // public function handleProviderCallback($website)
    // {
    //     $user = Socialite::driver($website)->user();
    //     return $user->getName();
    // }
    
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        // dd('a');
        return redirect()->route('projects');
    }

    public function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        $role = Role::where('type', 'Developer')->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->avatar = $data->avatar;
            $user->role_id = $role->id;
            $user->save();
        }

        Auth::login($user);
    }
}
