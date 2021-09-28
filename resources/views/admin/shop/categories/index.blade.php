@extends('layouts.app')

@section('title', 'پنل مدیریت - فهرست دسته‌بندی‌ها')

@section('content')

  <h1 style="display: inline-block">فهرست دسته‌بندی‌ها</h1>
  <a href="{{route('admin.shop.categories.create')}}" class="btn btn-primary" style="display: inline-block">افزودن</a>

  <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">شناسه</th>
      <th scope="col">شناسه دسته‌بندی والد</th>
      <th scope="col">slug</th>
      <th scope="col">نام</th>
      <th scope="col">توضیح</th>
      <th scope="col">آیکون</th>
      <th scope="col">تاریخ ایجاد</th>
      <th scope="col">عملیات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
      <tr>
        <th scope="row">{{$category->id}}</th>
        <td>{{$category->parent_id}}</td>
        <td>{{$category->slug}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->description}}</td>
        <td>
          <a href="{{$category->icon}}" target="_blank">
            <img src="{{$category->icon}}" width="30" height="30">
          </a>
        </td>
        <td>{{$category->created_at}}</td>

        <td style="text-align: center;">
          <a href="{{route('admin.shop.categories.edit', $category)}}" style="color: black;"><i
              class="fas fa-edit"></i></a>
          &nbsp;
          <form action="{{route('admin.shop.categories.destroy', $category)}}" method="post"
                style="display: inline-block">
            @csrf
            @method('DELETE')

            <button type="submit"
                    style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block">
              <i class="fas fa-trash" title="حذف دائم"></i>
            </button>

          </form>
        </td>

      </tr>
    @endforeach
    </tbody>
  </table>

@endsection
