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
            <form class="form-horizontal" method="post"
                  action="{{route('admin.shop.attributes.storeTitle')}}">
              @csrf
              <div class="card-body">

                <h4 class="card-title">Create New Specification Title</h4>
                <br>
                @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                  @endforeach
                @endif
                <div class="form-group row">
                  <div class="col-sm-9">
                    <label for="key">کلید</label>
                    <input type="text" class="form-control" id="key" name="key" placeholder="کلید" />
                  </div>

                  <div class="col-sm-9">
                    <label for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="عنوان" />
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
@endsection
