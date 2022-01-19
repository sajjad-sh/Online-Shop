@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست سفارشات')

@section('content-wrapper')

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <br>
          <h3 class="box-title">پنل مدیریت - فهرست سفارشات</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover" style=" margin: 34px 34px; width: 97%; ">
            <tr>
              <th>ردیف</th>
              <th>شناسه سفارش</th>
              <th>شناسه سبد خرید</th>
              <th>وضعیت سفارش</th>
              <th>درگاه پرداختی</th>
              <th>تاریخ ایجاد</th>
              <th>تغییر وضعیت</th>
            </tr>

            @foreach($orders as $order)
              <tr>
                  <th>{{ (($orders->currentPage() - 1 ) * $orders->perPage() ) + $loop->iteration }}</th>
                <td>{{$order->id}}</td>
                <td>{{$order->cart_id}}</td>
                <td>
                  <span class="label label-{{__("order.label.$order->status")}}">{{__("order.status.$order->status")}}</span>
                </td>
                <td>

                  @if($order->cart->payment)
                    @if(!in_array($order->cart->payment->payment_method, [0, 1, 2, 3]))
                      {{"نقدی"}}

                    @else
                      {{__("payment.method.".$order->cart->payment->payment_method)}}
                    @endif
                  @else
                    {{"نقدی"}}
                  @endif
                </td>
                <td>{{verta($order->created_at)}}</td>
                <td>
                  <form action="{{route('admin.orders.update', $order)}}" method="post">
                    @csrf
                    @method('patch')
                    <select name="status">
                      <option selected disabled value="rule-change">تغییر وضعیت</option>
                      <option value="0">لغو</option>
                      <option value="1">در انتظار پرداخت</option>
                      <option value="2">در حال پردازش</option>
                      <option value="3">تائید شده</option>
                      <option value="4">ارسال شده</option>
                    </select>
                    <br>
                    <p style="margin-top: 8px !important;">
                      <input type="submit" value="اعمال"
                        style="background: none; border: none; color: blue;text-decoration: none; cursor: pointer;" onclick="return confirm('آیا از انجام این عملیات اطمینان دارید ؟')">
                    </p>

                  </form>

                </td>
              </tr>
            @endforeach
              </tr>
          </table>
          <div style="text-align: center">
            {{ $orders->links() }}
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection
