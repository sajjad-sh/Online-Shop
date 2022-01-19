<!doctype html>
<html lang="fa" class="no-js" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="../../compare-products/css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="../../compare-products/css/style.css"> <!-- Resource style -->
  <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">

  <script src="../../compare-products/js/modernizr.js"></script> <!-- Modernizr -->

  <style>
    body {
      font-family: 'b yekan';
    }
  </style>

  <title>فروشگاه پارادایس - مقایسه 2 محصول</title>
</head>
<body>
<section class="cd-intro">
  <h1>مقایسه</h1>

</section> <!-- .cd-intro -->

<section class="cd-products-comparison-table">
  <header>

  </header>

  <div class="cd-products-table">
    <div class="features" style="width: 440px;">
      <div class="top-info">Models</div>
      <ul class="cd-features-list">
        <li>شگفت انگیز</li>
        <li>رنگ</li>
        <li>برند</li>
        <li>قیمت</li>
        <li>موجودی</li>
        <li>تعداد فروش</li>
        <li>تعداد بازدید</li>
      </ul>
    </div> <!-- .features -->

    <div class="cd-products-wrapper">
      <ul class="cd-products-columns" style="width: 1125px;">


        <li class="product">
          <div class="top-info">
            <div class="check"></div>


            @php
              $primary_image = null;

              foreach ($p1->images as $image) {
                  if($image->is_primary == 1)
                      $primary_image = $image;
              }
            @endphp
            <img style="width: 229px; height: 149px;" src="{{$primary_image ? url($primary_image->url) : asset('img/product/sp__products04.png')}}" alt="product image">



            <h3>{{ $p1->fa_title }}</h3>
          </div> <!-- .top-info -->

          <ul class="cd-features-list">
            @if($p1->amazing_id != null)
              <li><i class="fas fa-check"></i></li>
            @else
              <li><i class="fas fa-times-circle"></i></li>
            @endif
            <li>{{ $p1->color }}</li>
            <li>{{ $p1->brand }}</li>
            <li>{{ number_format($p1->price) }}</li>
            <li>{{ $p1->inventory }}</li>
            <li>{{ $p1->sales }}</li>
            <li>{{ $p1->visits }}</li>
          </ul>
        </li> <!-- .product -->

        <li class="product">
          <div class="top-info">
            <div class="check"></div>

            @php
              $primary_image = null;

              foreach ($p2->images as $image) {
                  if($image->is_primary == 1)
                      $primary_image = $image;
              }
            @endphp
            <img style="width: 229px; height: 149px;" src="{{$primary_image ? url($primary_image->url) : asset('img/product/sp__products04.png')}}" alt="product image">

            <h3>{{ $p2->fa_title }}</h3>
          </div> <!-- .top-info -->

          <ul class="cd-features-list">
            @if($p2->amazing_id != null)
              <li><i class="fas fa-check"></i></li>
            @else
              <li><i class="fas fa-times-circle"></i></li>
            @endif
            <li>{{ $p2->color }}</li>
            <li>{{ $p2->brand }}</li>
            <li>{{ number_format($p2->price) }}</li>
            <li>{{ $p2->inventory }}</li>
            <li>{{ $p2->sales }}</li>
            <li>{{ $p2->visits }}</li>
          </ul>
        </li> <!-- .product -->



      </ul> <!-- .cd-products-columns -->
    </div> <!-- .cd-products-wrapper -->

    <ul class="cd-table-navigation">
      <li><a href="#0" class="prev inactive">Prev</a></li>
      <li><a href="#0" class="next">Next</a></li>
    </ul>
  </div> <!-- .cd-products-table -->
</section> <!-- .cd-products-comparison-table -->
<script src="../../compare-products/js/jquery-2.1.4.js"></script>
<script src="../../compare-products/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
