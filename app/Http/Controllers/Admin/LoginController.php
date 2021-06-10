<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('pages.admin.login');
    }
    public function proccess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string'
        ]);

        if($validator->fails()) {
            return back()->with('msg', $validator->errors()->first());
        }

        $user = User::where('email', $request->email)->first();
        if(!Hash::check($request->password, $user->password)) {
           return back()->with('msg', "Wrong Password");
        }

        Auth::login($user);
        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
