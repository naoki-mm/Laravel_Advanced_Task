<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{
    public function changePasswordForm()
    {
        return view('auth.changePasswordForm');
    }
    
    public function changePassword(Request $request)
    {
        $user = \Auth::user();
        $user_current_pass = $user->password;
        
        $this->validate($request,[
            'password_current' => "required|string|same:{$user_current_pass}",
            'password_new' => 'required|string|min:6|confirmed',
            'password_new_confirmation' => 'required'
        ]);

        $user_current_pass = $request->password_new;
        $user->save();
        
        $data=[
            'user' => $user,
            'movies' => $movies,
        ];
        
        $data += $this->counts($user);

        return view('users.show',$data);
    }  
}
