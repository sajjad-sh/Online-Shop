@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست تخفیفات')

@section('content-wrapper')

  <h1 style="display:inline-block;">فهرست تخفیفات</h1> &nbsp;
  <a href="{{route('admin.discounts.create')}}" class="btn btn-primary" style="display: inline-block">افزودن</a>

  <!-- TODO: filter and search for all tables -->
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
      <th scope="col">عملیات</th>
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
        <td>{{verta($discount->created_at)}}</td>
        <td>
          <a href="{{route('admin.discounts.edit', $discount)}}" style="color: black;">
            <button class="btn btn-app" onclick="return confirm('آیا می‌خواهید این کاربر را ویرایش کنید ؟')">
              <i class="fa fa-pencil" title="ویرایش"></i>
              ویرایش
            </button>
          </a>

          <form action="{{route('admin.discounts.destroy', $discount)}}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-app" onclick="return confirm('آیا می‌خواهید این کاربر را حذف کنید ؟')">
              <i class="fa fa-pencil" title="حذف"></i>حذف
            </button>

          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div style="text-align: center">
    {{ $discounts->links() }}
  </div>

@endsection
