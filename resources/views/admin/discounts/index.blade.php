@extends('layouts.app')

@section('title', 'پنل مدیریت - فهرست تخفیفات')

@section('content')

    <h1>فهرست تخفیفات</h1><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">شناسه تخفیف</th>
            <th scope="col">کد تخفیف</th>
            <th scope="col">عنوان</th>
            <th scope="col">نوع</th>
            <th scope="col">مبلغ/درصد</th>
            <th scope="col">موجودی</th>
            <th scope="col">استفاده شده</th>
            <th scope="col">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($discounts as $discount)
            <tr>
                <th scope="row">{{$discount->id}}</th>
                <td>{{$discount->code}}</td>
                <td>{{$discount->title}}</td>
                <td>
                    {{$discount->type ? 'درصدی': 'مبلغی'}}
                </td>
                <td>{{$discount->amount}}</td>
                <td>{{$discount->inventory}}</td>
                <td>{{$discount->sales}}</td>
                <td>{{$discount->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
