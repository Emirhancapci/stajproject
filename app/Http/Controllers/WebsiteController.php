<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Website;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WebsiteController extends Controller
{
    public function index()
    {
    return view('frontend.home');
    }

    public function showlogin()
    {

        return view('frontend.auth.login');
    }

    public function showregister()
    {

        return view('frontend.auth.register');
    }

    public function about()
    {
        return view('frontend.about');

    }

    public function cart()
    {
        return view('frontend.cart');

    }

    public function products()
    {
        return view('frontend.products');
    }


}
