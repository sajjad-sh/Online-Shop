@extends('layouts.admin')

@section('title', 'پنل مدیریت - ایجاد خصوصیت-مقدار')

@section('content')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <form class="form-horizontal" method="post" action="{{route('admin.shop.attributes.store')}}">
              @csrf
              <div class="card-body">

                <h4 class="card-title">Add Specification</h4>
                <br>
                @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                  @endforeach
                @endif
                <div class="form-group row">
                  <br>

                  <div class="col-sm-9">
                    <label for="title">عنوان</label>
                    <select name="att_title_id" id="att_title_id" class="form-select" aria-label="Default select example">
                      <option selected>Select</option>
                      @foreach($att_titles as $att_title)
                        <option value="{{$att_title->id}}">
                          {{$att_title->title}}
                        </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-sm-9">
                    <label for="value">مقدار</label>
                    <input type="text" class="form-control" id="value" name="value" placeholder="مقدار"/>
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
