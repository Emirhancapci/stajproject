@extends('frontend.layouts.app')
@section('main')
@include('sweetalert::alert')
<style>
    .checkout__notes--textarea__field {
        height: 70px; /* İstediğiniz yüksekliği burada belirleyin */
    }
</style>
<div class="checkout__page--area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="main checkout__mian">
                    <form action="{{ route('website.checkout') }}" method="POST">
                        @csrf
                        <div class="checkout__content--step section__shipping--address">
                            <div class="section__header mb-25">
                                <h2 class="section__header--title h3">Alıcı Bilgileri</h2>
                            </div>
                            <div class="section__shipping--address__content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 mb-20">
                                        <div class="checkout__input--list ">
                                            <label class="checkout__input--label mb-5" for="input1">İsim <span class="checkout__input--label__star">*</span></label>
                                            <input class="checkout__input--field border-radius-5" placeholder="İsim" id="input1"  type="text" name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-20">
                                        <div class="checkout__input--list">
                                            <label class="checkout__input--label mb-5" for="input2">Telefon <span class="checkout__input--label__star">*</span></label>
                                            <input class="checkout__input--field border-radius-5" placeholder="Telefon Numarası" id="input2"  type="number" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <div class="checkout__input--list">
                                            <label class="checkout__input--label mb-5" for="input4">Adres<span class="checkout__input--label__star">*</span></label>
                                            <input class="checkout__input--field border-radius-5" placeholder="Adres" id="input4" type="text" name="address">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <div class="checkout__input--list">
                                            <label class="checkout__input--label mb-5" for="input5">Şehir <span class="checkout__input--label__star">*</span></label>
                                            <input class="checkout__input--field border-radius-5" placeholder="Şehir" id="input5" type="text" name="city">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <div class="checkout__input--list">
                                            <label class="checkout__input--label mb-5" for="country">Ülke <span class="checkout__input--label__star">*</span></label>
                                            <div class="checkout__input--select select">
                                                <select class="checkout__input--select__field border-radius-5" id="country"  type="text" name="country">
                                                    <option value="1">Türkiye</option>
                                                    <option value="2">Almanya</option>
                                                    <option value="3">Amerika Birleşik Devletleri</option>
                                                    <option value="4">İngiltere</option>
                                                    <option value="5">Fransa</option>
                                                    <option value="6">Bulgaristan</option>
                                                    <option value="7">Hollanda</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-notes mb-20">
                            <label class="checkout__input--label mb-" for="order">Not <span class="checkout__input--label__star">*</span></label>
                           <input type="text" class="checkout__notes--textarea__field border-radius-5" id="order" placeholder="Eklemek istediğiniz not.." spellcheck="false" name="note">
                        </div>
                        <div class="checkout__content--step__footer d-flex align-items-center">
                            <a class="continue__shipping--btn primary__btn border-radius-5" href="index.html">Alışverişe Devam Et</a>
                            <a class="previous__link--content" href="cart.html">Sepete Geri Dön</a>
                        </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <aside class="checkout__sidebar sidebar border-radius-10">
                    <h2 class="checkout__order--summary__title text-center mb-15">Sepetinizdeki Ürünler</h2>
                    <div class="cart__table checkout__product--table">
                        @if (!is_null(getCartItems()))
                        @forelse (getCartItems() as $item )
                        <table class="cart__table--inner">
                            <tbody class="cart__table--body">
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="product__image two  d-flex align-items-center">
                                            <div class="product__thumbnail border-radius-5">
                                                <a class="display-block" href="product-details.html"><img class="display-block border-radius-5" src="{{ asset($item->product->image) }}" alt="cart-product"></a>
                                                <span class="product__thumbnail--quantity">1</span>
                                            </div>
                                            <div class="product__description">
                                                <h4 class="product__description--name"><a href="product-details.html">{{ $item->product->name }}</a></h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">{{ $item->product->discount }}₺</span>
                                    </td>
                            </tbody>
                        </table>
                        @empty
                        <p style="margin-top:10px">Sepetinizde ürün bulunmamaktadır.</p>
                        @endforelse
                        @endif
                    </div>

                        <table class="checkout__total--table">
                            <tfoot class="checkout__total--footer">
                                <tr class="checkout__total--footer__items">
                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">Toplam </td>
                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right">{{ getTotalPrice() }}₺</td>
                                </tr>
                            </tfoot>
                        </table>

                    <div class="payment__history mb-30">
                        <h3 class="payment__history--title mb-20">Ödeme</h3>
                        <ul class="payment__history--inner d-flex">
                            <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Kredi Kartı</button></li>
                            <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Banka Kartı</button></li>
                            <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Paypal</button></li>
                        </ul>
                    </div>
                    <button class="checkout__now--btn primary__btn" type="submit">Şimdi Öde</button>
                </aside>
            </div>

        </div>
    </div>
</div>
</form>

@endsection
