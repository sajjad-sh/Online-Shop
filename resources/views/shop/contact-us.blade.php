@extends('layouts.shop')

@section('title', 'فروشگاه پارادایس - صفحه اصلی')

@section('content')

		<!-- map-area -->
		<div id="map-bg" data-background="img/bg/map.jpg"></div>
		<!-- map-area-end -->

		<!-- contact-area -->
		<section class="contact-area pt-90 pb-90">
			<div class="container">
				<div class="container-inner-wrap">
					<div class="row justify-content-center justify-content-lg-between">
						<div class="col-lg-6 col-md-8 order-2 order-lg-0">
							<div class="contact-title mb-25">
								<h5 class="sub-title">ارتباط با ما</h5>
								<h2 class="title">بیاید صحبت کنیم<span>.</span></h2>
							</div>
							<div class="contact-wrap-content">
								<p>ساختن نرم افزاری که اساساً مربوط به ناحیه اصلی صورت است ، وقتی از نوع ناشناخته و درهم پیچیده استفاده می شود.</p>
								<form action="#" class="contact-form">
									<div class="form-grp">
										<label for="name">نام شما <span>*</span></label>
										<input type="text" id="name" placeholder="فلان فلانی نسب ...">
									</div>
									<div class="form-grp">
										<label for="email">ایمیل شما <span>*</span></label>
										<input type="text" id="email" placeholder="info.example@.com">
									</div>
									<div class="form-grp">
										<label for="message">پیام شما <span>*</span></label>
										<textarea name="message" id="message" placeholder="پیام شما..."></textarea>
									</div>
									<div class="form-grp checkbox-grp">
										<input type="checkbox" id="checkbox">
										<label for="checkbox">آدرس ایمیل نمایش داده نشود</label>
									</div>
									<button type="button" class="btn rounded-btn">ارسال پیلم</button>
								</form>
							</div>
						</div>
						<div class="col-xl-5 col-lg-6 col-md-8">
							<div class="contact-info-wrap">
								<div class="contact-img">
									<img src="img/images/contact_img.png" alt="">
								</div>
								<div class="contact-info-list">
									<ul>
										<li>
											<div class="icon"><i class="fas fa-map-marker-alt"></i></div>
											<div class="content">
												<p>ایران، تهران، خیابان یک، کوچه یک</p>
											</div>
										</li>
										<li>
											<div class="icon"><i class="fas fa-phone-alt"></i></div>
											<div class="content">
												<p>+9 (256) 254 9568</p>
											</div>
										</li>
										<li>
											<div class="icon"><i class="fas fa-envelope-open"></i></div>
											<div class="content">
												<p>+9 (256) 254 9568</p>
											</div>
										</li>
									</ul>
								</div>
								<div class="contact-social">
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- contact-area-end -->

@endsection
