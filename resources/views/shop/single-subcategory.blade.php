@extends('layouts.shop')

@section('title', "محصولات گروه $category->name")

@section('content')

  <!-- main-area -->
  <main>

    <!-- breadcrumb-area -->
    <div class="breadcrumb-area breadcrumb-bg-two">
      <div class="container custom-container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumb-content">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home.html">صفحه نخست</a></li>
                  <li class="breadcrumb-item"><a href="shop.html">محصولات</a></li>
                  <li class="breadcrumb-item active" aria-current="page">محصولات</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- shop-area -->
    <section class="shop--area pt-90 pb-90">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-3 order-2 order-lg-0">
            <aside class="shop-sidebar">
              <div class="widget shop-widget">
                <div class="shop-widget-title">
                  <h6 class="title">دسته بندی محصولات</h6>
                </div>
                <div class="shop-cat-list">
                  <ul>
                    @if(\App\Models\Category::countCategoryParent($category) == 2)
                      <li><a href="shop.html" style="color: green;">{{ $category->name }}<span>+</span></a></li>
                      <ul id="child-category">
                        @foreach($category->childrens as $child)
                          <li><a href="shop.html">{{ $child->name }} <span>+</span></a></li>
                        @endforeach
                      </ul>
                    @elseif(\App\Models\Category::countCategoryParent($category) == 3)
                      <li><a href="shop.html">{{ $category->parent->name }}<span>+</span></a></li>
                      <ul id="child-category">
                        @foreach($brother_categories as $brother_category)
                          <li>
                            <a href="shop.html" style="{{($category->name == $brother_category->name) ? 'color:green' : ''}}">{{ $brother_category->name }}
                              <span>+</span></a></li>
                        @endforeach
                      </ul>
                    @endif
                    {{--                  <li><a href="shop.html">غذاهای اصلی <span>+</span></a></li>--}}

                    {{--                  <ul id="child-category">--}}
                    {{--                    <li><a href="shop.html">غذاهای اصلی <span>+</span></a></li>--}}
                    {{--                  </ul>--}}

                    {{--                  <li><a href="shop.html">سبزیجات <span>+</span></a></li>--}}
                    {{--                  <li><a href="shop.html">ادویه جات غذایی <span>+</span></a></li>--}}
                    {{--                  <li><a href="shop.html">لبنیات <span>+</span></a></li>--}}
                    {{--                  <li><a href="shop.html">غذای بچه <span>+</span></a></li>--}}
                    {{--                  <li><a href="shop.html">لوازم آشپزخانه <span>+</span></a></li>--}}
                  </ul>
                </div>
              </div>
              <div class="widget shop-widget">
                <div class="shop-widget-title">
                  <h6 class="title">محدودیت قیمت</h6>
                </div>
                <div class="price_filter">
                  <div id="slider-range"></div>
                  <div class="price_slider_amount">
                    <span>قیمت :</span>
                    <input type="text" id="amount" name="price" placeholder="قیمت"/>
                  </div>
                </div>
              </div>
              <div class="widget shop-widget">
                <div class="shop-widget-title">
                  <h6 class="title">محصولات جدید</h6>
                </div>
                <div class="sidebar-product-list">
                  <ul>
                    <li>
                      <div class="sidebar-product-thumb">
                        <a href="shop-details.html"><img src="img/product/sidebar_product01.jpg" alt=""></a>
                      </div>
                      <div class="sidebar-product-content">
                        <div class="rating">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </div>
                        <h5><a href="shop-details.html">محصولات نارنجی وانلا</a></h5>
                        <span>20.000 تومان</span>
                      </div>
                    </li>
                    <li>
                      <div class="sidebar-product-thumb">
                        <a href="shop-details.html"><img src="img/product/sidebar_product02.jpg" alt=""></a>
                      </div>
                      <div class="sidebar-product-content">
                        <div class="rating">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </div>
                        <h5><a href="shop-details.html">محصولات نارنجی وانلا</a></h5>
                        <span>20.000 تومان</span>
                      </div>
                    </li>
                    <li>
                      <div class="sidebar-product-thumb">
                        <a href="shop-details.html"><img src="img/product/sidebar_product03.jpg" alt=""></a>
                      </div>
                      <div class="sidebar-product-content">
                        <div class="rating">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </div>
                        <h5><a href="shop-details.html">محصولات نارنجی وانلا</a></h5>
                        <span>20.000 تومان</span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="widget shop-widget">
                <div class="shop-widget-title">
                  <h6 class="title">برندها</h6>
                </div>
                <div class="shop-cat-list">
                  <ul>
                    <li><a href="shop.html">آدارا <span>+</span></a></li>
                    <li><a href="shop.html">میخک <span>+</span></a></li>
                    <li><a href="shop.html">ما فراتر <span>+</span></a></li>
                    <li><a href="shop.html">آگریفرام <span>+</span></a></li>
                  </ul>
                </div>
              </div>
              <div class="widget">
                <div class="shop-widget-banner text-center">
                  <a href="shop.html"><img src="img/product/sidebar_shop_ad.jpg" alt=""></a>
                </div>
              </div>
            </aside>
          </div>
          <div class="col-9">
            <div class="shop-discount-area">
              <div class="discount-content shop-discount-content">
                <span>غذای سالم</span>
                <h4 class="title"><a href="shop.html">مزرعه ارگانیک برای گانیک</a></h4>
                <p>پیشنهاد فوق العاده تا 50٪ تخفیف</p>
                <a href="shop.html" class="btn rounded-btn">الان بخرید</a>
              </div>
            </div>
            <div class="shop-top-meta mb-30">
              <div class="row">
                <div class="col-md-6 col-sm-7">
                  <div class="shop-top-left">
                    <ul>
                      <li><a href="#"><i class="fas fa-bars"></i> فیلتر محصولات</a></li>
                      <li>نمایش 1 تا 9 از 80 نتیجه</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6 col-sm-5">
                  <div class="shop-top-right">
                    <form action="{{ route('categories.show', $category) }}" method="get">
                      <select name="orderBy" onchange='if(this.value != 0) { this.form.submit(); }'>
                        <option disabled>مرتب سازی بر اساس:</option>
                        <option @if(request()->get('orderBy') == 'newest') selected @endif value="newest">جدیدترین‌ها</option>
                        <option @if(request()->get('orderBy') == 'visits') selected @endif value="visits">پربازدیدترین‌ها</option>
                        <option @if(request()->get('orderBy') == 'sales') selected @endif value="sales">پرفروش‌ترین‌ها</option>
                        <option @if(request()->get('orderBy') == 'cheapest') selected @endif value="cheapest">ارزان‌ترین‌ها</option>
                        <option @if(request()->get('orderBy') == 'expensive') selected @endif value="expensive">گران‌ترین‌ها</option>
                        <option @if(request()->get('orderBy') == 'like') selected @endif value="">محبوب‌ترین‌ها</option>
                      </select>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="shop-products-wrap">
              <div class="row justify-content-center">

                @foreach($products as $product)
                  <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="sp-product-item">
                      <div class="sp-product-thumb">
                        <span class="batch">جدید</span>
                        <a href="{{ \Illuminate\Support\Facades\URL::to('product/'.$product->slug) }}"><img src="{{ $product->primary_image ?: asset('img/product/sp_products09.png') }}" alt=""></a>
                      </div>
                      <div class="sp-product-content">
                        <div class="rating">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </div>
                        <h6 class="title"><a href="{{ \Illuminate\Support\Facades\URL::to('product/'.$product->slug) }}">{{ $product->fa_title }}</a></h6>
                        <span class="product-status">
                          @if($product->is_inventory)
                            <span>موجود</span>
                          @else
                            <span style="color: red">ناموجود</span>
                          @endif
                        </span>
                        <div class="sp-cart-wrap">
                          <form action="#">
                            <div class="cart-plus-minus">
                              <input type="text" value="1">
                            </div>
                          </form>
                        </div>
                        <p>{{ number_format($product->price) }} تومان</p>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="pagination-wrap">

              <div style="text-align: center">
                {{ $products->links() }}
              </div>

              <ul>
                <li class="prev"><a href="shop.html">قدیمی تر</a></li>
                <li><a href="shop.html">1</a></li>
                <li class="active"><a href="shop.html">2</a></li>
                <li><a href="shop.html">3</a></li>
                <li><a href="shop.html">4</a></li>
                <li><a href="shop.html">...</a></li>
                <li><a href="shop.html">10</a></li>
                <li class="next"><a href="shop.html">جدیدتر</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- shop-area-end -->

  </main>
  <!-- main-area-end -->

@endsection
