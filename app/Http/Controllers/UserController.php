<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User:: find($id);
        $data = [
            'user' => $user
        ];
        return view('user.index')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPassword(User $user)
    {
        $data = [
            'message' => '',
            'user' => $user
        ];
        return view('auth.editPassword')->with($data);
    }

    public function updatePassword(User $user, Request $request)
    {
        $this->validate( $request,[
            'oldPass' => 'required',
            'password' => 'required|confirmed',
            // 'confirmedPassword' => 'required'
            ]);
dd(Hash::make($request->password));
// $2y$10$yf/pvAg72XXX6k9L8O6TaeX2u5gn1HEVEQgznqnHCU3bm.JSA.aJO
// $2y$10$HH0qVHQE4fO.kxyyZJnXaucX5r7dwZPAPv4RUfHI.eH2PgZeCc9mm
        if (Hash::make($request->password) == $user->password) {
            User::update([
                // 'name' => $request->name,
                // 'email' => $request->email,
                'password' => Hash::make($request->password),
                // 'role_id' => $role->id,
            ]);
            // $user->password = Hash::make($request->password);
            auth()->attempt($request->only('password'));
            // $data = [
            //     'user' => $user,
            //     'message' => 'Your have changed your password.'
            // ];
            return redirect()->route('user.update',$user);
        } else {
            $data = [
                'user' => $user,
                'message' => 'Your old password is invalid.'
            ];
            return view('auth.editPassword')->with($data);
        }
        
        
        // auth()->attempt($request->only('email', 'password', 'role_id'));
            
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        // dd($user->name);
        $this->validate( $request,[
            'name' => 'required|max:50',
            'email' => 'required|email',
            // 'password' => 'required|confirmed'
            ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
