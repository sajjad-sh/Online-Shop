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
            <form class="form-horizontal" method="post"
                  action="{{route('admin.shop.specifications.create-value', $primary_specification_value->id)}}">
              @csrf
              <div class="card-body">

                <h4 class="card-title">Edit Specification #{{$primary_specification_value->id}}</h4>
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
                    <select name="title" class="form-select" aria-label="Default select example">
                      <option selected id="title"
                              >{{$primary_specification_value->primary_specification_title->title}}</option>
                      @foreach($primary_specification_titles as $primary_specification_title)
                        @if($primary_specification_title->title == $primary_specification_value->primary_specification_title->title)
                          @continue
                        @endif
                        <option
                                value="{{$primary_specification_title->id}}">{{$primary_specification_title->title}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-sm-9">
                    <label for="value">مقدار</label>
                    <input type="text" class="form-control" id="value" name="value" placeholder="مقدار"
                           value="{{$primary_specification_value->value}}"/>
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
