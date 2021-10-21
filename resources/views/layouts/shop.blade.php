<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>فروشگاه پارادایس - @yield('title')</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  <!-- Place favicon.ico in the root directory -->

  <!-- CSS here -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('css/default.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/search-box.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>

<body>
<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
  <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

<!-- header-area -->
<header>

  <!-- header-message -->
  <div class="header-message-wrap">
    <div class="container custom-container">
      <div class="row">
        <div class="col-12">
          <div class="top-notify-message">
            <p>ارسال رایگان برای همه اقلام و همه سفارشات در سراسر کشور</p>
            <span class="message-remove">X</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- header-message-end -->

  <!-- header-top-start -->
  <div class="header-top-wrap">
    <div class="container custom-container">
      <div class="row align-items-center">
        <div class="col-md-7">
          <div class="header-top-left">
            <ul>
              <li class="header-top-lang">
                <div class="dropdown">
                  <button class="dropdown-toggle" type="button" id="dropdownMenuButton2"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">پارسی
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <a class="dropdown-item" href="home.blade.php">انگلیسی</a>
                    <a class="dropdown-item" href="home.blade.php">چینی</a>
                    <a class="dropdown-item" href="home.blade.php">ژاپنی</a>
                  </div>
                </div>
              </li>
              <li class="header-top-currency">
                <div class="dropdown">
                  <button class="dropdown-toggle" type="button" id="dropdownMenuButton3"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">تومان
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                    <a class="dropdown-item" href="home.blade.php">دلار</a>
                    <a class="dropdown-item" href="home.blade.php">یورو</a>
                    <a class="dropdown-item" href="home.blade.php">پوند</a>
                  </div>
                </div>
              </li>
              <li class="header-work-time">
                ساعات کاری: <span> شنبه تا چهارشنبه : 8:00 - 21:0</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-5">
          <div class="header-top-right">
            <ul>
              <li><a href="#">ارتباط با ما</a></li>
              <li><a href="#">درباره ما</a></li>
              <li><a href="#">حساب کاربری</a></li>
              <li><a href="#">پرسش های متداول</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- header-top-end -->

  <!-- header-search-area -->
  <div class="header-search-area">
    <div class="container custom-container">
      <div class="row align-items-center">
        <div class="col-xl-2 col-lg-3 d-none d-lg-block">
          <div class="logo">
            <a href="{{ route('home') }}"><img src="{{asset('img/logo/logo.png')}}" alt=""></a>
          </div>
        </div>
        <div class="col-xl-10 col-lg-9">
          <div class="d-block d-sm-flex align-items-center justify-content-end">
            <div class="header-search-wrap">
              <form autocomplete="off" action="/action_page.php">
                <select class="custom-select">
                  <option selected>همه دسته بندیها</option>
                  <option>-- مواد غذایی و یخ زده</option>
                  <option>-- میوه های تازه</option>
                  <option>-- ماهی تازه</option>
                  <option>-- آجیل تازه</option>
                  <option>-- گوشت تازه</option>
                  <option>-- نان و نانوایی</option>
                  <option>-- سبزیجات</option>
                  <option>-- غذای بچه ها</option>
                  <option>-- میوه های خشک</option>
                  <option>-- دیگر غذاها</option>
                </select>


                  <div class="autocomplete" style="width:350px;">
                    <input name="searchProducts" id="searchProducts" type="text" placeholder="جستجوی محصول مورد نظر..." style="width:345px;">
                  </div>
                <button type="submit"><i class="flaticon-loupe-1"></i></button>
              </form>


            </div>
            <div class="header-action">
              <ul>
                <li class="header-phone">
                  <div class="icon"><i class="flaticon-telephone"></i></div>
                  <a href="tel:1234566789"><span>سوالی دارید، مطرح کنید</span>+185 4124 650</a>
                </li>
                <li class="header-user"><a href="#"><i class="flaticon-user"></i></a></li>
                <li class="header-wishlist">
                  <a href="#"><i class="flaticon-heart-shape-outline"></i></a>
                  <span class="item-count">0</span>
                </li>
                <li class="header-cart-action">
                  <div class="header-cart-wrap">
                    <a href="cart.html"><i class="flaticon-shopping-basket"></i></a>
                    <span class="item-count">2</span>
                    <ul class="minicart">
                      <li class="d-flex align-items-start">
                        <div class="cart-img">
                          <a href="single-product.blade.php"><img src="{{asset('img/product/cart_p01.jpg')}}"
                                                                  alt=""></a>
                        </div>
                        <div class="cart-content">
                          <h4><a href="single-product.blade.php">آجیل تازه مزرعه ارگانیک</a></h4>
                          <div class="cart-price">
                            <span class="new">22.000 تومان</span>
                            <span><del>22.000 تومان</del></span>
                          </div>
                        </div>
                        <div class="del-icon">
                          <a href="#"><i class="far fa-trash-alt"></i></a>
                        </div>
                      </li>
                      <li class="d-flex align-items-start">
                        <div class="cart-img">
                          <a href="single-product.blade.php"><img src="{{asset('img/product/cart_p02.jpg')}}"
                                                                  alt=""></a>
                        </div>
                        <div class="cart-content">
                          <h4><a href="single-product.blade.php">آجیل تازه مزرعه ارگانیک</a></h4>
                          <div class="cart-price">
                            <span class="new">22.000 تومان</span>
                            <span><del>22.000 تومان</del></span>
                          </div>
                        </div>
                        <div class="del-icon">
                          <a href="#"><i class="far fa-trash-alt"></i></a>
                        </div>
                      </li>
                      <li>
                        <div class="total-price">
                          <span class="f-left">مجموع:</span>
                          <span class="f-right">44.000 تومان</span>
                        </div>
                      </li>
                      <li>
                        <div class="checkout-link">
                          <a href="cart.html">سبد خرید</a>
                          <a class="black-color" href="checkout.html">صورتحساب</a>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="cart-amount">44.000 تومان</div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- header-search-area-end -->

  <div id="sticky-header" class="menu-area">
    <div class="container custom-container">
      <div class="row">
        <div class="col-12">
          <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
          <div class="menu-wrap">
            <nav class="menu-nav">
              <div class="logo d-block d-lg-none">
                <a href="home.blade.php"><img src="{{asset('img/logo/logo.png')}}" alt=""></a>
              </div>
              <div class="header-category d-none d-lg-block">
                <a href="/categories/main" class="cat-toggle"><i class="fas fa-bars"></i>همه دسته بندیها<i
                    class="fas fa-angle-down"></i></a>

                <style>
                  .product-count {
                    border-radius: 4px;
                    font-size: 12px;
                    font-weight: 700;
                    background: var(--red);
                    color: #fff;
                    padding: 6px 6px;
                    min-width: 30px;
                    text-align: center;
                    z-index: 1;
                    line-height: 1;
                  }

                </style>

                <ul class="category-menu">
                  @foreach($categories as $category)
                    @if($category->parent_id === 0 and \App\Models\Category::hasChildren($category))
                      <li class="menu-item-has-children">
                        <a href="/category/{{$category->slug}}">
                          <i class="{{$category->icon}}"></i>{{$category->name}}
                          &nbsp;&nbsp;
                          <span class="product-count" style="display: inline-block;">
                              {{\App\Models\Category::countCategoryProducts($category)}}
                              تا
                            </span>
                        </a>
                        <ul class="megamenu">


                          @foreach($category->childrens as $children)
                            <li class="sub-column-item">
                              <a href="shop.html">
                                {{$children->name}}
                              </a>
                              <ul>

                                @foreach($children->childrens as $subchildren)
                                  <li>
                                    <a href="shop.html">
                                      {{$subchildren->name}}
                                    </a>
                                  </li>
                                @endforeach
                              </ul>
                            </li>
                          @endforeach
                        </ul>
                      </li>
                    @elseif($category->parent_id === 0 && !\App\Models\Category::hasChildren($category))
                      <li>
                        <a href="/categories/{{$category->slug}}">
                          <i class="{{$category->icon}}"></i>{{$category->name}}
                          &nbsp;&nbsp;
                          <span class="product-count" style="display: inline-block;">
                              {{\App\Models\Category::countCategoryProducts($category)}}
                              تا
                            </span>
                        </a>
                      </li>
                    @endif
                  @endforeach
                </ul>
              </div>
              <div class="navbar-wrap main-menu d-none d-lg-flex">
                <ul class="navigation">
                  <li class="menu-item-has-children active"><a href="#">صفحه نخست</a>
                    <ul class="submenu">
                      <li class="active"><a href="home.blade.php">صفحه نخست یک</a></li>
                      <li><a href="index-2.html">صفحه نخست دو</a></li>
                    </ul>
                  </li>
                  <li><a href="about-us.html">درباره ما</a></li>
                  <li><a href="shop.html">محصولات</a></li>
                  <li><a href="shop-right-sidebar.html">خواربار فروشی و غذاهای اصلی</a></li>
                  <li class="menu-item-has-children"><a href="#">صفحات</a>
                    <ul class="submenu">
                      <li><a href="single-product.blade.php">نمونه محصول</a></li>
                      <li><a href="cart.html">سبد خرید</a></li>
                      <li><a href="checkout.html">صورتحساب</a></li>
                      <li><a href="blog.html">وبلاگ</a></li>
                      <li><a href="blog-details.html">نوشته وبلاگ</a></li>
                      <li><a href="404.html">404</a></li>
                      <li><a href="terms-conditios.html">شرایط و ضوابط</a></li>
                    </ul>
                  </li>
                  <li><a href="contact.html">ارتباط با ما</a></li>
                </ul>
              </div>
              <div class="header-super-store d-none d-xl-block d-lg-none d-md-block">
                <div class="dropdown">
                  <button class="dropdown-toggle" type="button" id="dropdownMenuButton4"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                      class="flaticon-shop"></i> فروشگاه اینترنتی
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                    <a class="dropdown-item" href="shop.html">فروشگاه اینترنتی 01</a>
                    <a class="dropdown-item" href="shop.html">فروشگاه اینترنتی 02</a>
                    <a class="dropdown-item" href="shop.html">فروشگاه اینترنتی 03</a>
                  </div>
                </div>
              </div>
            </nav>
          </div>
          <!-- Mobile Menu  -->
          <div class="mobile-menu">
            <nav class="menu-box">
              <div class="close-btn"><i class="fas fa-times"></i></div>
              <div class="nav-logo"><a href="home.blade.php"><img src="{{asset('img/logo/logo.png')}}" alt="" title=""></a>
              </div>
              <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
              </div>
              <div class="social-links">
                <ul class="clearfix">
                  <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                  <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                  <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                  <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                  <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="menu-backdrop"></div>
          <!-- End Mobile Menu -->
        </div>
      </div>
    </div>
  </div>
</header>
<!-- header-area-end -->

<!-- main-area -->
<main>
  @yield('content')
</main>
<!-- main-area-end -->


<!-- footer-area -->
<footer>
  <div class="footer-area gray-bg pt-80 pb-30">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-xl-3 col-lg-4 col-md-6">
          <div class="footer-widget mb-50">
            <div class="footer-logo mb-25">
              <a href="home.blade.php"><img src="{{asset('img/logo/logo.png')}}" alt=""></a>
            </div>
            <div class="footer-contact-list">
              <ul>
                <li>
                  <div class="icon"><i class="flaticon-place"></i></div>
                  <p>ایران، تهران، خیابان یک، کوچه یک</p>
                </li>
                <li>
                  <div class="icon"><i class="flaticon-telephone-1"></i></div>
                  <h5 class="number"><a href="tel:12027993245">+120 279 932 45</a></h5>
                </li>
                <li>
                  <div class="icon"><i class="flaticon-mail"></i></div>
                  <p><a href=""><span class="__cf_email__"
                                      data-cfemail="70030500001f020430061517151e5e131f1d">[email&#160;protected]</span></a>
                  </p>
                </li>
                <li>
                  <div class="icon"><i class="flaticon-wall-clock"></i></div>
                  <p>7 روز هفته از 7:00 تا 20:00</p>
                </li>
              </ul>
            </div>
            <div class="footer-social">
              <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
          <div class="footer-widget mb-50">
            <div class="fw-title">
              <h5 class="title">خدمات مشتری</h5>
            </div>
            <div class="fw-link">
              <ul>
                <li><a href="shop.html">امنیت در خرید</a></li>
                <li><a href="cart.html">وضعیت سفارشات</a></li>
                <li><a href="shop.html">حمل و نقل بین المللی</a></li>
                <li><a href="checkout.html">شیوه پرداخت</a></li>
                <li><a href="blog.html">وبلاگ</a></li>
                <li><a href="terms-conditios.html">سفارشات و بازگشتی ها</a></li>
                <li><a href="checkout.html">رهگیری سفارشات</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
          <div class="footer-widget mb-50">
            <div class="fw-title">
              <h5 class="title">صفحات</h5>
            </div>
            <div class="fw-link">
              <ul>
                <li><a href="checkout.html">تحویل کالا</a></li>
                <li><a href="terms-conditios.html">اطلاع قانونی</a></li>
                <li><a href="about-us.html">درباره ما</a></li>
                <li><a href="contact.html">نقشه سایت</a></li>
                <li><a href="checkout.html">رهگیری سفارشات</a></li>
                <li><a href="terms-conditios.html">سفارشات</a></li>
                <li><a href="contact.html">ارتباط با ما</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="footer-widget footer-box-widget mb-50">
            <div class="f-download-wrap">
              <div class="fw-title">
                <h5 class="title">دریافت اپلیکیشن</h5>
              </div>
              <div class="download-btns">
                <a href="home.blade.php"><img src="{{asset('img/icon/g_play.png')}}" alt=""></a>
                <a href="home.blade.php"><img src="{{asset('img/icon/app_store.png')}}" alt=""></a>
              </div>
            </div>
            <div class="f-newsletter">
              <div class="fw-title">
                <h5 class="title">عضویت در خبرنامه</h5>
              </div>
              <form action="#">
                <input type="email" placeholder="آدرس ایمیل">
                <button><i class="flaticon-send"></i></button>
              </form>
              <p>نامه خود را نشان ندهید</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-wrap">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="copyright-text">
            <p>کپی رایت &copy; 2021. کلیه حقوق محفوظ است</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="payment-accepted text-center text-md-left">
            <img src="{{asset('img/images/payment_card.png')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- footer-area-end -->

<!-- JS here -->
<script src="{{asset('js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/ajax-form.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/search-box.js')}}"></script>
</body>

</html>
