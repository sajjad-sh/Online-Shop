@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست دسته‌بندی‌ها')

@section('content-wrapper')

  <h1 style="display: inline-block">فهرست دسته‌بندی‌ها</h1>
  <a href="{{route('admin.shop.categories.create')}}" class="btn btn-primary" style="display: inline-block">افزودن</a>

  <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">شناسه</th>
      <th scope="col">دسته پدر</th>
      <th scope="col">slug</th>
      <th scope="col">نام</th>
      <th scope="col">آیکون</th>
      <th scope="col">تاریخ ایجاد</th>
      <th scope="col">عملیات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
      <tr>
        <th scope="row">{{$category->id}}</th>
        @if(isset($category->parent))
          <td>{{$category->parent->name}}</td>
        @else
          <td>کالا</td>
        @endif
        <td>{{$category->slug}}</td>
        <td>{{$category->name}}</td>
        <td>
          <i class="{{$category->icon}}"></i>
        </td>
        <td>{{verta($category->created_at)}}</td>

        <td style="text-align: center;">
          <button onclick="return confirm('آیا می‌خواهید این محصول را ویرایش کنید ؟')">
            <a href="{{route('admin.shop.categories.edit', $category)}}" style="color: black;"><i class="fas fa-edit"></i></a>
          </button>
          &nbsp;
          <form action="{{route('admin.shop.categories.destroy', $category)}}" method="post"
            style="display: inline-block">
            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('آیا می‌خواهید این محصول را حذف دائم کنید ؟')">
              <i class="fas fa-trash" title="حذف دائم"></i>
            </button>

          </form>
        </td>

      </tr>
    @endforeach
    </tbody>
  </table>

  <div style="text-align: center">
    {{ $categories->links() }}
  </div>

@endsection
