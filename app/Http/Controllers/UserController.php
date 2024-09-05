<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// use Session;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            return redirect('/product')->with('Success', 'Login Berhasil! Selamat Datang di E-Market');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('Success', 'Kamu berhasil Logout');
    }

    public function register()
    {
        return view('register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            // 'role_id' => 'required|exists:roles,id',
            // 'role_id' => 'required'
        ]);

        // $role_id = $request->id;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'username' => $request->username,
            'password' => Hash::make($request->password),
            // 'role_id' => 2
            // 'active' => 1
        ]);

        Session::flash('message', 'Register Berhasil! Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/');

        // $data = [
        //     // 'name' => $request->nama,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role_id' => $request->role_id
        // ];

        // User::create($data);

        // $login = [
        //     'email' => $request->input('email'),
        //     'password' => $request->input('password')
        // ];

        // if (Auth::attempt($login)) {
        //     return redirect('/product');
        // } else {
        //     return redirect()->route('login')->with('failed', 'Email atau password salah');
        // }
    }
}
