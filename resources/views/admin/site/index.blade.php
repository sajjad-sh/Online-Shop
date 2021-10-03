@extends('layouts.admin')

@section('title', 'مدیریت سایت')

@section('content')

  <!-- TODO: Review code and move to components -->
    <h1>مدیریت سایت</h1><br>

    <ul class="list-group">
        <li class="list-group-item"><a href="#">مدیریت منوی اصلی</a></li>
        <li class="list-group-item"><a href="{{route('admin.site.sliders.index')}}">مدیریت اسلایدرها</a></li>
    </ul>

@endsection
