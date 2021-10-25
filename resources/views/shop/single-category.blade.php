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
              <a href="#" class="cat-toggle">فهرست زیردسته‌های&nbsp;<span style="color: red;">{{$category->name}}</span><i class="fas fa-angle-down"></i></a>
              <ul class="category-menu">

                @foreach($category->childrens as $child)
                  @if(\App\Models\Category::hasChildren($child))
                    <li class="menu-item-has-children">
                      <a href="shop.html">
                        {{$child->name}}
                      </a>
                      <ul class="megamenu">
                        <ul>
                          @foreach($child->childrens as $subchild)
                            <li class="sub-column-item">
                              <a href="shop.html" style="color: black">
                                {{$subchild->name}}
                              </a>
                            </li>
                          @endforeach
                        </ul>
                        </li>
                      </ul>
                    </li>
                  @else
                    <li>
                      <a href="shop.html">
                        {{$child->name}}
                      </a>
                    </li>
                  @endif
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-7">
            <div class="slider-active">

              @foreach($category_sliders as $category_slider)
                <div class="single-slider slider-bg" data-background="{{\Illuminate\Support\Facades\URL::to($category_slider->url)}}">
                  <div class="slider-content">
                    <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">{{$category_slider->subtitle}}</h5>
                    <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{$category_slider->title}}</h2>
                    <p data-animation="fadeInUp" data-delay=".6s">{{$category_slider->description}}</p>
                    <a href="{{\Illuminate\Support\Facades\URL::to($category_slider->link)}}" class="btn" data-animation="fadeInUp" data-delay=".8s">الان بخرید</a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>


      <!-- best-deal-area -->
      <div class="container custom-container">
        <div class="slider-category-wrap-amazing">
          <section class="best-deal-area pt-60 pb-80">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                  <div class="best-deal-top-wrap">
                    <div class="bd-section-title">
                      <h3 class="title"> محصولات شگفت‌انگیز &nbsp;<span>این ماه!</span></h3>
                      <p>هر هفته تخفیفات عالی برای محصولات برتر</p>
                    </div>
                    <div class="coming-time" data-countdown="2025/10/20"></div>
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
        </div>
      </div>
      <!-- best-deal-area-end -->


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
                  <a href="cart.html" class="wishlist"><i class="flaticon-heart-shape-outline"></i></a>
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
                    <li class="read-more"><a href="blog-details.html">بیشتر بدانید
                        <i class="fas fa-angle-double-left"></i></a></li>
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
                    <li class="read-more"><a href="blog-details.html">بیشتر بدانید
                        <i class="fas fa-angle-double-left"></i></a></li>
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
                    <li class="read-more"><a href="blog-details.html">بیشتر بدانید
                        <i class="fas fa-angle-double-left"></i></a></li>
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
