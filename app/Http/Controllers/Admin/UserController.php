<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->has('search')) {
            $users = User::where('name', 'like', "%".$request->search."%")->orWhere('email', 'like', "%".$request->search."%")->orderBy('id', 'desc')->paginate(10);
        } else {
            $users = User::orderBy('id', 'desc')->paginate(10);
        }
        return view('pages.admin.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.user.create');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        if($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return back()->with('success', "User berhasil dibuat");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('pages.admin.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:6'
        ]);

        if($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $update = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->has('password')) {
            $update['password'] = Hash::make($request->password);
        }

        $user->update($update);
        return back()->with('success', "User berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return ['status' => true, 'msg' => "User berhasil dihapus"];
    }
}
