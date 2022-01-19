@extends('layouts.shop')

@section('title', 'فروشگاه پارادایس - صفحه اصلی')

@section('content')


  <!-- breadcrumb-area -->
  <section class="breadcrumb-area breadcrumb-bg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="breadcrumb-content">
            <h2 class="title">درباره ما</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.blade.php">صفحه نخست</a></li>
                <li class="breadcrumb-item active" aria-current="page">درباره ما</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb-area-end -->

  <!-- ingredients-area -->
  <section class="ingredients-area pt-90 pb-90">
    <div class="container">
      <div class="ingredients-inner-wrap">
        <div class="row align-items-center">
          <div class="col-7">
            <div class="ingredients-img">
              <img src="img/images/ingredients_img.jpg" alt="">
              <div class="active-years">
                <h2 class="title">49+ <span>سال سابقه</span></h2>
              </div>
            </div>
          </div>
          <div class="col-5">
            <div class="ingredients-content-wrap">
              <div class="ingredients-section-title">
                <span class="sub-title">عناصر</span>
                <h2 class="title">ذخیره در درجه اول در محدوده عمومی</h2>
              </div>
              <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
              <div class="ingredients-fact">
                <ul>
                  <li>
                    <div class="icon"><img src="img/icon/ing_icon01.png" alt=""></div>
                    <div class="content">
                      <h4>128+</h4>
                      <span>برنده جوایز</span>
                    </div>
                  </li>
                  <li>
                    <div class="icon"><img src="img/icon/ing_icon02.png" alt=""></div>
                    <div class="content">
                      <h4>35k+</h4>
                      <span>داوطلبان فعال</span>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="ingredients-btn-wrap">
                <a href="shop.html" class="btn">الان بخرید</a>
                <a href="home.blade.php" class="store-link">فروشگاه فوق العاده ما <i class="fas fa-arrow-left"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ingredients-area-end -->

  <!-- services-area -->
  <section class="services-area services-bg">
    <div class="container">
      <div class="container-inner-wrap">
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-9">
            <div class="services-section-title text-center mb-55">
              <h2 class="title">آنچه ارائه می دهیم؟</h2>
              <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
            <div class="services-item">
              <a href="contact.html" class="services-link"></a>
              <div class="icon"><i class="flaticon-return"></i></div>
              <div class="content">
                <h5>بازگشت کالا<span class="new">جدید</span></h5>
                <p>پایگاه دانش که سیستم جمع آوری را سازماندهی کرده است</p>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
            <div class="services-item">
              <a href="contact.html" class="services-link"></a>
              <div class="icon"><i class="flaticon-delivery"></i></div>
              <div class="content">
                <h5>ارسال رایگان</h5>
                <p>پایگاه دانش که سیستم جمع آوری را سازماندهی کرده است</p>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
            <div class="services-item">
              <a href="contact.html" class="services-link"></a>
              <div class="icon"><i class="flaticon-like-1"></i></div>
              <div class="content">
                <h5>تخفیف روزانه</h5>
                <p>پایگاه دانش که سیستم جمع آوری را سازماندهی کرده است</p>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
            <div class="services-item">
              <a href="contact.html" class="services-link"></a>
              <div class="icon"><i class="flaticon-clutch-disc"></i></div>
              <div class="content">
                <h5>اتوماسیون</h5>
                <p>پایگاه دانش که سیستم جمع آوری را سازماندهی کرده است</p>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
            <div class="services-item">
              <a href="contact.html" class="services-link"></a>
              <div class="icon"><i class="flaticon-settings"></i></div>
              <div class="content">
                <h5>نرم افزار پایگاه داده<span class="new">جدید</span></h5>
                <p>پایگاه دانش که سیستم جمع آوری را سازماندهی کرده است</p>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
            <div class="services-item">
              <a href="contact.html" class="services-link"></a>
              <div class="icon"><i class="flaticon-online-service"></i></div>
              <div class="content">
                <h5>مقالات</h5>
                <p>پایگاه دانش که سیستم جمع آوری را سازماندهی کرده است</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- services-area-emd -->

  <!-- newsletter-area -->
  <section class="newsletter-area pt-90 pb-90">
    <div class="container">
      <div class="container-inner-wrap">
        <div class="row">
          <div class="col-12">
            <div class="newsletter-wrap">
              <h2 class="title">آیا آماده هستید تا کسب و کار خود را <span> به سود کلان برسانید</span></h2>
              <div class="newsletter-form">
                <form action="#">
                  <input type="email" placeholder="آدرس ایمیل">
                  <button class="btn">عضویت</button>
                </form>
              </div>
              <img src="img/images/newsletter_shape01.png" alt="" class="newsletter-shape top-shape wow fadeInDownBig" data-wow-delay=".3s">
              <img src="img/images/newsletter_shape02.png" alt="" class="newsletter-shape bottom-shape wow fadeInUpBig" data-wow-delay=".3s">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- newsletter-area-end -->

  <!-- online-support-area -->
  <section class="online-support-area">
    <div class="container">
      <div class="container-inner-wrap">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-5">
            <div class="online-support-img">
              <img src="img/images/support_img.png" alt="">
            </div>
          </div>
          <div class="col-xl-6 col-lg-7">
            <div class="online-support-content">
              <h2 class="title">پشتیبانی آنلاین گانیک</h2>
              <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
              <div class="support-info-wrap">
                <ul>
                  <li>
                    <div class="support-info-item">
                      <p>پشتیبانی شبانه روزی</p>
                      <h2><i class="flaticon-24-hour-service"></i> 24/7</h2>
                    </div>
                  </li>
                  <li>
                    <div class="support-info-item">
                      <p>رتبه شادی مشتری</p>
                      <h2><i class="flaticon-happy-1"></i> 98.9%</h2>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- online-support-area-end -->

@endsection
