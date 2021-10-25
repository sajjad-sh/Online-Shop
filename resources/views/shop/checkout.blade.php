@extends('layouts.shop')

@section('title', 'فاکتور نهایی')

@section('content')
  <!-- breadcrumb-area -->
  <div class="breadcrumb-area breadcrumb-bg-two">
    <div class="container custom-container">
      <div class="row">
        <div class="col-12">
          <div class="breadcrumb-content">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.html">صفحه نخست</a></li>
                <li class="breadcrumb-item"><a href="home.html">صفحات</a></li>
                <li class="breadcrumb-item active" aria-current="page">صورتحساب</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb-area-end -->

  <!-- checkout-area -->
  <div class="checkout-area pt-90 pb-90">
    <div class="container">


      <form action="{{ route('payments.store') }}" method="post">
        @csrf
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="checkout-progress-wrap">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="checkout-progress-step">
                <ul>
                  <li class="active">
                    <div class="icon"><i class="fas fa-check"></i></div>
                    <span>شیوه ارسال کالا</span>
                  </li>
                  <li>
                    <div class="icon">2</div>
                    <span>سفارش ثبت شد</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="checkout-form-wrap">
              <div class="building-info-wrap">
                <h5 class="title">انتخاب آدرس</h5>

                <div class="different-address-wrap">
                  <div class="custom-control custom-checkbox">

                    @foreach(auth()->user()->addresses as $address)
                      <input onclick="disableTextArea()" name="address" type="radio" value="{{ $address->id }}" id="address_{{ $address->id }}" style="width: fit-content">
                      <label for="address_{{ $address->id }}">ارسال به <b>"{{ $address->content }}"</b></label>
                      <br>
                    @endforeach


                    <input onclick="enableTextArea()" name="address" type="radio" id="address" value="new" style="width: fit-content">
                    <label style="color: green;" for="address">ارسال به <b>آدرس جدید</b></label>
                  </div>


                </div>
                <textarea disabled name="new_address" id="new_address"></textarea>

                @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                      {{ $error }}
                    </div>
                  @endforeach
                @endif


                <script>
                  function enableTextArea() {
                    document.getElementById("new_address").disabled = false;
                    document.getElementById("new_address").placeholder = 'آدرس جدید را وارد کنید';
                  }

                  function disableTextArea() {
                    document.getElementById("new_address").disabled = true;
                    document.getElementById("new_address").placeholder = '';

                  }
                </script>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="shop-cart-total order-summary-wrap">
              <h3 class="title">خلاصه سفارش</h3>

              @foreach($cart_items as $cart_item)
                <div class="os-products-item">
                  <div class="thumb">
                    <a href="{{ url("product/$cart_item->id") }}"><img src="{{$cart_item->primary_image}}" alt=""></a>
                  </div>
                  <div class="content">
                    <h6 class="title"><a href="shop-details.html">{{ $cart_item->fa_title }}</a></h6>
                    <span class="price">@price($cart_item->price)</span>
                  </div>
                  <div class="remove">x</div>
                </div>
              @endforeach


              <div class="shop-cart-widget">

                <ul>
                  <li>
                    <span>شیوه پرداخت</span>
                    <div class="shop-check-wrap">
                      <div class="custom-control custom-checkbox">
                        <input type="radio" class="custom-control-input" name="payment_method" id="customCheck1" value="0">
                        <label class="custom-control-label" for="customCheck1">نقدی</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="radio" class="custom-control-input" name="payment_method" id="customCheck2" value="1">
                        <label class="custom-control-label" for="customCheck2">پرداخت آنلاین</label>
                      </div>
                    </div>
                  </li>
                  <li class="cart-total-amount"><span>مجموع سبد</span>
                    <span class="amount">
                      {{ cartTotalPrice($cart_items, $cart_items_counts) }} &nbsp;تومان
                    </span>
                  </li>
                </ul>
                <div class="payment-method-info">
                  <div class="paypal-method-flex">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck5">
                      <label class="custom-control-label" for="customCheck5">پرداخت حین تحویل</label>
                      <p>پرداخت به صورت نقدی هنگام تحویل.</p>
                    </div>
                  </div>
                  <div class="paypal-method-flex">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck6">
                      <label class="custom-control-label" for="customCheck6">زرین پال</label>
                    </div>
                    <div class="paypal-logo"><img src="img/images/card.png" alt=""></div>
                  </div>
                </div>
                <div class="payment-terms">
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                    <label class="custom-control-label" for="customCheck7">من با شرایط و ضوابط وب سایت موافقم</label>
                  </div>
                </div>
                <button href="{{'checkout.html'}}" class="btn" type="submit">پرداخت نهایی</button>

              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- checkout-area-end -->
@endsection
