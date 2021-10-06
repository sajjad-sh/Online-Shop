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
              No Slider
            @endforelse
          </div>
        </div>
        <div class="col-3">
          <div class="slider-banner-img mb-20">
            <a href="shop.html"><img src="img/slider/slider_banner01.jpg" alt=""></a>
          </div>
          <div class="slider-banner-img">
            <a href="shop.html"><img src="img/slider/slider_banner02.jpg" alt=""></a>
          </div>
        </div>
        <div class="col-3">
          <div class="slider-banner-img">
            <a href="shop.html"><img src="img/slider/slider_banner03.jpg" alt=""></a>
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
              <a href="shop.html" class="category-link"></a>
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
                  <a href="shop.html" class="category-link"></a>
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
              <h4 class="title"><a href="shop.html">100 ارگانیک تا 35</a></h4>
              <a href="shop.html" class="btn">الان بخرید</a>
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
              <h4 class="title"><a href="shop.html">بسته بندی بهداشتی</a></h4>
              <a href="shop.html" class="btn">الان بخرید</a>
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
              <h4 class="title"><a href="shop.html">مورد علاقه نوزاد تا 15</a></h4>
              <a href="shop.html" class="btn">الان بخرید</a>
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
            <div class="coming-time" data-countdown="2021/10/30"></div>
          </div>
        </div>
      </div>
      <div class="row best-deal-active">
        @foreach($amazing_products as $amazing_product)
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
            <div class="best-deal-item">
              <div class="best-deal-thumb">
                <a href="{{\Illuminate\Support\Facades\URL::to("product/prd-$amazing_product->id")}}">
                  <img src="{{\Illuminate\Support\Facades\URL::to($primary_image->url)}}" alt="{{$primary_image->alt}}">
                </a>
              </div>
              <div class="best-deal-content">
                <div class="main-content">
                  <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <h4 class="title">
                    <a href="single-product.blade.php">
                      {{$amazing_product->title}}
                    </a>
                  </h4>
                  <p>
                    <del class="text-danger">{{$price}}</del>
                  </p>
                  <p>{{number_format($final_price)}}&nbsp; تومان</p>
                </div>
                <div class="icon"><a href="single-product.blade.php">+</a></div>
              </div>
            </div>
          </div>
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
            <span class="sub-title">فروشگاه عالی</span>
            <h2 class="title">محصولات ویژه ما</h2>
          </div>
        </div>
        <div class="col-md-4 col-sm-3">
          <div class="section-btn text-right text-md-left">
            <a href="shop.html" class="btn">نمایش همه</a>
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
              <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="sp-product-item mb-20">
                  <div class="sp-product-thumb">
                    <span class="batch">جدید</span>
                    <a href="single-product.blade.php"><img src="img/product/sp_products01.png" alt=""></a>
                  </div>
                  <div class="sp-product-content">
                    <div class="rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                    <span class="product-status">موجود در انبار</span>
                    <div class="sp-cart-wrap">
                      <form action="#">
                        <div class="cart-plus-minus">
                          <input type="text" value="1">
                        </div>
                      </form>
                    </div>
                    <p>هر 1 کیلو - 1.500 تومان</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="sp-product-item mb-20">
                  <div class="sp-product-thumb">
                    <span class="batch discount">15%</span>
                    <a href="single-product.blade.php"><img src="img/product/sp_products02.png" alt=""></a>
                  </div>
                  <div class="sp-product-content">
                    <div class="rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                    <span class="product-status">موجود در انبار</span>
                    <div class="sp-cart-wrap">
                      <form action="#">
                        <div class="cart-plus-minus">
                          <input type="text" value="1">
                        </div>
                      </form>
                    </div>
                    <p>هر 1 کیلو - 1.500 تومان</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="sp-product-item mb-20">
                  <div class="sp-product-thumb">
                    <span class="batch discount">25%</span>
                    <a href="single-product.blade.php"><img src="img/product/sp_products03.png" alt=""></a>
                  </div>
                  <div class="sp-product-content">
                    <div class="rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                    <span class="product-status">موجود در انبار</span>
                    <div class="sp-cart-wrap">
                      <form action="#">
                        <div class="cart-plus-minus">
                          <input type="text" value="1">
                        </div>
                      </form>
                    </div>
                    <p>هر 1 کیلو - 1.500 تومان</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="sp-product-item mb-20">
                  <div class="sp-product-thumb">
                    <span class="batch">جدید</span>
                    <a href="single-product.blade.php"><img src="img/product/sp_products04.png" alt=""></a>
                  </div>
                  <div class="sp-product-content">
                    <div class="rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                    <span class="product-status">موجود در انبار</span>
                    <div class="sp-cart-wrap">
                      <form action="#">
                        <div class="cart-plus-minus">
                          <input type="text" value="1">
                        </div>
                      </form>
                    </div>
                    <p>هر 1 کیلو - 1.500 تومان</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="sp-product-item mb-20">
                  <div class="sp-product-thumb">
                    <span class="batch discount">25%</span>
                    <a href="single-product.blade.php"><img src="img/product/sp_products05.png" alt=""></a>
                  </div>
                  <div class="sp-product-content">
                    <div class="rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                    <span class="product-status">موجود در انبار</span>
                    <div class="sp-cart-wrap">
                      <form action="#">
                        <div class="cart-plus-minus">
                          <input type="text" value="1">
                        </div>
                      </form>
                    </div>
                    <p>هر 1 کیلو - 1.500 تومان</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="sp-product-item mb-20">
                  <div class="sp-product-thumb">
                    <span class="batch">جدید</span>
                    <a href="single-product.blade.php"><img src="img/product/sp_products06.png" alt=""></a>
                  </div>
                  <div class="sp-product-content">
                    <div class="rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                    <span class="product-status">موجود در انبار</span>
                    <div class="sp-cart-wrap">
                      <form action="#">
                        <div class="cart-plus-minus">
                          <input type="text" value="1">
                        </div>
                      </form>
                    </div>
                    <p>هر 1 کیلو - 1.500 تومان</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="sp-product-item mb-20">
                  <div class="sp-product-thumb">
                    <span class="batch discount">10%</span>
                    <a href="single-product.blade.php"><img src="img/product/sp_products07.png" alt=""></a>
                  </div>
                  <div class="sp-product-content">
                    <div class="rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                    <span class="product-status">موجود در انبار</span>
                    <div class="sp-cart-wrap">
                      <form action="#">
                        <div class="cart-plus-minus">
                          <input type="text" value="1">
                        </div>
                      </form>
                    </div>
                    <p>هر 1 کیلو - 1.500 تومان</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="sp-product-item mb-20">
                  <div class="sp-product-thumb">
                    <span class="batch discount">10%</span>
                    <a href="single-product.blade.php"><img src="img/product/sp_products08.png" alt=""></a>
                  </div>
                  <div class="sp-product-content">
                    <div class="rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                    <span class="product-status">موجود در انبار</span>
                    <div class="sp-cart-wrap">
                      <form action="#">
                        <div class="cart-plus-minus">
                          <input type="text" value="1">
                        </div>
                      </form>
                    </div>
                    <p>هر 1 کیلو - 1.500 تومان</p>
                  </div>
                </div>
              </div>
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
              <h5 class="code">ganic21abs</h5>
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
            <h2 class="title">نمایش بهترین پیشنهادات</h2>
          </div>
        </div>
        <div class="col-md-4 col-sm-3">
          <div class="section-btn text-right text-md-left">
            <a href="shop.html" class="btn">نمایش همه</a>
          </div>
        </div>
      </div>
      <div class="best-sellers-products">
        <div class="row justify-content-center">
          <div class="col-3">
            <div class="sp-product-item mb-20">
              <div class="sp-product-thumb">
                <span class="batch">جدید</span>
                <a href="single-product.blade.php"><img src="img/product/sp_products09.png" alt=""></a>
              </div>
              <div class="sp-product-content">
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                <span class="product-status">موجود در انبار</span>
                <div class="sp-cart-wrap">
                  <form action="#">
                    <div class="cart-plus-minus">
                      <input type="text" value="1">
                    </div>
                  </form>
                </div>
                <p>هر 1 کیلو - 1.500 تومان</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="sp-product-item mb-20">
              <div class="sp-product-thumb">
                <span class="batch discount">15%</span>
                <a href="single-product.blade.php"><img src="img/product/sp_products02.png" alt=""></a>
              </div>
              <div class="sp-product-content">
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                <span class="product-status">موجود در انبار</span>
                <div class="sp-cart-wrap">
                  <form action="#">
                    <div class="cart-plus-minus">
                      <input type="text" value="1">
                    </div>
                  </form>
                </div>
                <p>هر 1 کیلو - 1.500 تومان</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="sp-product-item mb-20">
              <div class="sp-product-thumb">
                <span class="batch discount">25%</span>
                <a href="single-product.blade.php"><img src="img/product/sp_products03.png" alt=""></a>
              </div>
              <div class="sp-product-content">
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                <span class="product-status">موجود در انبار</span>
                <div class="sp-cart-wrap">
                  <form action="#">
                    <div class="cart-plus-minus">
                      <input type="text" value="1">
                    </div>
                  </form>
                </div>
                <p>هر 1 کیلو - 1.500 تومان</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="sp-product-item mb-20">
              <div class="sp-product-thumb">
                <span class="batch">new</span>
                <a href="single-product.blade.php"><img src="img/product/sp_products04.png" alt=""></a>
              </div>
              <div class="sp-product-content">
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                <span class="product-status">موجود در انبار</span>
                <div class="sp-cart-wrap">
                  <form action="#">
                    <div class="cart-plus-minus">
                      <input type="text" value="1">
                    </div>
                  </form>
                </div>
                <p>هر 1 کیلو - 1.500 تومان</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="sp-product-item mb-20">
              <div class="sp-product-thumb">
                <span class="batch discount">25%</span>
                <a href="single-product.blade.php"><img src="img/product/sp_products05.png" alt=""></a>
              </div>
              <div class="sp-product-content">
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h6 class="title"><a href="single-product.blade.php">سوپ آماده گانیک</a></h6>
                <span class="product-status">موجود در انبار</span>
                <div class="sp-cart-wrap">
                  <form action="#">
                    <div class="cart-plus-minus">
                      <input type="text" value="1">
                    </div>
                  </form>
                </div>
                <p>هر 1 کیلو - 1.500 تومان</p>
              </div>
            </div>
          </div>
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
              <h4 class="title"><a href="shop.html">مزرعه ارگانیک برای گانیک</a></h4>
              <p>پیشنهاد فوق العاده تا 50٪ تخفیف</p>
              <a href="shop.html" class="btn rounded-btn">الان بخرید</a>
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
              <h4 class="title"><a href="shop.html">مزرعه ارگانیک برای گانیک</a></h4>
              <p>پیشنهاد فوق العاده تا 50٪ تخفیف</p>
              <a href="shop.html" class="btn rounded-btn">الان بخرید</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- discount-area-end -->

@endsection
