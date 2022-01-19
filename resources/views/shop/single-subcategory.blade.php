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
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">صفحه نخست</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('category/main') }}">محصولات</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
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
                      <li><a href="{{ url("category/$category->slug") }}" style="color: green;">{{ $category->name }}</a></li>
                      <ul id="child-category">
                        @foreach($category->childrens as $child)
                          <li><a href="{{ url("category/$child->slug") }}">{{ $child->name }} </a></li>
                        @endforeach
                      </ul>
                    @elseif(\App\Models\Category::countCategoryParent($category) == 3)
                      <li><a href="{{ url("category/$category->slug") }}">{{ $category->parent->name }}</a></li>
                      <ul id="child-category">
                        @foreach($brother_categories as $brother_category)
                          <li>
                            <a href={{ url("category/$brother_category->slug") }}" style="{{($category->name == $brother_category->name) ? 'color:green' : ''}}">{{ $brother_category->name }}
                              </a></li>
                        @endforeach
                      </ul>
                    @endif

                  </ul>
                </div>
              </div>
              <div class="widget">
                <div class="shop-widget-banner text-center">
                  <img src="img/product/sidebar_shop_ad.jpg" alt="">
                </div>
              </div>
            </aside>
          </div>
          <div class="col-9">
            <div class="shop-discount-area">
              <div class="discount-content shop-discount-content">
                <span>غذای سالم</span>
                <h4 class="title"><a href="shop.html">مزرعه ارگانیک برای پارادایس</a></h4>
                <p>پیشنهاد فوق العاده تا 50٪ تخفیف</p>
                <a href="{{ url('category/food-beverage') }}" class="btn rounded-btn">الان بخرید</a>
              </div>
            </div>
            <div class="shop-top-meta mb-30">
              <div class="row">
                <div class="col-md-6 col-sm-7">
                  <div class="shop-top-left">
                    <ul>
                      <li><a href="#"><i class="fas fa-bars"></i> فیلتر محصولات</a></li>
                      <li> {{ $products->total() }} نتیجه</li>
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
                    <div class="sp-product-item" style="height: 490px;">
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

                        @if($product->amazing_id == null)
                          <div class="sp-cart-wrap">
                            <p>{{number_format($product->price)}}&nbsp; تومان</p>
                          </div>
                        @else
                          @php
                            $type = $product->amazing->type;
                            $amount = $product->amazing->amount;
                            $price = $product->price;
                            $final_price = \App\Models\Product::calculateDiscount($type, $amount, $price);
                          @endphp
                        <div class="sp-cart-wrap">
                          <p>
                            <del class="text-danger">{{number_format($product->price)}}</del>
                          </p>
                          <p>{{number_format($final_price)}}&nbsp; تومان</p>
                        </div>
                        @endif
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
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- shop-area-end -->

  </main>
  <!-- main-area-end -->

@endsection
