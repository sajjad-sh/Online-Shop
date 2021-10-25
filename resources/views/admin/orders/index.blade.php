@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست سفارشات')

@section('content-wrapper')

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <br>
          <h3 class="box-title">پنل مدیریت - فهرست سفارشات</h3>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="جستجو">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
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
              <th>علت لغو سفارش</th>
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
                  @if(!in_array($order->payment_method, [0, 1, 2, 3]))
                    {{"بانک سرمایه"}}

                  @else
                    {{__("payment.method.$order->payment_method")}}
                  @endif
                </td>
                <td style="width: 239px;">



                  @if($order->status == 0)

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{$order->id}}">
                      نمایش علت لغو
                    </button>

                  <div class="modal modal-danger fade" id="modal-danger-{{$order->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Danger مدال</h4>
                        </div>
                        <div class="modal-body">
                          <p>{{$order->cancel_reason}}</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">قبول</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
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
