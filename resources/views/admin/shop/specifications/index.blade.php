@extends('layouts.app')

@section('title', 'پنل مدیریت - فهرست دسته‌بندی‌ها')

@section('content')

  <h1>فهرست عناوین خصوصیات</h1><br>
  <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">شناسه</th>
      <th scope="col">کلید</th>
      <th scope="col">عنوان</th>
      <th scope="col">عملیات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($primary_specification_titles as $primary_specification_title)
        <tr>
          <th scope="row">{{$primary_specification_title->id}}</th>
          <td>{{$primary_specification_title->key}}</td>
          <td>{{$primary_specification_title->title}}</td>

          <td style="text-align: center;">
            <a href="" style="color: black;"><i
                class="fas fa-edit"></i></a> &nbsp;

              &nbsp;
            <form action="" method="post"
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

  <h1>فهرست خصوصیت - مقدار</h1><br>
  <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">شناسه</th>
      <th scope="col">کلید</th>
      <th scope="col">عنوان</th>
      <th scope="col">مقدار</th>
      <th scope="col">عملیات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($primary_specification_titles as $primary_specification_title)
      @foreach($primary_specification_title->primary_specification_values as $primary_specification_value)
        <tr>
          <th scope="row">{{$primary_specification_value->id}}</th>
          <td>{{$primary_specification_title->key}}</td>
          <td>{{$primary_specification_title->title}}</td>
          <td>{{$primary_specification_value->value}}</td>

          <td style="text-align: center;">
            <a href="{{route('admin.shop.specifications.edit', $primary_specification_value)}}" style="color: black;"><i
                class="fas fa-edit"></i></a> &nbsp;

            &nbsp;
            <form action="{{route('admin.shop.specifications.destroy', $primary_specification_value->id)}}" method="post"
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
    @endforeach
    </tbody>
  </table>

@endsection
