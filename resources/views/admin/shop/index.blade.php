@extends('layouts.app')

@section('title', 'پنل مدیریت')

@section('content')

  <a href="{{route('admin.index')}}">برگشت به پنل مدیریت - صفحه اصلی</a>

    <h1>داشبورد مدیریت</h1><br>

    <ul class="list-group">
        <li class="list-group-item"><a href="{{route('admin.shop.products.index')}}">لیست محصولات</a></li>
        <li class="list-group-item"><a href="{{route('admin.shop.categories.index')}}">لیست دسته‌بندی‌ها</a></li>
        <li class="list-group-item"><a href="{{route('admin.shop.specifications.index')}}">لیست خصوصیات</a></li>
        <li class="list-group-item"><a href="#">لیست نظرات</a></li>
    </ul>

@endsection
