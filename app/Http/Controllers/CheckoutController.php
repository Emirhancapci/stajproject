<?php

namespace App\Http\Controllers;

use App\Models\CheckoutForm;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('frontend.checkout');
    }

    public function store(Request $request)
    {
        $request ->validate([
            'name'   => 'required',
            'phone'  => 'required',
            'address'=> 'required',
            'city'   => 'required',
            'country'=> 'required',
            'note'   => 'required',
        ]);

        $formData = $request->only(['id','name', 'phone', 'address', 'city', 'country','note']);
        CheckoutForm::create($formData);
        Alert::success('TEBRİKLER', 'Siparişiniz başarıyla alındı.');
        return back();
    }
}
