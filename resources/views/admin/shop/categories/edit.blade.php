@extends('layouts.admin')

@section('title', 'پنل مدیریت - ویرایش محصول')

@section('content-wrapper')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <form class="form-horizontal" method="post" action="{{route('admin.shop.categories.update', $category)}}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="card-body">

                <h4 class="card-title">Edit Category #{{$category->id}}</h4>
                <br>
                @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                  @endforeach
                @endif
                <div class="form-group row">
                  <br>

                  <div class="col-sm-9">
                    <label for="fa-title">نام</label>

                    <input type="text" class="form-control" id="name" name="name" placeholder="نام"
                           value="{{$category->name}}"/>
                  </div>
                  <div class="col-sm-9">
                    <label for="en-title">slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug"
                           value="{{$category->slug}}"/>

                    <label for="parent_id">دسته والد</label>
                    <br>
                    <select name="parent_id" id="parent_id" class="form-select" aria-label="Default select example">
                      <option value="{{$category->parent_id}}" selected>{{$category->parent->name}}</option>
                      @forelse($categories as $current_category)
                        <option value="{{$current_category->id}}">{{$current_category->name}}</option>
                      @empty
                        <p>دسته‌بندی یافت نشد</p>
                      @endforelse
                    </select>


                    <br>
                    <label for="inventory">آیکون</label>
                    <input type="text" class="form-control" id="icon" name="icon" placeholder="آیکون"
                           value="{{$category->icon}}"/>

                    <br>
                    <label for="file" class="form-label">انتخاب فایل</label>
                    <input name="file" class="form-control" type="file" id="file" value="{{old('file')}}">

                    @if(isset($category->image))
                      <img style="width: 70px; height: 70px" src="{{$category->image}}">
                    @endif

                    <br>

                  </div>
                </div>
              </div>
              <div class="border-top">
                <div class="card-body">
                  <button type="submit" class="btn btn-primary">
                    Submit
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

  </div>
@endsection
