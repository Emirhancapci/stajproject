<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WebsiteUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function dashboard()
    {
        return view('admin');
    }

        public function index()
        {
            if(!Auth::check()){
                return view('login.login');
            }
            return redirect("admin/dashboard")->with('success', 'You are not allowed to access');
        }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('TEBRİKLER', 'Başarıyla giriş yaptınız.');
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(){

        Session::flush();
        Auth::logout();
        return redirect('/login');
    }


    // WEBSITE REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' =>['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = WebsiteUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Alert::success('TEBRİKLER', 'Başarıyla kayıt oldunuz.');
        return redirect('/website/login')->with('success', 'Registration successful!'); // Kayıt başarılı mesajıyla birlikte geri dön
    }

    // WEBSITE LOGIN
    public function websitelogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('TEBRİKLER', 'Başarıyla giriş yaptınız.');
            return redirect()->intended('website');
        } else {
            return back()->withErrors([
                'email' => 'E-Posta ya da parola yanlış.',
            ])->withInput($request->only('email'));
        }
    }

    public function websitelogout()
    {
    Session::flush();
    Auth::logout();
    return redirect('/website/login');
    }



}
