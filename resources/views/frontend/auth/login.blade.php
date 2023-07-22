@extends('frontend.layouts.app')
@section('main')

<!-- Start login section  -->
<div class="login__section section--padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('website.login') }}" method="post">
                    @csrf
                    <div class="login__section--inner">
                        <div class="account__login">
                            <div class="account__login--header mb-25">
                                <h3 class="account__login--header__title mb-10">GİRİŞ</h3>
                                <p class="account__login--header__desc">Buradan giriş yapabilirsiniz.</p>
                            </div>
                            @error('email')
                            <span style="color: red; font-size:17px; margin-bottom:10px">{{ $message }}</span>
                            @enderror
                            @error('password')
                            <span style="color: red; font-size:17px; margin-bottom:10px">{{ $message }}</span>
                            @enderror
                            <div class="account__login--inner">
                                <label>
                                    <input class="account__login--input" placeholder="E-Posta" type="email" name="email">
                                </label>
                                <label>
                                    <input class="account__login--input" placeholder="Şifre" type="password" name="password">
                                </label>
                                <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                    <div class="account__login--remember position__relative">
                                        <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label login__remember--label" for="check1">
                                            Beni Hatırla</label>
                                    </div>

                                </div>
                                <button class="account__login--btn primary__btn" type="submit">Giriş Yap</button>
                                <div class="account__social d-flex justify-content-center mb-15">
                                </div>
                                <p class="account__login--signup__text">Hesabınız Yok Mu? <a href="{{ URL::to('website/register') }}">Şimdi Kayıt Ol</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
<!-- End login section  -->
@endsection
