@extends('frontend.layouts.app')
@section('main')

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container-fluid">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">Sepetim</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Sepetim</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- cart section start -->
    <section class="cart__section section--padding">
        <div class="container-fluid">
            <div class="cart__section--inner">
                <form action="#">
                    <h2 class="cart__title mb-40">Sepetim</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart__table">
                                <table class="cart__table--inner">
                                    <thead class="cart__table--header">
                                        <tr class="cart__table--header__items">
                                            <th class="cart__table--header__list">Ürün Adı</th>
                                            <th class="cart__table--header__list">Fiyat</th>
                                            <th class="cart__table--header__list">Adet</th>
                                            <th class="cart__table--header__list">Toplam</th>
                                        </tr>
                                    </thead>
                                    <tbody class="cart__table--body">
                                        @if (!is_null(getCartItems()))
                                        @forelse (getCartItems() as $item )
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <button class="cart__remove--btn" aria-label="search button" type="button"><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg></button>
                                                    <div class="cart__thumbnail">
                                                        <a href="product-details.html"><img class="border-radius-5" src="{{ asset($item->product->image) }}" alt="cart-product"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h4 class="cart__content--title"><a href="product-details.html">{{ $item->product->name }}</a></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">{{ $item->product->discount }}₺</span>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <div class="quantity__box">
                                                    <form action="{{ route('decreaseItem', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                                    </form>
                                                    <label>
                                                        <input type="number" class="quantity__number quickview__value--number" value="{{ $item->quantity }}" />
                                                    </label>
                                                    <form action="{{ route('increaseItem', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price end">{{ $item->product->discount }}₺</span>
                                            </td>
                                        </tr>
                                        @empty
                                        <p>Sepetinizde ürün bulunmamaktadır.</p>
                                        @endforelse
                                        @endif
                                    </tbody>
                                </table>
                                <div class="continue__shopping d-flex justify-content-between">
                                    <a class="continue__shopping--link" href="{{ url('/website#products') }}">Alışverişe Devam Et</a>
                                    <form action="{{ route('clearCart') }}" method="POST">
                                        @csrf
                                    <button class="continue__shopping--clear" type="submit">Sepeti Temizle</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart__summary border-radius-10">
                                <div class="cart__note mb-20">
                                    <h3 class="cart__note--title">Note</h3>
                                    <p class="cart__note--desc">Eklemek istediğiniz not...</p>
                                    <textarea class="cart__note--textarea border-radius-5"></textarea>
                                </div>
                                <div class="cart__summary--total mb-20">
                                    <table class="cart__summary--total__table">
                                        <tbody>
                                            {{-- <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">SUBTOTAL</td>
                                                <td class="cart__summary--amount text-right">$860.00</td>
                                            </tr> --}}
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">TOPLAM</td>
                                                <td class="cart__summary--amount text-right">{{ getTotalPrice() }}₺</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart__summary--footer">
                                    <p class="cart__summary--footer__desc">Kargo ücreti dahildir.</p>
                                    <ul class="d-flex justify-content-between">
                                        <li><a class="cart__summary--footer__btn primary__btn checkout" href="{{ URL::to('website/checkout') }}">Ödeme</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- cart section end -->
@endsection
