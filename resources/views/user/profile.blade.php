@extends('layouts.profile2')

@section('title', 'صفحه اصلی')

@section('content-wrapper')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      پروفایل کاربری
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
      <li><a href="#">مثال ها</a></li>
      <li class="active"> پروفایل</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{asset("img/icon/prof-icon.png")}}" alt="User profile picture">

            <h3 class="profile-username text-center">{{ Auth::user()->full_name }}</h3>

            <p class="text-muted text-center">کاربر عادی</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>ایمیل کاربری</b> <a class="pull-left">{{ Auth::user()->email }}</a>
              </li>
              <li class="list-group-item">
                <b>شماره تلفن</b> <a class="pull-left">{{ Auth::user()->phone }}</a>
              </li>
            </ul>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary btn-block">
                <b>خروج</b>
              </button>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">درباره من</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> تحصیلات</strong>

            <p class="text-muted">
              لیسانس نرم افزار کامپیوتر
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> موقعیت</strong>

            <p class="text-muted">ایران، تهران</p>

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> توانایی ها</strong>

            <p>
              <span class="label label-danger">UI Design</span>
              <span class="label label-info">Javascript</span>
              <span class="label label-warning">PHP</span>
              <span class="label label-primary">laravel</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> یادداشت</strong>

            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#favorites" data-toggle="tab">آخرین علاقه‌مندی‌ها</a></li>
            <li><a href="#activity" data-toggle="tab">نظرات شما</a></li>
            <li><a href="#timeline" data-toggle="tab">آخرین سفارشات</a></li>
            <li><a href="#settings" data-toggle="tab">مشخصات کاربری</a></li>
            <li><a href="#addresses" data-toggle="tab">نشانی‌ها</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="favorites">

              <!-- Post -->
              @foreach($favorite_products as $favorite_product)
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{$favorite_product->primary_image}}" alt="user image">
                    <span class="username">
                          <a href="{{\Illuminate\Support\Facades\URL::to($favorite_product->slug)}}">
                            {{$favorite_product->fa_title}}
                          </a>
                        </span>
                  </div>
                  <!-- /.user-block -->

                </div>
            @endforeach
            <!-- /.post -->
              <div style="text-align: center;">
                {{$favorite_products->links()}}
              </div>
            </div>

            <div class="active tab-pane" id="activity">

                <!-- Post -->
              @foreach($comments as $comment)
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{asset("img/icon/prof-icon.png")}}" alt="user image">
                      <span class="username">
                          <a href="{{\Illuminate\Support\Facades\URL::to($comment->product->slug)}}">
                            {{$comment->product->fa_title}}
                          </a>
                        </span>
                      <span class="description">ارسال شده در {{$comment->created_at}}</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      {{$comment->content}}
                    </p>
                  </div>
              @endforeach
                <!-- /.post -->
              <div style="text-align: center;">
                {{$comments->links()}}
              </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
              <ul class="timeline timeline-inverse">




              @foreach($orders as $order)
                <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> &nbsp;{{$order->created_at}}</span>
                      <h4 style="color: blue">
                        سفارش PRC-{{$order->cart_id}}
                      </h4>
                      <ul>
                        <li><span style="color: red;">وضعیت سفارش:</span> {{__("order.status.$order->status")}} </li>
                        <li><span style="color: red;">تاریخ سفارش:</span> {{$order->created_at}} </li>
                        @if($order->cart->discount)
                          <li>
                            @php $discount_type = $order->cart->discount->type @endphp
                            <span style="color: red;">کد تخفیف اعمال شده:</span> {{$order->cart->discount->title}} - {{$order->cart->discount->amount}} {{__("discount.type.$discount_type")}}
                          </li>
                        @endif
                        <li><span style="color: red;">قیمت نهایی:</span> {{$order->cart->total_price}} </li>
                        <li><span style="color: red;">قیمت خالص:</span> {{$order->cart->net_price}} </li>
                        <li><span style="color: red;">آدرس ارسال شده:</span> {{$order->address->content}} </li>
                        <li><span style="color: red;">متد پرداخت:</span> {{__("payment.method.$order->payment_method")}}
                        </li>

                        @if($order->cancel_reason)
                          <li>
                            <span style="color: red;">علت لغو سفارش:</span> {{$order->cancel_reason}}
                          </li>
                        @endif

                        <li>
                        <span style="color: red;">محصولات خریداری شده:</span>
                          <ul>
                            @foreach($order->cart->cart_items as $cart_item)
                              <li>
                                <a href="{{ \Illuminate\Support\Facades\URL::to($cart_item->product->slug) }}">
                                محصول {{"PRD-".$cart_item->product_id}}
                                </a>
                                <ul>
                                  <li><span style="color: red;">عنوان محصول:</span>
                                    <a href="{{ \Illuminate\Support\Facades\URL::to($cart_item->product->slug) }}">
                                    {{$cart_item->product->fa_title}}
                                    </a>
                                  </li>
                                  <li><span style="color:red;">تعداد:</span> {{$cart_item->quantity}} عدد</li>
                                  <li><span style="color:red;">قیمت:</span> {{number_format($cart_item->price)}} تومان </li>
                                </ul>
                              </li>
                            @endforeach
                          </ul>
                        </li>
                      </ul>
                      <br>
                    </div>
                  </li>
                  <!-- END timeline item -->
              @endforeach
              </ul>
              {{$orders->links()}}
            </div>
            <!-- /.tab-pane -->

            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
              @endforeach
            @endif
            <div class="tab-pane" id="settings">
              <form class="form-horizontal" action="{{ route('profile.update', auth()->user()) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">نام</label>

                  <div class="col-sm-10">
                    <input name="first_name" value="{{auth()->user()->first_name}}" type="text" class="form-control" id="inputName" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">نام خانوادگی</label>

                  <div class="col-sm-10">
                    <input name="last_name" value="{{auth()->user()->last_name}}" type="text" class="form-control" id="inputName" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">ایمیل</label>

                  <div class="col-sm-10">
                    <input name="email" type="email" class="form-control" id="inputEmail" value="{{auth()->user()->email}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">شماره تلفن</label>

                  <div class="col-sm-10">
                    <input name="phone" type="text" class="form-control" id="inputName" value="{{auth()->user()->phone}}">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> من <a href="#">قوانین و شرایط</a> را قبول میکنم.
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->

            <!-- /.tab-pane -->
            <div class="tab-pane" id="addresses">
              <!-- The timeline -->
              <ul class="timeline timeline-inverse">


                <ul>
              @foreach($addresses as $address)
                  <li>{{$address->content}}</li>
                @endforeach
                </ul>
              </ul>
              {{$addresses->links()}}
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
@endsection
