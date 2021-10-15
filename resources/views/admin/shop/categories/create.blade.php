@extends('layouts.admin')

@section('title', 'پنل مدیریت - ایجاد دسته‌بندی')

@section('content-wrapper')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <form class="form-horizontal" method="post" action="{{route('admin.shop.categories.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body" style="margin: 10px">

                <h4 class="card-title">Create Category</h4>
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
                           />
                  </div>
                  <div class="col-sm-9">
                    <label for="en-title">slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug"
                           />

                    <label for="parent_id">دسته والد</label>
                    <br>
                    <select name="parent_id" id="parent_id" class="form-select" aria-label="Default select example">
                      <option value="0" selected>کالا</option>
                      @forelse($categories as $category)
                        @if($category->id == 0)
                          @continue
                        @endif
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @empty
                          <p>دسته‌بندی یافت نشد</p>
                      @endforelse
                    </select>

                    <br>
                    <label for="inventory">آیکون</label>
                    <input type="text" class="form-control" id="icon" name="icon" placeholder="آیکون" >

                    <br>
                    <label for="file" class="form-label">انتخاب فایل</label>
                    <input name="file" class="form-control" type="file" id="file">

                    <br>

                  </div>
                </div>
              <div class="border-top">
                <div class="card-body">
                  <button type="submit" class="btn btn-primary">
                    Submit
                  </button>
                </div>

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
