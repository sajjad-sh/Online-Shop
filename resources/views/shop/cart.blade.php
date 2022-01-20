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

            @if(isset(session('payment_message')['error']))
              <div class="alert alert-danger" role="alert">
                {{ session('payment_message')['error'] }}
              </div>
            @elseif(isset(session('payment_message')['success']))
              <div class="alert alert-success" role="alert">
                {{ session('payment_message')['success'] }}
              </div>
            @endif

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
                @foreach($cart_items as $cart_item)
                  <tr>
                    <td class="product-thumbnail">
                      <a href="{{url("product/$cart_item->slug")}}">
                        <img src="{{$cart_item->primary_image}}" alt="">
                      </a>
                    </td>
                    <td class="product-name">
                      <h4><a href="{{url("product/$cart_item->slug")}}">
                          {{ $cart_item->fa_title }}
                        </a></h4>
                    </td>
                    <td class="product-price">
                      @price($cart_item->total_price)
                    </td>
                    <td class="product-quantity">
                      <div class="cart--plus--minus">
                        <form action="{{ route('cart.update', $cart_item->id) }}" class="num-block" id="updateCart" method="post">
                          @csrf
                          @method('PUT')
                          <input name="new_quantity" type="text" class="in-num" value="{{ $cart_items_counts[$cart_item->id] ?: 1 }}" readonly="">
                          <div class="qtybutton-box">
                            <span class="plus"><i class="fas fa-angle-up"></i></span>
                            <span class="minus dis"><i class="fas fa-angle-down"></i></span>
                          </div>
                        </form>
                      </div>
                    </td>
                    <td class="product-subtotal">
                      <span>
                        @price($cart_item->total_price * $cart_items_counts[$cart_item->id])
                      </span>
                    </td>
                    <td class="product-delete">
                      <form action="{{ route('cart.destroy', $cart_item) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;">
                          <i class="far fa-trash-alt"></i>
                        </button>
                      </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="shop-cart-bottom">
            <div class="cart-coupon">
              <form action="{{ route('cart.applyDiscount')}}" method="post">
                @csrf
                <input name="cart_total_price" type="hidden" value="{{ cartTotalPrice($cart_items, $cart_items_counts, false) }}">
                <input name="discount_code" type="text" placeholder="کد تخفیف را وارد کنید ...">
                <button type="submit" class="btn">اعمال تخفیف</button>
              </form>
            </div>
            <div class="continue-shopping">
              <a onclick="updateCart()" class="btn">بروزرسانی سبد</a>
            </div>
          </div>
          <br>

          @if(isset(session('message')['error']))
            <div class="alert alert-danger" role="alert">
              {{ session('message')['error'] }}
            </div>
          @elseif(isset(session('message')['success']))
            <div class="alert alert-success" role="alert">
              {{ session('message')['success'] }}
            </div>
          @endif

        </div>
        <script>
          function updateCart() {
            document.getElementById("updateCart").submit();
          }
        </script>
        <div class="col-xl-5 col-lg-12">
          <div class="shop-cart-total">
            <div class="shop-cart-widget">
              <form action="#">
                <ul>
                  <li class="cart-total-amount">
                    <span>مجموع کل سبد</span>
                    <span class="amount">
                      {{ cartTotalPrice($cart_items, $cart_items_counts) }} &nbsp;تومان
                    </span>
                  </li>
                </ul>
                <a href="{{ route('checkout') }}" class="btn">برو به صورتحساب</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- cart-area-end -->

@endsection
