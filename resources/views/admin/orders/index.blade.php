@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست سفارشات')

@section('content')

    <h1>فهرست سفارشات</h1><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">شناسه سفارش</th>
            <th scope="col">شناسه سبد خرید</th>
            <th scope="col">شناسه نشانی</th>
            <th scope="col">وضعیت سفارش</th>
            <th scope="col">درگاه پرداختی</th>
            <th scope="col">علت لغو سفارش</th>
            <th scope="col">تاریخ ایجاد</th>
            <th scope="col">تغییر وضعیت</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->cart_id}}</td>
                <td>{{$order->address_id}}</td>
                <td>
                  {{__("order.status.$order->status")}}
                </td>
                <td>
                  @if(!in_array($order->payment_method, [0, 1, 2, 3]))
                    {{"بانک سرمایه"}}

                  @else
                    {{__("payment.method.$order->payment_method")}}
                  @endif
                </td>
                <td style="width: 239px;">
                    {{$order->status == 0 ? $order->cancel_reason : '-'}}

                </td>
                <td>{{$order->created_at}}</td>
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
                                   style="background: none; border: none; color: blue;text-decoration: none; cursor: pointer;">
                        </p>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
