<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    public function changePasswordForm()
    {
        return view('auth.changePasswordForm');
    }
    
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = \Auth::user();
        $user->password = bcrypt($request->password_new);
        $user->save();
        
        return redirect()->route('users.show', ['id' => $user->id]);
        // return redirect('users/{$user->id}');
    }
}
