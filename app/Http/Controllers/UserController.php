<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show Login page
     *
     * @return void
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Show Register page
     *
     * @return void
     */
    public function register()
    {
        return view('register');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dump($request);
        $validated = $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
                'password_repeat' => 'same:password'
            ]
        );
        $user = new User();
        $user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]
        );
        auth()->login($user);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        dd($request);
        $validate = $request->validate([
            'current_password' => 'nullable|required_with:password|current_password',
            'password' => 'nullable|min:6',
            'password_repeat' => 'same:password'
        ]);
        $user = User::find(auth()->user()->id);
        if (!empty($request->name)) {
            $user->name = $request->name;
        }
        if (!empty($request->password)) {
            $user->password = $request->password;
        }
        $user->save();
        return back()->with('status','Успешно внесены изменения');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
