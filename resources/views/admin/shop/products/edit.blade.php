@extends('layouts.admin')

@section('title', 'پنل مدیریت - ایجاد محصول جدید')

@section('content-wrapper')



  <!-- TODO: Complete Product edit -->
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="container-fluid" style="padding-right: 120px;">

      <div class="row">
        <div class="col">
          <div class="card">
            <form class="form-horizontal" method="post" action="{{route('admin.shop.products.update', $product)}}">
              @csrf
              @method('PATCH')
              <div class="card-body">

                <h4 class="card-title">ویرایش محصول {{$product->id}}</h4>
                <br>
                @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                  @endforeach
                @endif
                <div class="form-group row">
                  <br>

                  <div class="col-sm-9">
                    <label for="fa-title">نام فارسی</label>

                    <input type="text" class="form-control" id="fa-title" name="fa_title" placeholder="عنوان فارسی"
                      value="{{$product->fa_title}}"/>
                  </div>
                  <div id="primary-fields" class="col-sm-9">
                    <label for="en-title">نام انگلیسی</label>
                    <input type="text" class="form-control" id="en-title" name="en_title" placeholder="عنوان انگلیسی"
                      value="{{$product->en_title}}"/>

                    <label for="description">شرح کوتاه</label>
                    <textarea id="description" class="form-control" rows="20" name="description">{{$product->description}}</textarea>

                    <label for="price">قیمت</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="قیمت"
                      value="{{$product->price}}"/>

                    <label for="inventory">موجودی</label>
                    <input type="number" class="form-control" id="inventory" name="inventory" placeholder="موجودی"
                      value="{{$product->inventory}}"/>


                    <label for="p_titles[]">مشخصات اصلی</label>
                    <button type="button" class="btn btn-default" onclick="addSelectField()">+</button>

                    <br>

                    @foreach($product->primary_attributes as $p_title => $p_value)
                      <select class="form-control select2 select2-{{$loop->iteration}}" style="width: 30%; display: inline-block;" name="p_titles[]"
                        id="p_titles[]">
                        <option value="" selected="selected">{{$p_title}}</option>
                        @foreach($all_titles as $title)
                          @if($title == $p_title)
                            @continue
                          @endif
                          <option value="{{$title->id}}">{{$title->title}}</option>
                        @endforeach
                      </select>

                      <select class="form-control select2 select2-{{$loop->iteration + 1}}" style="width: 30%; display: inline-block;" name="p_values[]"
                        id="p_values[]">
                        <option selected="selected">{{$p_value}}</option>
                        @foreach($all_values as $value)
                          @if($value == $p_value)
                            @continue
                          @endif
                          <option value="{{$value->id}}">{{$value->value}}</option>
                        @endforeach
                      </select>
                      <script>

                      </script>

                      <br>
                    @endforeach
                    <br>
                    <script>
                      var p_div = document.getElementById('primary-fields');

                      function addSelectTitle(name) {
                        var select = document.getElementById("p_titles[]");
                        var select = select.cloneNode(true);

                        select.name = name;
                        select.id = name;
                        p_div.appendChild(select);
                      }

                      function addSelectValue(name) {
                        var select = document.getElementById("p_values[]");
                        var select = select.cloneNode(true);

                        select.name = name;
                        select.id = name;
                        p_div.appendChild(select);
                      }

                      function addSelectField() {
                        p_div.appendChild(document.createElement("br"));
                        addSelectTitle("p_titles[]");
                        addSelectValue("p_values[]");
                      }


                      var s_div = document.getElementById('specific-fields');

                      function addInputTitle(name) {
                        var input = document.getElementById("s_titles[]");
                        var input = input.cloneNode(true);

                        input.name = name;
                        input.id = name;
                        s_div.appendChild(input);
                      }

                      function addInputValue(name) {
                        var input = document.getElementById("s_values[]");
                        var input = input.cloneNode(true);

                        input.name = name;
                        input.id = name;
                        s_div.appendChild(input);
                      }

                      function addInputField() {
                        s_div.appendChild(document.createElement("br"));
                        addInputTitle("s_titles[]");
                        addInputValue("s_values[]");
                      }
                    </script>

                    <label for="p_titles[]">مشخصات ثانویه</label>
                    <button type="button" class="btn btn-default" onclick="addSelectField()">+</button>
                    <br>
                    @foreach($product->secondary_attributes as $p_title => $p_value)
                      <select class="form-control select2 select2-{{$loop->iteration}}" style="width: 30%; display: inline-block;" name="s_titles[]"
                        id="s_titles[]">
                        <option value="" selected="selected">{{$p_title}}</option>
                        @foreach($all_titles as $title)
                          @if($title == $p_title)
                            @continue
                          @endif
                          <option value="{{$title->id}}">{{$title->title}}</option>
                        @endforeach
                      </select>

                      <select class="form-control select2 select2-{{$loop->iteration + 1}}" style="width: 30%; display: inline-block;" name="s_values[]"
                        id="s_values[]">
                        <option value="" selected="selected">{{$p_value}}</option>
                        @foreach($all_values as $value)
                          @if($value == $p_value)
                            @continue
                          @endif
                          <option value="{{$value->id}}">{{$value->value}}</option>
                        @endforeach
                      </select>
                      <br>
                    @endforeach
                    <br>
                    <script>
                      var p_div = document.getElementById('primary-fields');

                      function addSelectTitle(name) {
                        var select = document.getElementById("p_titles[]");
                        var select = select.cloneNode(true);

                        select.name = name;
                        select.id = name;
                        p_div.appendChild(select);
                      }

                      function addSelectValue(name) {
                        var select = document.getElementById("p_values[]");
                        var select = select.cloneNode(true);

                        select.name = name;
                        select.id = name;
                        p_div.appendChild(select);
                      }

                      function addSelectField() {
                        p_div.appendChild(document.createElement("br"));
                        addSelectTitle("p_titles[]");
                        addSelectValue("p_values[]");
                      }


                      var s_div = document.getElementById('specific-fields');

                      function addInputTitle(name) {
                        var input = document.getElementById("s_titles[]");
                        var input = input.cloneNode(true);

                        input.name = name;
                        input.id = name;
                        s_div.appendChild(input);
                      }

                      function addInputValue(name) {
                        var input = document.getElementById("s_values[]");
                        var input = input.cloneNode(true);

                        input.name = name;
                        input.id = name;
                        s_div.appendChild(input);
                      }

                      function addInputField() {
                        s_div.appendChild(document.createElement("br"));
                        addInputTitle("s_titles[]");
                        addInputValue("s_values[]");
                      }
                    </script>

                  </div>

                  <div id="specific-fields" class="col-sm-9">

                    <label for="status">وضعیت</label>

                    <select class="form-select primary_spec" aria-label="Default select example" name="status"
                      id="status">
                      <option value="1" selected>انتخاب وضعیت</option>
                        <option value="{{$product->status}}" selected>{{__("product.status.$product->status")}}</option>
                      @for($i=0; $i<5; $i++)
                        <option value="{{$i}}">{{__("product.status.$i")}}</option>
                      @endfor
                    </select>

                    <br>

                    <label for="amazing_id">شناسه تخفیف شگفت انگیز</label>
                    <input style="width: 200px;" type="number" class="form-control" id="amazing_id" name="amazing_id" value="{{$product->amazing_id}}"/>

                    <div class="form-group row">
                      <label for="review">نقد و بررسی</label> <br>
                      <div class="col-sm-9">
                        <textarea class="form-control" rows="20" name="review">{{$product->review}}</textarea>
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

  </div>
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })
  </script>
@endsection
