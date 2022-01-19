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
                <li class="breadcrumb-item"><a href="shop.html">محصولات</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->fa_title }}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb-area-end -->

  <!-- shop-details-area -->
  <section class="shop-details-area pt-90 pb-90">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="shop-details-flex-wrap">
            <div class="shop-details-nav-wrap">
              <ul class="nav nav-tabs" id="myTab" role="tablist">

                @foreach($product->images as $image)
                  <li class="nav-item" role="presentation">
                    <a class="nav-link {{$image->is_primary ? 'active' : ''}}" id="item-{{$image->id}}-tab"
                      data-toggle="tab" href="#item-{{$image->id}}" role="tab"
                      aria-controls="item-{{$image->id}}" aria-selected="@if($image->is_primary) true &nbsp; @endif">
                      <img
                        src="{{\Illuminate\Support\Facades\URL::to("$image->url")}}"
                        style="width: 91px; height: 98px;" alt="">
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="shop-details-img-wrap">
              <div class="tab-content" id="myTabContent">

                @foreach($product->images as $image)
                  <div class="tab-pane fade @if($image->is_primary) show active &nbsp; @endif" id="item-{{$image->id}}"
                    role="tabpanel" aria-labelledby="item-{{$image->id}}-tab">
                    <div class="shop-details-img">
                      <img src="{{\Illuminate\Support\Facades\URL::to("$image->url")}}" style="width: 604px; height: 579px;" alt="">
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="shop-details-content">


            <h4 class="title">
              {{$product->fa_title}}
            </h4>


            <div class="mt-2 shop-details-meta">
              {{$product->en_title}}
              <ul>

              @if($product->brand)

                  <li>برند : <a href="shop.html">{{$product->brand}}</a></li>

                @endif
                  <li>تعداد نظرات: <span>{{$product->count_comments}}</span></li>

                  <li>کد محصول : <span>{{strtoupper($product->slug)}}</span></li>
              </ul>
            </div>
            <div class="shop-details-price">
              <h2 class="price">{{number_format($product->total_price)}} تومان</h2>
              @if($product->status == 0 or $product->inventory == 0)
                <h5 class="stock-status text-danger">- ناموجود</h5>
              @else
                <h5 class="stock-status">- موجود در انبار</h5>
              @endif
            </div>

            @if($product->total_price != $product->price)
              <h5 style="color: red;" class="price">
                <del>{{number_format($product->price)}} تومان</del>
              </h5>
            @endif

            <p>
              {{$product->description}}
            </p>
            <div class="shop-details-list">
              <ul>
{{--                @foreach($product->primary_attributes as $key => $value)--}}
{{--                  <li>{{$key}}: <span>{{$value}}</span></li>--}}
{{--                @endforeach--}}
              </ul>
            </div>

            @php $counter = 0 @endphp
            <div class="form-group">
{{--              @foreach($product->selective_attributes_name as $name => $array)--}}
{{--                @php $counter++; @endphp--}}
{{--                <label for="selective-attributes-name-{{__("numbers.$counter")}}">{{$name}}: </label>--}}
{{--                <select class="form-control" id="selective-attributes-name-{{__("numbers.$counter")}}" style="display: inline-block; width: fit-content; height: 100%;">--}}

{{--                  @foreach($array as $index => $value)--}}
{{--                    <option>{{$value}}</option>--}}
{{--                  @endforeach--}}

{{--                </select>--}}
{{--                &nbsp;&nbsp;--}}
{{--              @endforeach--}}
            </div>

            <br>
            <div class="shop-perched-info">
              <a href="{{ \Illuminate\Support\Facades\URL::to("cart/add/$product->id/1") }}" class="btn">افزودن به سبد</a>
            </div>
            <div class="shop-details-bottom">
              <h5 class="title">
                <a style="cursor: pointer" onclick="addToFavorites({{ $product->id }})">
                  @auth
                    @if($product->is_favorite)
                      <i id="fa-heart-icon" class="fas fa-heart"></i>
                      <span id="fav_btn"> حذف از علاقه مندیها</span>
                    @else
                      <i id="fa-heart-icon" class="far fa-heart"></i>
                      <span id="fav_btn">افزودن به علاقه مندیها</span>
                    @endif
                  @endauth
                </a>
              </h5>
              <ul>
                <li>
                  <span>دسته بندیها :</span>
                  @foreach($product->categories as $category)
                    <a href="{{\Illuminate\Support\Facades\URL::to('category/'.$category->slug)}}">{{$category->name}}</a>
                    @if(!$loop->last)|@endif
                  @endforeach

                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="product-desc-wrap">
            <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab"
                  aria-controls="details" aria-selected="true">نقد و بررسی</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="val-tab" data-toggle="tab" href="#val" role="tab" aria-controls="val"
                  aria-selected="false">مشخصات فنی</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                  aria-selected="false">دیدگاه کاربران</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContentTwo">
              <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                <div class="product-desc-content">
                  {{--                  <h4 class="title">جزئیات محصول</h4>--}}


                  <div class="row">

                    <div class="col-xl-9 col-md-7">
                      {!! $product->review !!}


                      {{--                      <h5 class="small-title">100% ویتامین طبیعی</h5>--}}
                      {{--                      <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.--}}
                      {{--                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی--}}
                      {{--                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>--}}
                      {{--                      <ul class="product-desc-list">--}}
                      {{--                        <li>65٪ پلی ، 35٪ ابریشم</li>--}}
                      {{--                        <li>شستشوی دستی سرد</li>--}}
                      {{--                        <li>بسته شدن دکمه جلو مخفی با لهجه سوراخ کلید</li>--}}
                      {{--                        <li>آستین های آستین دار دکمه ای</li>--}}
                      {{--                        <li>ساخت نیمه شفاف سبک</li>--}}
                      {{--                        <li>ساخته شده در ایالات متحده آمریکا</li>--}}
                      {{--                      </ul>--}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="val" role="tabpanel" aria-labelledby="val-tab">
                <div class="product-desc-content">
                  <h4 class="title">جزئیات محصول</h4>
                  <div class="row">
                    <div class="col-xl-3 col-md-5">
                      <div class="product-desc-img">
                      </div>
                    </div>
                    <div class="col-xl-9 col-md-7">
                      <h5 class="small-title">مشخصات {{$product->fa_title}}</h5>
                      <p>
                        {{$product->en_title}}
                      </p>
                      <hr>
                      @if(json_decode($product->atts) != null)
                      <ul class="product-desc-list">
                        @foreach(json_decode($product->atts) as $key => $value)
                          <li>
                            <span style="font-weight: bold">{{$key}}: </span> {{$value}}
                          </li>
                        @endforeach
                      </ul>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="product-desc-content" style="font-size: 1rem!important;">

                  <div class="d-flex justify-content-end row">
                    <div class="col-10">
                      <div class="d-flex flex-column comment-section">


                        @foreach($product->comments as $comment)
                          @if($comment->is_verify == 1)
                            <div>
                              <div class="bg-white p-2">
                                <div class="d-flex flex-column justify-content-start ml-2">

                                  <div class="d-flex flex-row user-info">
                                    <span class="d-block font-weight-bold name">{{$comment->user->full_name}}</span>
                                  </div>
                                  <span class="date text-black-50" style="font-size: 12px">{{verta($comment->created_at)}}</span>

                                </div>

                                <div class="mt-2">
                                  <p class="comment-text">
                                    {{$comment->content}}
                                  </p>
                                </div>
                              </div>
                            </div>
                        @endif
                        @endforeach


                        <div class="bg-light p-2">

                          <form action="{{ route('admin.shop.comments.store') }}" method="post">
                            @csrf
                            <div class="d-flex flex-row align-items-start">
                              <input name="product_id" type="hidden" value="{{ $product->id }}">
                              <textarea name="textComment" class="form-control ml-1 shadow-none textarea" style="height: 150px;"></textarea>
                            </div>
                            <div class="mt-2 text-right">
                              <button class="btn btn-primary" type="submit">ارسال دیدگاه</button>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- shop-details-area-end -->

  <!-- coupon-area -->
  <div class="coupon-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="coupon-bg">
            <div class="coupon-title">
              <span>کد تخفیف</span>
              <h3 class="title">کد تخفیف 3 هزار تومان دریافت کنید</h3>
            </div>
            <div class="coupon-code-wrap">
              <h5 class="code">Ganic21abs</h5>
              <img src="{{asset('img/images/coupon_code.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- coupon-area-end -->

  <!-- best-sellers-area -->
  <section class="best-sellers-area pt-85 pb-70">
    <div class="container">
      <div class="row align-items-end mb-40">
        <div class="col-md-8 col-sm-9">
          <div class="section-title">
            <span class="sub-title">کالاهای پیشنهادی</span>
            <h2 class="title">بر اساس بازدید شما</h2>
          </div>
        </div>

      </div>
      <div class="best-sellers-products">
        <div class="row justify-content-center">

          @foreach($latest_products as $latest_product)

            <div class="col-3">
              <div class="sp-product-item mb-20" style="height: 490px;">
                <div class="sp-product-thumb">
                  @if($latest_product->amazing_id != null)
                    @if($latest_product->amazing->type == 0)
                      <span class="batch">{{ $latest_product->amazing->amount }}%</span>
                    @else
                      <span class="batch">جدید</span>
                    @endif
                  @else
                    <span class="batch">جدید</span>
                  @endif

                  @php
                    $primary_image = null;

                    foreach ($latest_product->images as $image) {
                        if($image->is_primary == 1)
                            $primary_image = $image;
                    }
                  @endphp
                  <a href="{{\Illuminate\Support\Facades\URL::to("product/$latest_product->slug")}}"><img src="{{$primary_image ? \Illuminate\Support\Facades\URL::to($primary_image->url) : asset('img/product/sp__products04.png')}}" alt=""></a>
                </div>
                <div class="sp-product-content">
                  <h6 class="title">
                    <a href="{{\Illuminate\Support\Facades\URL::to("product/$latest_product->slug")}}">
                      {{ $latest_product->fa_title }}
                    </a>
                  </h6>
                  <span class="product-status">
                    {{number_format($latest_product->total_price)}} تومان
                  </span>
                  <div class="sp-cart-wrap" >
                    <div class="shop-perched-info">
                      <a href="{{ \Illuminate\Support\Facades\URL::to("cart/add/$latest_product->id/1") }}" class="btn">افزودن به سبد</a>
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



  <script>
    window.addToFavorites = function (id) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        'type': 'PATCH',
        'url': '/update-favorites/' + id,
        success: function (result) {

          // alert(result)

          if (result == 1) {
            alert('محصول به لیست علاقه‌مندی ها افزوده شد!');
            $('#fav_btn').html('حذف از علاقه مندیها');

            $('#fa-heart-icon').removeClass('far').addClass('fas');
          } else {
            alert('محصول از لیست علاقه‌مندی ها حذف شد!');
            $('#fav_btn').html('افزودن به علاقه مندیها');

            $('#fa-heart-icon').removeClass('fas').addClass('far');
          }

          // $('#done_status_' + result.id).html(result.is_done ? 'Done' : 'Not Done');
          // document.getElementById('done_status').innerHTML = result.is_done ? 'Done' : 'Not Done'
        },
        error: function (error) {
          alert('خطا در ارتباط با سرور');
        }
      })
    }
  </script>



@endsection
