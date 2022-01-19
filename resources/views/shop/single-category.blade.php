@extends('layouts.shop')

@section('title', "دسته $category->name")

@section('content')

  <!-- main-area -->
  <main>
    <!-- slider-area -->
    <section class="slider--area" data-background="{{asset('img/bg/slider_area_bg.jpg')}}">
      <div class="container custom-container">
      </div>

    </section>
    <!-- slider-area-end -->

    <!-- discount-time-area -->
    <section class="discount-time-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="discount-time-bg">
              <div class="discount-time-img left">
                <img src="{{asset("img/images/discount_count_shape01.png")}}" class="wow rollIn" data-wow-delay=".3s" alt="">
              </div>
              <div class="discount-time-img right"><img src="{{asset("img/images/discount_count_shape02.png")}}" alt="">
              </div>
              <div class="discount-time-content">
                <div class="section-title section-title-two text-center mb-25">
                  <span class="sub-title">تخفیف بگیرید</span>
                  <h2 class="title">بهترین تخفیفات این هفته!</h2>
                </div>
                <div class="coming-time" data-countdown="2025/10/20"></div>
                <a href="{{ url("category/food-beverage") }}" class="btn">الان بخرید</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- discount-time-area-end -->

    <!-- bd-week-area -->
    <section class="bd-week-area pt-70 pb-30">

      @foreach($subcategories as $key => $subcategory)
        <div class="container">
          <div class="row align-items-end mb-50">
            <div class="col-md-8 col-sm-9">
              <div class="section-title section-title-two">
                <span class="sub-title">زیر دسته</span>
                <h2 class="title">{{$subcategory->name}}</h2>
              </div>
            </div>
            <div class="col-md-4 col-sm-3">
              <div class="section-btn-link text-right text-md-left">
                <a href="{{\Illuminate\Support\Facades\URL::to('category/'.$subcategory->slug)}}">همه محصولات <i class="fas fa-angle-double-left"></i></a>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            @foreach($products[$key] as $product)
              <div class="col-xl-3 col-md-4 col-sm-6">
              <div class="sp--product--item mb-50">
                <div class="sp--product--thumb">
                  <a href="{{\Illuminate\Support\Facades\URL::to('product/'.$product->slug)}}"><img src="{{$product->primary_image ? \Illuminate\Support\Facades\URL::to($product->primary_image) : asset('img/product/sp__products04.png')}}" alt=""></a>
                </div>
                <div class="sp--product--content">
                  <h6 class="title"><a href="shop-details.html">{{$product->fa_title}}</a></h6>
                  <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="price">{{number_format($product->price)}} تومان</div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      @endforeach
    </section>
    <!-- bd-week-area-end -->

    <!-- description-area -->
    <div class="container custom-container">
      <div class="slider-category-wrap">
        {!! $category->description !!}
      </div>
    </div>
    <!-- description-area-end -->

    <!-- ganic-app-area -->
    <section class="ganic-app-area">
      <div class="container">
        <div class="ganic-app-wrap">
          <div class="ganic-app-img">
            <img src="{{asset("img/images/download_img.png")}}" alt="">
          </div>
          <div class="row justify-content-end">
            <div class="col-lg-6">
              <div class="ganic-app-content">
                <div class="shape"><img src="{{asset("img/images/app_download_shape.png")}}" alt=""></div>
                <span class="sub-title">پلتفرم آنلاین</span>
                <h2 class="title"><span>دانلود</span> اپلیکیشن پارادایس</h2>
                <div class="ganic-app-btn">
                  <a href="index-2.html"><img src="{{asset("img/icon/app_btn01.png")}}" alt=""></a>
                  <a href="index-2.html"><img src="{{asset("img/icon/app_btn02.png")}}" alt=""></a>
                </div>
                <p>برای هر خرید 5 درصد تخفیف می گیرید</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ganic-app-area-end -->

  </main>
  <!-- main-area-end -->

@endsection
