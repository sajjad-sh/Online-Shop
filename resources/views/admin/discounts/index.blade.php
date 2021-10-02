@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست تخفیفات')

@section('content')

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
        <!-- TODO: toJalali dates -->
        <td>{{$discount->created_at}}</td>
        <td>
          <a href="{{route('admin.discounts.edit', $discount)}}" style="color: black;"><i
              class="fas fa-edit"></i></a> &nbsp;

          <form action="{{route('admin.discounts.destroy', $discount)}}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit"
                    style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block">
              <i class="fas fa-trash" title="حذف"></i>
            </button>

          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection
