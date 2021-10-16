@extends('layouts.shop')

@section('title', "دسته $category->name")

@section('content')

<!-- main-area -->
<main>
  <!-- slider-area -->
  <section class="slider--area" data-background="{{asset('img/bg/slider_area_bg.jpg')}}">
    <div class="container custom-container">
      <div class="row">
        <div class="col-3 d-none d-lg-block">
          <div class="header-category">
            <a href="#" class="cat-toggle"><i class="fas fa-bars"></i>همه دسته بندیها<i class="fas fa-angle-down"></i></a>
            <ul class="category-menu">
              <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-groceries"></i> مواد غذایی و یخ زده</a>
                <ul class="megamenu">
                  <li class="sub-column-item"><a href="shop.html">مواد غذایی و یخ زده</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">میوه های تازه ارگانیک</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">نان و نانوایی تازه</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">گوشت تازه ارگانیک</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">میوه خشک ارگانیک</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">سایر غذاهای ارگانیک</a>
                    <ul>
                      <li class="mega-menu-banner"><a href="shop.html"><img src="{{asset("img/images/megamenu_banner.jpg")}}" alt=""></a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="shop.html"><i class="flaticon-cherry"></i> میوه های تازه</a></li>
              <li><a href="shop.html"><i class="flaticon-fish"></i> ماهی تازه</a></li>
              <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-hazelnut"></i> آجیل تازه</a>
                <ul class="megamenu">
                  <li class="sub-column-item"><a href="shop.html">مواد غذایی و یخ زده</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">میوه های تازه ارگانیک</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">نان و نانوایی تازه</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">گوشت تازه ارگانیک</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">میوه خشک ارگانیک</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">سایر غذاهای ارگانیک</a>
                    <ul>
                      <li class="mega-menu-banner"><a href="shop.html"><img src="{{asset("img/images/megamenu_banner02.jpg")}}" alt=""></a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="shop.html"><i class="flaticon-meat"></i> گوشت تازه</a></li>
              <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-cupcake"></i> نان و نانوایی</a>
                <ul class="megamenu">
                  <li class="sub-column-item"><a href="shop.html">مواد غذایی و یخ زده</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">میوه های تازه ارگانیک</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">نان و نانوایی تازه</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">گوشت تازه ارگانیک</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">میوه خشک ارگانیک</a>
                    <ul>
                      <li><a href="shop.html">کلم بروکلی ارگانیک</a></li>
                      <li><a href="shop.html">گردو مکس</a></li>
                      <li><a href="shop.html">مت نارنجی</a></li>
                      <li><a href="shop.html">سیب زمینی فرانسه</a></li>
                    </ul>
                  </li>
                  <li class="sub-column-item"><a href="shop.html">سایر غذاهای ارگانیک</a>
                    <ul>
                      <li class="mega-menu-banner"><a href="shop.html"><img src="{{asset("img/images/megamenu_banner.jpg")}}" alt=""></a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="shop.html"><i class="flaticon-broccoli"></i> سبزیجات</a></li>
              <li><a href="shop.html"><i class="flaticon-pop-corn-1"></i> ذرت بو داده</a></li>
              <li><a href="shop.html"><i class="flaticon-nut"></i> میوه خشک شده</a></li>
            </ul>
          </div>
        </div>
        <div class="col-7">
          <div class="slider-active">
            <div class="single-slider slider-bg content-right" data-background="{{asset('img/slider/slider__bg01.jpg')}}">
              <div class="slider-content">
                <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">پیشنهاد ویژه !</h5>
                <h2 class="title" data-animation="fadeInUp" data-delay=".4s">غذای ارگانیک</h2>
                <p data-animation="fadeInUp" data-delay=".6s">فقط تا امروز 50٪ تخفیف بگیرید</p>
                <a href="shop.html" class="btn" data-animation="fadeInUp" data-delay=".8s">الان بخرید</a>
              </div>
            </div>
            <div class="single-slider slider-bg" data-background="{{asset('img/slider/slider__bg02.jpg')}}">
              <div class="slider-content">
                <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">پیشنهاد ویژه !</h5>
                <h2 class="title" data-animation="fadeInUp" data-delay=".4s">غذای ارگانیک</h2>
                <p data-animation="fadeInUp" data-delay=".6s">فقط تا امروز 50٪ تخفیف بگیرید</p>
                <a href="shop.html" class="btn" data-animation="fadeInUp" data-delay=".8s">الان بخرید</a>
              </div>
            </div>
            <div class="single-slider slider-bg" data-background="{{asset('img/slider/slider__bg03.jpg')}}">
              <div class="slider-content">
                <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">پیشنهاد ویژه !</h5>
                <h2 class="title" data-animation="fadeInUp" data-delay=".4s">غذای ارگانیک</h2>
                <p data-animation="fadeInUp" data-delay=".6s">فقط تا امروز 50٪ تخفیف بگیرید</p>
                <a href="shop.html" class="btn" data-animation="fadeInUp" data-delay=".8s">الان بخرید</a>
              </div>
            </div>
            <div class="single-slider slider-bg" data-background="{{asset('img/slider/slider__bg04.jpg')}}">
              <div class="slider-content">
                <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">پیشنهاد ویژه !</h5>
                <h2 class="title" data-animation="fadeInUp" data-delay=".4s">غذای ارگانیک</h2>
                <p data-animation="fadeInUp" data-delay=".6s">فقط تا امروز 50٪ تخفیف بگیرید</p>
                <a href="shop.html" class="btn" data-animation="fadeInUp" data-delay=".8s">الان بخرید</a>
              </div>
            </div>
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
                <img src="{{asset("img/product/category_img01.png")}}" alt="">
              </div>
              <div class="category-content">
                <h6 class="title">آب میوه و نوشیدنی</h6>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="category-item">
              <a href="shop.html" class="category-link"></a>
              <div class="category-thumb">
                <img src="{{asset("img/product/category_img02.png")}}" alt="">
              </div>
              <div class="category-content">
                <h6 class="title">سبزیجات</h6>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="category-item">
              <a href="shop.html" class="category-link"></a>
              <div class="category-thumb">
                <img src="{{asset("img/product/category_img03.png")}}" alt="">
              </div>
              <div class="category-content">
                <h6 class="title">آجیل تازه</h6>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="category-item">
              <a href="shop.html" class="category-link"></a>
              <div class="category-thumb">
                <img src="{{asset("img/product/category_img04.png")}}" alt="">
              </div>
              <div class="category-content">
                <h6 class="title">گردو تازه</h6>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="category-item">
              <a href="shop.html" class="category-link"></a>
              <div class="category-thumb">
                <img src="{{asset("img/product/category_img05.png")}}" alt="">
              </div>
              <div class="category-content">
                <h6 class="title">گوشت تازه</h6>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="category-item">
              <a href="shop.html" class="category-link"></a>
              <div class="category-thumb">
                <img src="{{asset("img/product/category_img06.png")}}" alt="">
              </div>
              <div class="category-content">
                <h6 class="title">پودرها</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- category-area-end -->

  </section>
  <!-- slider-area-end -->

  <!-- special-products-area -->
  <section class="special--products-area pt-70 pb-30">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10">
          <div class="section-title section-title-two text-center mb-30">
            <span class="sub-title">فروشگاه عالی</span>
            <h2 class="title">محصولات ویژه ما</h2>
          </div>
          <div class="special--product-nav">
            <button class="active" data-filter="*">ویژه</button>
            <button class="" data-filter=".cat-one">پرفروش</button>
            <button class="" data-filter=".cat-two">جدید ترین ها</button>
          </div>
        </div>
      </div>
      <div class="row special--product-active">
        <div class="col-xl-3 col-md-4 col-sm-6 grid-item grid-sizer cat-two">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <span class="batch">-20 %</span>
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/sp__products01.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">هندوانه</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 grid-item grid-sizer cat-one">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/sp__products02.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">هندوانه</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 grid-item grid-sizer cat-two">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/sp__products03.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">هندوانه</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 grid-item grid-sizer cat-one">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <span class="batch new">جدید</span>
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/sp__products04.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">هندوانه</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 grid-item grid-sizer cat-one cat-two">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/sp__products05.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">هندوانه</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 grid-item grid-sizer cat-one">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/sp__products06.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">هندوانه</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 grid-item grid-sizer cat-one cat-two">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <span class="batch new">جدید</span>
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/sp__products07.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">هندوانه</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 grid-item grid-sizer cat-one cat-two">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/sp__products08.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">هندوانه</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- special-products-area-end -->

  <!-- discount-time-area -->
  <section class="discount-time-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="discount-time-bg">
            <div class="discount-time-img left"><img src="{{asset("img/images/discount_count_shape01.png")}}" class="wow rollIn" data-wow-delay=".3s" alt=""></div>
            <div class="discount-time-img right"><img src="{{asset("img/images/discount_count_shape02.png")}}" alt=""></div>
            <div class="discount-time-content">
              <div class="section-title section-title-two text-center mb-25">
                <span class="sub-title">تخفیف بگیرید</span>
                <h2 class="title">بهترین تخفیفات این هفته!</h2>
              </div>
              <div class="coming-time" data-countdown="2025/10/20"></div>
              <a href="shop.html" class="btn">الان بخرید</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- discount-time-area-end -->

  <!-- bd-week-area -->
  <section class="bd-week-area pt-70 pb-30">
    <div class="container">
      <div class="row align-items-end mb-50">
        <div class="col-md-8 col-sm-9">
          <div class="section-title section-title-two">
            <span class="sub-title">تخفیف فصل</span>
            <h2 class="title">بهترین تخفیفات این هفته!</h2>
          </div>
        </div>
        <div class="col-md-4 col-sm-3">
          <div class="section-btn-link text-right text-md-left">
            <a href="shop.html">همه محصولات <i class="fas fa-angle-double-left"></i></a>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-3 col-md-4 col-sm-6">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/bdw_products01.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">کلم بروکلی ارگانیک</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/bdw_products02.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">کلم بروکلی ارگانیک</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <span class="batch new">جدید</span>
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/bdw_products03.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">کلم بروکلی ارگانیک</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
          <div class="sp--product--item mb-50">
            <div class="sp--product--thumb">
              <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
              <a href="shop-details.html"><img src="{{asset("img/product/bdw_products04.png")}}" alt=""></a>
            </div>
            <div class="sp--product--content">
              <h6 class="title"><a href="shop-details.html">کلم بروکلی ارگانیک</a></h6>
              <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">هر کیلو 1.500 تومان</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- bd-week-area-end -->

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
              <h2 class="title"><span>دانلود</span> اپلیکیشن گانیک</h2>
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

  <!-- blog-area -->
  <section class="blog-area pt-70 pb-50">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8 col-md-10">
          <div class="section-title section-title-two text-center mb-50">
            <span class="sub-title">مقالات ما</span>
            <h2 class="title">آخرین اخبار ما</h2>
            <p>غذای ارگانیک غذایی است که با روش هایی مطابق با استانداردهای کشاورزی ارگانیک در سراسر جهان تولید می شود</p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-9">
          <div class="blog-post-item mb-30">
            <div class="blog-post-thumb">
              <a href="blog-details.html"><img src="{{asset("img/blog/blog_post_thumb01.jpg")}}" alt=""></a>
            </div>
            <div class="blog-post-content">
              <div class="blog-post-date">03 <span>خرداد</span></div>
              <div class="blog-post-meta">
                <ul>
                  <li><a href="blog-details.html">فلان فلانی نسب</a></li>
                  <li><a href="blog-details.html">03 دیدگاه</a></li>
                </ul>
              </div>
              <h4 class="title"><a href="blog-details.html">بهترین راه ها برای حمایت از سیستم ایمنی</a></h4>
              <div class="blog-post-bottom">
                <ul>
                  <li class="read-more"><a href="blog-details.html">بیشتر بدانید <i class="fas fa-angle-double-left"></i></a></li>
                  <li class="share-btn"><a href="blog-details.html"><i class="fas fa-share-alt"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-9">
          <div class="blog-post-item mb-30">
            <div class="blog-post-thumb">
              <a href="blog-details.html"><img src="{{asset("img/blog/blog_post_thumb02.jpg")}}" alt=""></a>
            </div>
            <div class="blog-post-content">
              <div class="blog-post-date">03 <span>خرداد</span></div>
              <div class="blog-post-meta">
                <ul>
                  <li><a href="blog-details.html">فلان فلانی نسب</a></li>
                  <li><a href="blog-details.html">03 دیدگاه</a></li>
                </ul>
              </div>
              <h4 class="title"><a href="blog-details.html">بهترین راه ها برای حمایت از سیستم ایمنی</a></h4>
              <div class="blog-post-bottom">
                <ul>
                  <li class="read-more"><a href="blog-details.html">بیشتر بدانید <i class="fas fa-angle-double-left"></i></a></li>
                  <li class="share-btn"><a href="blog-details.html"><i class="fas fa-share-alt"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-9">
          <div class="blog-post-item mb-30">
            <div class="blog-post-thumb">
              <a href="blog-details.html"><img src="{{asset("img/blog/blog_post_thumb03.jpg")}}" alt=""></a>
            </div>
            <div class="blog-post-content">
              <div class="blog-post-date">03 <span>خرداد</span></div>
              <div class="blog-post-meta">
                <ul>
                  <li><a href="blog-details.html">فلان فلانی نسب</a></li>
                  <li><a href="blog-details.html">03 دیدگاه</a></li>
                </ul>
              </div>
              <h4 class="title"><a href="blog-details.html">بهترین راه ها برای حمایت از سیستم ایمنی</a></h4>
              <div class="blog-post-bottom">
                <ul>
                  <li class="read-more"><a href="blog-details.html">بیشتر بدانید <i class="fas fa-angle-double-left"></i></a></li>
                  <li class="share-btn"><a href="blog-details.html"><i class="fas fa-share-alt"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- blog-area-end -->

</main>
<!-- main-area-end -->

@endsection
