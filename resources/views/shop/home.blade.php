@extends('layouts.shop')

@section('title', 'فروشگاه پارادایس - صفحه اصلی')

@section('content')
  <!-- slider-area -->
  <section class="slider-area" data-background="img/bg/slider_area_bg.jpg">
    <div class="container custom-container">
      <div class="row">
        <div class="col-7">

          <!-- TODO: Create Slider Model and store title, subtitle, description and button attributes -->
          <div class="slider-active">

            @forelse($home_sliders as $home_slider)
              <div class="single-slider slider-bg"
                   data-background="{{\Illuminate\Support\Facades\URL::to($home_slider->url)}}">
                <div class="slider-content">
                  <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">
                    {{$home_slider->subtitle}}
                  </h5>
                  <h2 class="title" data-animation="fadeInUp" data-delay=".4s">
                    {{$home_slider->title}}
                  </h2>
                  <p data-animation="fadeInUp" data-delay=".6s">
                    {{$home_slider->description}}
                  </p>
                  <a href="{{\Illuminate\Support\Facades\URL::to($home_slider->link)}}" class="btn rounded-btn"
                     data-animation="fadeInUp" data-delay=".8s">الان
                    بخرید</a>
                </div>
              </div>
            @empty
              <p>
                اسلایدری وجود ندارد
              </p>
            @endforelse
          </div>
        </div>
        <div class="col-3">
          <div class="slider-banner-img mb-20">
            <a href="{{ \Illuminate\Support\Facades\URL::to('category/home-and-kitchen') }}"><img src="img/slider/slider_banner01.jpg" alt=""></a>
          </div>
          <div class="slider-banner-img">
            <a href="{{ \Illuminate\Support\Facades\URL::to('category/personal-appliance') }}"><img src="img/slider/slider_banner02.jpg" alt=""></a>
          </div>
        </div>
        <div class="col-3">
          <div class="slider-banner-img">
            <a href="{{ \Illuminate\Support\Facades\URL::to('category/sport-entertainment') }}"><img src="img/slider/slider_banner03.jpg" alt=""></a>
          </div>
        </div>
      </div>
    </div>

    <!-- category-area -->
    <div class="container custom-container">
      <div class="slider-category-wrap">
        <div class="row category-active">

          <div class="col-lg-2">
            <div class="category-item active">
              <a href="{{ \Illuminate\Support\Facades\URL::to('category/' . $categories[1]->slug) }}" class="category-link"></a>
              <div class="category-thumb">
                @php $first_image = $categories[1]->image @endphp
                <img src="{{\Illuminate\Support\Facades\URL::to("$first_image")}}">
              </div>
              <div class="category-content">
                <h6 class="title">{{$categories[1]->name}}</h6>
              </div>
            </div>
          </div>

          @foreach($categories as $key => $category)
            @if($category->parent_id === 0 and $key > 1)
              <div class="col-lg-2">
                <div class="category-item">
                  <a href="{{ \Illuminate\Support\Facades\URL::to('category/' . $category->slug) }}" class="category-link"></a>
                  <div class="category-thumb">
                    <img src="{{\Illuminate\Support\Facades\URL::to("$category->image")}}">
                  </div>
                  <div class="category-content">
                    <h6 class="title">{{$category->name}}</h6>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
    <!-- category-area-end -->

  </section>
  <!-- slider-area-end -->

  <!-- discount-area -->
  <section class="discount-area pt-80">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-6 col-md-8">
          <div class="discount-item mb-20">
            <div class="discount-thumb">
              <img src="img/product/discount_img01.jpg" alt="">
            </div>
            <div class="discount-content">
              <span>غذای سالم</span>
              <h4 class="title">
                <a href="{{ \Illuminate\Support\Facades\URL::to('category/apparel') }}">100 ارگانیک تا 35</a>
              </h4>

              <a href="{{ \Illuminate\Support\Facades\URL::to('category/apparel') }}" class="btn">الان بخرید</a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-8">
          <div class="discount-item mb-20">
            <div class="discount-thumb">
              <img src="img/product/discount_img02.jpg" alt="">
            </div>
            <div class="discount-content">
              <span>غذای سالم</span>
              <h4 class="title"><a href="{{ \Illuminate\Support\Facades\URL::to('category/food-beverage') }}">بسته بندی بهداشتی</a></h4>
              <a href="{{ \Illuminate\Support\Facades\URL::to('category/food-beverage') }}" class="btn">الان بخرید</a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-8">
          <div class="discount-item style-two mb-20">
            <div class="discount-thumb">
              <img src="img/product/discount_img03.jpg" alt="">
            </div>
            <div class="discount-content">
              <span>غذای سالم</span>
              <h4 class="title"><a href="{{ \Illuminate\Support\Facades\URL::to('category/personal-appliance') }}">مورد علاقه نوزاد تا 15</a></h4>
              <a href="{{ \Illuminate\Support\Facades\URL::to('category/personal-appliance') }}" class="btn">الان بخرید</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- discount-area-end -->

  <!-- best-deal-area -->
  <section class="best-deal-area pt-60 pb-80">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9">
          <div class="best-deal-top-wrap">
            <div class="bd-section-title">
              <h3 class="title"> محصولات شگفت‌انگیز &nbsp;<span>این ماه!</span></h3>
              <p>هر هفته تخفیفات عالی برای محصولات برتر</p>
            </div>

            <!-- Timer -->
            <div class="coming-time" data-countdown="2022/02/30"></div>
          </div>
        </div>
      </div>
      <div class="row best-deal-active">

      @foreach($amazing_products as $amazing_product)
        @php
          $ids = \Illuminate\Support\Facades\DB::table('amazings')->pluck('id')->toArray();
        @endphp

        @if(in_array($amazing_product->amazing_id, $ids))

          @php
            $type = $amazing_product->amazing->type;
            $amount = $amazing_product->amazing->amount;
            $price = $amazing_product->price;
            $final_price = \App\Models\Product::calculateDiscount($type, $amount, $price);
            $primary_image = null;

            foreach ($amazing_product->images as $image) {
                if($image->is_primary == 1)
                    $primary_image = $image;
            }
          @endphp
          <div class="col-xl-3">
            <div class="best-deal-item" style="height: 430px;">
              <div class="best-deal-thumb">
                <a href="{{\Illuminate\Support\Facades\URL::to("product/$amazing_product->slug")}}">
                  <img src="{{$primary_image ? \Illuminate\Support\Facades\URL::to($primary_image->url) : asset('img/product/sp__products04.png')}}" alt="{{$primary_image ? $primary_image->alt : ''}}">
                </a>
              </div>
              <div class="best-deal-content">
                <div class="main-content">
                  <h4 class="title">
                    <a href="{{\Illuminate\Support\Facades\URL::to("product/$amazing_product->slug")}}">
                      <span style="width: 10px;">{{$amazing_product->fa_title}}</span>
                    </a>
                  </h4>
                  <p>
                    <del class="text-danger">{{$price}}</del>
                  </p>
                  <!-- TODO: Custom directive -->
                  <p>{{number_format($final_price)}}&nbsp; تومان</p>
                </div>
                <div class="icon"><a href="{{ \Illuminate\Support\Facades\URL::to("cart/add/$amazing_product->id/1") }}">+</a></div>
              </div>
            </div>
          </div>
          @endif
        @endforeach
      </div>
    </div>
  </section>
  <!-- best-deal-area-end -->

  <!-- special-products-area -->
  <section class="special-products-area gray-bg pt-75 pb-60">
    <div class="container">
      <div class="row align-items-end mb-50">
        <div class="col-md-8 col-sm-9">
          <div class="section-title">
            <span class="sub-title">فروشگاه پاردایس</span>
            <h2 class="title">محصولات پربازدید</h2>
          </div>
        </div>

      </div>
      <div class="special-products-wrap">
        <div class="row">
          <div class="col-3 d-none d-lg-block">
            <div class="special-products-add">
              <div class="sp-add-thumb">
                <img src="img/product/special_products_add.jpg" alt="">
              </div>
              <div class="sp-add-content">
                <span class="sub-title">غذای سالم</span>
                <h4 class="title">غذای <b>بچه ها</b></h4>
                <p>پیشنهاد فوق العاده تا 50٪ تخفیف</p>
                <a href="shop.html" class="btn rounded-btn">الان بخرید</a>
              </div>
            </div>
          </div>
          <div class="col-9">
            <div class="row justify-content-center">

              @foreach($most_visits as $most_visit)
                <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="sp-product-item mb-20" style="height: 495px;">
                  <div class="sp-product-thumb">
                    @if($most_visit->amazing_id != null)
                      @if($most_visit->amazing->type == 0)
                        <span class="batch">{{ $most_visit->amazing->amount }}%</span>
                      @else
                        <span class="batch">جدید</span>
                      @endif
                    @else
                      <span class="batch">جدید</span>
                    @endif
                    @php
                      $primary_image = null;

                      foreach ($most_visit->images as $image) {
                          if($image->is_primary == 1)
                              $primary_image = $image;
                      }
                    @endphp
                    <a href="{{\Illuminate\Support\Facades\URL::to("product/$most_visit->slug")}}"><img src="{{$primary_image ? \Illuminate\Support\Facades\URL::to($primary_image->url) : asset('img/product/sp__products04.png')}}" alt=""></a>
                  </div>
                  <div class="sp-product-content">
                    <h6 class="title"><a href="{{\Illuminate\Support\Facades\URL::to("product/$most_visit->slug")}}">{{ $most_visit->fa_title }}</a></h6>
                    <span class="product-status">{{number_format($most_visit->total_price)}} تومان</span>
                    <div class="sp-cart-wrap" >
                      <div class="shop-perched-info">
                        <a href="{{ \Illuminate\Support\Facades\URL::to("cart/add/$most_visit->id/1") }}" class="btn">افزودن به سبد</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- special-products-area-end -->

  <!-- coupon-area -->
  <div class="coupon-area gray-bg pb-80">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="coupon-bg">
            <div class="coupon-title">
              <span>کد تخفیف</span>
              <h3 class="title">کد تخفیف 3 هزار تومانی دریافت کنید</h3>
            </div>
            <div class="coupon-code-wrap">
              <h5 class="code">PRD-SJD</h5>
              <img src="img/images/coupon_code.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- coupon-area-end -->

  <!-- best-sellers-area -->
  <section class="best-sellers-area pt-75">
    <div class="container">
      <div class="row align-items-end mb-50">
        <div class="col-md-8 col-sm-9">
          <div class="section-title">
            <span class="sub-title">پرفروش ترین ها</span>
          </div>
        </div>

      </div>
      <div class="best-sellers-products">
        <div class="row justify-content-center">
          @foreach($most_sales as $most_sale)
            <div class="col-3">
              <div class="sp-product-item mb-20" style="height: 490px;">
                <div class="sp-product-thumb">
                  @if($most_sale->amazing_id != null)
                    @if($most_sale->amazing->type == 0)
                      <span class="batch">{{ $most_sale->amazing->amount }}%</span>
                    @else
                      <span class="batch">جدید</span>
                    @endif
                  @else
                    <span class="batch">جدید</span>
                  @endif

                    @php
                      $primary_image = null;

                      foreach ($most_sale->images as $image) {
                          if($image->is_primary == 1)
                              $primary_image = $image;
                      }
                    @endphp
                    <a href="{{\Illuminate\Support\Facades\URL::to("product/$most_sale->slug")}}"><img src="{{$primary_image ? \Illuminate\Support\Facades\URL::to($primary_image->url) : asset('img/product/sp__products04.png')}}" alt=""></a>
                </div>
                <div class="sp-product-content">
                  <h6 class="title">
                    <a href="{{\Illuminate\Support\Facades\URL::to("product/$most_sale->slug")}}">
                      {{ $most_sale->fa_title }}
                    </a>
                  </h6>
                  <span class="product-status">
                    {{number_format($most_sale->total_price)}} تومان
                  </span>
                  <div class="sp-cart-wrap" >
                    <div class="shop-perched-info">
                      <a href="{{ \Illuminate\Support\Facades\URL::to("cart/add/$most_sale->id/1") }}" class="btn">افزودن به سبد</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- best-sellers-area-end -->

  <!-- discount-area -->
  <section class="discount-style-two pt-60 pb-50">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="discount-item-two">
            <div class="discount-thumb">
              <img src="img/product/s_discount_img01.jpg" alt="">
            </div>
            <div class="discount-content">
              <span>غذای سالم</span>
              <h4 class="title"><a href="{{ \Illuminate\Support\Facades\URL::to('category/food-beverage') }}">مزرعه ارگانیک برای گانیک</a></h4>
              <p>پیشنهاد فوق العاده تا 50٪ تخفیف</p>
              <a href="{{ \Illuminate\Support\Facades\URL::to('category/food-beverage') }}" class="btn rounded-btn">الان بخرید</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="discount-item-two">
            <div class="discount-thumb">
              <img src="img/product/s_discount_img02.jpg" alt="">
            </div>
            <div class="discount-content">
              <span>غذای سالم</span>
              <h4 class="title"><a href="{{ \Illuminate\Support\Facades\URL::to('category/personal-appliance') }}">مزرعه ارگانیک برای گانیک</a></h4>
              <p>پیشنهاد فوق العاده تا 50٪ تخفیف</p>
              <a href="{{ \Illuminate\Support\Facades\URL::to('category/personal-appliance') }}" class="btn rounded-btn">الان بخرید</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- discount-area-end -->

@endsection
