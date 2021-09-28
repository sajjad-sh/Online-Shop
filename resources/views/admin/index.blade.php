@extends('layouts.app')

@section('title', 'پنل مدیریت')

@section('content')

  <!-- TODO: Review code and move to components -->
    <h1>داشبورد مدیریت</h1><br>

    <ul class="list-group">
        <li class="list-group-item"><a href="{{route('admin.users.index')}}">لیست کاربران</a></li>
        <li class="list-group-item"><a href="{{route('admin.orders.index')}}">لیست سفارشات</a></li>
        <li class="list-group-item"><a href="{{route('admin.payments.index')}}">لیست مالی</a></li>
        <li class="list-group-item"><a href="{{route('admin.discounts.index')}}">لیست کدهای تخفیف</a></li>
        <li class="list-group-item"><a href="{{route('admin.shop.index')}}">مدیریت فروشگاه</a></li>
        <li class="list-group-item"><a href="#">مدیریت سایت</a></li>
    </ul>

@endsection
