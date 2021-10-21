@dd(request()->cookie('cart_items'))
@extends('layouts.shop')

@section('title', 'محصول')

@section('content')

  <!-- breadcrumb-area -->
  <div class="breadcrumb-area breadcrumb-bg-two">
    <div class="container custom-container">
      <div class="row">
        <div class="col-12">
          <div class="breadcrumb-content">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.blade.php">صفحه نخست</a></li>
                <li class="breadcrumb-item"><a href="home.blade.php">صفحات</a></li>
                <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb-area-end -->

  <!-- cart-area -->
  <div class="cart-area pt-90 pb-90">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7">
          <div class="cart-wrapper">
            <div class="table-responsive">
              <table class="table mb-0">
                <thead>
                <tr>
                  <th class="product-thumbnail"></th>
                  <th class="product-name">نام محصول</th>
                  <th class="product-price">قیمت</th>
                  <th class="product-quantity">تعداد</th>
                  <th class="product-subtotal">جمع</th>
                  <th class="product-delete"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                  <tr>
                    <td class="product-thumbnail">
                      <a href="single-product.blade.php">
                        <img src="{{$product->primary_image}}" alt="">
                      </a>
                    </td>
                    <td class="product-name">
                      <h4><a href="single-product.blade.php">
                          {{ $product->fa_title }}
                        </a></h4>
                    </td>
                    <td class="product-price">
                      @price($product->price)
                    </td>
                    <td class="product-quantity">
                      <div class="cart--plus--minus">
                        <form action="#" class="num-block">
                          <input type="text" class="in-num" value="1" readonly="">
                          <div class="qtybutton-box">
                            <span class="plus"><i class="fas fa-angle-up"></i></span>
                            <span class="minus dis"><i class="fas fa-angle-down"></i></span>
                          </div>
                        </form>
                      </div>
                    </td>
                    <td class="product-subtotal">
                      <span>
                        @price($product->price)
                      </span>
                    </td>
                    <td class="product-delete"><a href="#"><i class="far fa-trash-alt"></i></a></td>
                  </tr>
                @endforeach

                </tbody>
              </table>
            </div>
          </div>
          <div class="shop-cart-bottom">
            <div class="cart-coupon">
              <form action="#">
                <input type="text" placeholder="کد تخفیف را وارد کیند ...">
                <button class="btn">اعمال تخفیف</button>
              </form>
            </div>
            <div class="continue-shopping">
              <a href="shop.html" class="btn">بروزرسانی سبد</a>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-lg-12">
          <div class="shop-cart-total">
            <h3 class="title">مجموع سبد خرید</h3>
            <div class="shop-cart-widget">
              <form action="#">
                <ul>
                  <li>
                    <span>شیوه ارسال</span>
                    <div class="shop-check-wrap">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">ارسال رایگان</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">وانت محلی: 5.000 تومان</label>
                      </div>
                    </div>
                  </li>
                  <li class="cart-total-amount">
                    <span>مجموع کل سبد</span>
                    <span class="amount">
                      @totalPrice($products)
                    </span>
                  </li>
                </ul>
                <a href="checkout.html" class="btn">برو به صورتحساب</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- cart-area-end -->

@endsection
