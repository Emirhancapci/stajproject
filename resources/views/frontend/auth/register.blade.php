@extends('frontend.layouts.app')
@section('main')
@include('sweetalert::alert')
<!-- Start register section  -->
<div class="col">
    <div class="account__login register">
        <div class="account__login--header mb-25" style="text-align: center;">
            <h3 class="account__login--header__title mb-10">Hesap Oluştur</h3>
            <p class="account__login--header__desc">Alışverişe başlamak için hesap oluştur</p>
        </div>
        @error('email')
        <span style="color: red; font-size:17px; margin-left:530px">{{ $message }}</span>
        @enderror
        <div class="account__login--inner" style="margin: 0 auto; max-width: 400px;">
            <form action="{{ route('website.register') }}" method="POST">
                @csrf
                <label>
                    <input class="account__login--input" placeholder="İsim" type="text" name="name">
                </label>
                <label>
                    <input class="account__login--input" placeholder="E-posta Adresi" type="email" name="email">
                </label>
                <label>
                    <input class="account__login--input" placeholder="Şifre" type="password" name="password">
                </label>
                <label>
                    <button class="account__login--btn primary__btn mb-10" type="submit">Kayıt Ol</button>
                </label>
                <div class="account__login--remember position__relative">
                    <input class="checkout__checkbox--input" id="check2" type="checkbox">
                    <span class="checkout__checkbox--checkmark"></span>
                    <label class="checkout__checkbox--label login__remember--label" for="check2">
                        Üyelik sözleşmesini okudum ve kabul ediyorum</label>
                </div>
            </form>
        </div>
    </div>
</div>
@include('sweetalert::alert')
<!-- End register section  -->
@endsection
