@extends('layouts.admin')

@section('title', 'ایجاد اسلایدر')

@section('content-wrapper')
  <h1>ایجاد یک اسلاید جدید</h1>
  <br><br>
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <li style="color: red;">{{ $error }}</li>
    @endforeach
  @endif
  <br><br>
  <form action="{{route('admin.site.sliders.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="alt" class="form-label">متن جایگزین عکس</label>
      <input name="alt" class="form-control" type="text" aria-label="default input example" value="{{old('alt')}}">

      <label for="link" class="form-label">لینک</label>
      <input dir="ltr" name="link" class="form-control" type="text" aria-label="default input example" value="{{old('link')}}">

      <label for="title" class="form-label">عنوان اسلایدر</label>
      <input name="title" class="form-control" type="text" aria-label="default input example" value="{{old('title')}}">

      <label for="subtitle" class="form-label">زیر عنوان اسلایدر</label>
      <input name="subtitle" class="form-control" type="text" aria-label="default input example" value="{{old('subtitle')}}">

      <div class="form-floating">
        <textarea name="description" class="form-control" placeholder="توضیحات بیشتر" id="extra"
                  style="height: 100px">{{old('description')}}</textarea>
        <label for="extra">توضیحات</label>
      </div>

      <label for="file" class="form-label">انتخاب فایل</label>
      <input name="file" class="form-control" type="file" id="slider-file" value="{{old('file')}}">

      <br>

        <select name="category_id" class="form-select" id="floatingSelect" aria-label="Floating label select example" >
          <option selected>انتخاب دسته بندی</option>
          <option value="0">صفحه اصلی</option>

          @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>

      <br>

      <input name="is_primary" class="form-check-input me-1" type="checkbox" value="1" aria-label="...">
      عکس اصلی ؟

      <br><br>
      <button class="btn btn-primary" type="submit">Submit</button>
    </div>
  </form>
@endsection
