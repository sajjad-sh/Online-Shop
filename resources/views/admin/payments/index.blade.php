@extends('layouts.app')

@section('title', 'پنل مدیریت - فهرست سفارشات')

@section('content')

    <h1>فهرست سفارشات</h1><br>
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
                    @switch($payment->payment_gateway)
                        @case(0)
                        نقدی
                        @break

                        @case(1)
                        به پرداخت ملت
                        @break

                        @case(2)
                        درگاه بانک سامان
                        @break

                        @case(3)
                        بانک تجارت
                        @break

                        @default
                        بانک سرمایه
                    @endswitch
                </td>
                <td>{{$payment->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
