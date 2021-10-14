@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست پرداخت‌ها')

@section('content-wrapper')

    <h1>فهرست پرداخت‌ها</h1><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">شناسه پرداخت</th>
            <th scope="col">شناسه کاربر</th>
            <th scope="col">مبلغ</th>
            <th scope="col">درگاه پرداختی</th>
            <th scope="col">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <th scope="row">{{$payment->id}}</th>
                <td>{{$payment->user_id}}</td>
                <td>{{$payment->amount}}</td>
                <td>
                  @if(!in_array($payment->payment_gateway, [0, 1, 2, 3]))
                    {{"بانک سرمایه"}}

                  @else
                    {{__("payment.method.$payment->payment_gateway")}}
                  @endif
                </td>
                <td>{{$payment->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="text-align: center">
      {{ $payments->links() }}
    </div>


@endsection
