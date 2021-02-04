<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate( $request,[
            'name' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|confirmed'
            ]);

        if ($request->name == 'Admin' && $request->email == 'admin@gmail.com') {
            $role = Role::where('type', 'Admin')->first();
        } else {
            $role = Role::where('type', 'Developer')->first();
        }
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role->id,
        ]);

        auth()->attempt($request->only('email', 'password', 'role_id'));
        
        return redirect()->route('projects');
    }

}
