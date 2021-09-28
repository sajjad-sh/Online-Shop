@extends('layouts.app')

@section('title', 'پنل مدیریت - ویرایش محصول')

@section('content')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <form class="form-horizontal" method="post" action="{{route('admin.shop.categories.update', $category)}}">
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

                    <label for="price">شناسه دسته پدر</label>
                    <input type="number" class="form-control" id="parent_id" name="parent_id" placeholder="شناسه دسته پدر"
                           value="{{$category->parent_id}}"/>

                    <label for="inventory">آیکون</label>
                    <input type="url" class="form-control" id="icon" name="icon" placeholder="آدرس آیکون"
                           value="{{$category->icon}}"/>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="review">توضیحات</label> <br>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="20" name="description">{{$category->description}}</textarea>
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
