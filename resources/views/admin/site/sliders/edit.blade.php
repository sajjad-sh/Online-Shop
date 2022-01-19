@extends('layouts.admin')

@section('title', 'ویرایش اسلایدر')

@section('content-wrapper')
  <h1>ویرایش اسلاید</h1>
  <br><br>
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <li style="color: red;">{{ $error }}</li>
    @endforeach
  @endif
  <br><br>
  <form action="{{route('admin.site.sliders.update', $slider->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="alt" class="form-label">متن جایگزین عکس</label>
      <input name="alt" class="form-control" type="text" aria-label="default input example" value="{{ $slider->alt }}">

      <label for="link" class="form-label">لینک</label>
      <input dir="ltr" name="link" class="form-control" type="text" aria-label="default input example" value="{{ $slider->link }}">

      <label for="title" class="form-label">عنوان اسلایدر</label>
      <input name="title" class="form-control" type="text" aria-label="default input example" value="{{ $slider->title }}">

      <label for="subtitle" class="form-label">زیر عنوان اسلایدر</label>
      <input name="subtitle" class="form-control" type="text" aria-label="default input example" value="{{ $slider->subtitle }}">

      <div class="form-floating">
        <textarea name="description" class="form-control" placeholder="توضیحات بیشتر" id="extra"
                  style="height: 100px">{{ $slider->description }}</textarea>
        <label for="extra">توضیحات</label>
      </div>

      <label for="file" class="form-label">فایل قبلی</label>
      <img style="width: 100px; height: 50px;" src="{{ \Illuminate\Support\Facades\URL::to($slider->url) }}" alt="">

      <br><br>
      <label for="file" class="form-label">جایگزینی فایل</label>
      <input name="file" class="form-control" type="file" id="slider-file">

      <br>



      <br>



      <br><br>
      <button class="btn btn-primary" type="submit">Submit</button>
    </div>
  </form>
@endsection
