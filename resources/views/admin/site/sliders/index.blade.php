@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست اسلایدرها')

@section('content-wrapper')

  <h1 style="display: inline-block">فهرست اسلایدرها</h1>
  <a href="{{route('admin.site.sliders.create')}}" class="btn btn-primary" style="display: inline-block">افزودن</a>

  <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">عنوان</th>
      <th scope="col">زیر عنوان</th>
      <th scope="col">توضیحات</th>
      <th scope="col">لینک</th>
      <th scope="col">عکس</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sliders as $slider)
      <tr>
        <td>{{$slider->title}}</td>
        <td>{{$slider->subtitle}}</td>
        <td>{{$slider->description}}</td>
        <td><a href="{{ $slider->link }}">کلیک کنید</a> </td>
        <td>
          <a href="{{ \Illuminate\Support\Facades\URL::to($slider->url) }}" target="_blank">
            <img style="width: 100px; height: 50px" src="{{ \Illuminate\Support\Facades\URL::to($slider->url) }}" alt="{{ $slider->alt }}">
          </a>
        </td>

        <td style="text-align: center;">
          <button onclick="return confirm('آیا می‌خواهید این محصول را ویرایش کنید ؟')">
            <a href="{{route('admin.site.sliders.edit', $slider)}}" style="color: black;"><i class="fas fa-edit"></i></a>
          </button>
          &nbsp;
          <form action="{{route('admin.site.sliders.destroy', $slider)}}" method="post"
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


@endsection
