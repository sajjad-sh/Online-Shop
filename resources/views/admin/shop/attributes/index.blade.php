@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست خصوصیات')

@section('content-wrapper')

  <h1 style="display: inline-block;">فهرست عناوین خصوصیات</h1>
  <a href="{{route('admin.shop.attributes.createTitle')}}" class="btn btn-primary" style="display: inline-block">افزودن</a>

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
    @foreach($att_titles as $att_title)
        <tr>
          <th scope="row">{{$att_title->id}}</th>
          <td>{{$att_title->key}}</td>
          <td>{{$att_title->title}}</td>

          <td style="text-align: center;">
              &nbsp;
            <form action="{{route('admin.shop.attributes.destroyTitle', $att_title)}}" method="post" style="display: inline-block">
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

  <h1 style="display: inline-block;">فهرست خصوصیت - مقدار</h1>
  <a href="{{route('admin.shop.attributes.create')}}" class="btn btn-primary" style="display: inline-block">افزودن</a>

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
    @foreach($att_titles as $att_title)
      @foreach($att_title->att_values as $att_value)
        <tr>
          <th scope="row">{{$att_value->id}}</th>
          <td>{{$att_title->key}}</td>
          <td>{{$att_title->title}}</td>
          <td>{{$att_value->value}}</td>

          <td style="text-align: center;">
            <a href="{{route('admin.shop.attributes.edit', $att_value)}}" style="color: black;"><i
                class="fas fa-edit"></i></a> &nbsp;

            &nbsp;
            <form action="{{route('admin.shop.attributes.destroy', $att_value->id)}}" method="post"
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
