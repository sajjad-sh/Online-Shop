@extends('layouts.admin')

@section('title', 'پنل مدیریت - ایجاد محصول جدید')

@section('content')

  <!-- TODO: Complete Product edit -->
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <form class="form-horizontal" method="post" action="{{route('admin.shop.products.update', $product)}}">
              @csrf
              <div class="card-body">

                <h4 class="card-title">Create New product</h4>
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

                    <label for="price">قیمت</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="قیمت"
                           value="{{$product->price}}"/>

                    <label for="inventory">موجودی</label>
                    <input type="number" class="form-control" id="inventory" name="inventory" placeholder="موجودی"
                           value="{{$product->inventory}}"/>

                    <!-- TODO: Enable value when key selected -->
                    <label for="p_titles[]">مشخصات فنی ثابت</label>

                  <button type="button" class="btn btn-default" onclick="addSelectField()">+</button>
                  @foreach($product->primary_specification_values as $p_value)
                      <br>
                      <select class="form-select primary_spec" aria-label="Default select example" name="p_titles[]"
                              id="p_titles[]">
                        <option value="{{$p_value->primary_specification_title->id}}" selected>{{$p_value->primary_specification_title->title}}</option>

                        @foreach($all_titles as $all_title)
                          <option value="{{$all_title->id}}">
                            {{$all_title->title}}
                          </option>
                        @endforeach
                      </select>

                      <select class="form-select primary_spec" aria-label="Default select example" name="p_values[]"
                              id="p_values[]">
                        <option value="{{$p_value->id}}" selected>{{$p_value->title}}</option>
                        @foreach($all_values as $value)
                          @if($value == $p_value)
                            @continue
                          @endif
                          <option value="{{$value->id}}">{{$value->title}}</option>
                        @endforeach
                      </select>

                    @endforeach



                    {{--                    <select class="form-select primary_spec" aria-label="Default select example" name="p_titles[]"--}}
{{--                            id="p_titles[]">--}}
{{--                      <option selected>عنوان مشخصه فنی ثابت</option>--}}
{{--                      @foreach($titles as $title)--}}
{{--                        <option value="{{$title->id}}">{{$title->title}}</option>--}}
{{--                      @endforeach--}}
{{--                    </select>--}}
{{--                    --}}
{{--                    <select class="form-select primary_spec" aria-label="Default select example" name="p_values[]"--}}
{{--                            id="p_values[]">--}}
{{--                      <option selected>مقدار مشخصه فنی ثابت</option>--}}
{{--                      @foreach($values as $value)--}}
{{--                        <option value="{{$value->id}}">{{$value->value}}</option>--}}
{{--                      @endforeach--}}
{{--                    </select>--}}

                  </div>

                  <div id="specific-fields" class="col-sm-9">
                    <label for="s_titles">مشخصات فنی این محصول</label>
                    <br>

                    @foreach($s_values as $s_key => $s_value)
                      <input style="width: 150px;" type="text" class="form-control primary_spec" id="s_titles[]"
                             name="s_titles[]" value="{{$s_key}}">
                      <input style="width: 150px;" type="text" class="form-control primary_spec" id="s_values[]"
                             name="s_values[]" value="{{$s_value}}">
                      <br>
                    @endforeach
                    <br>
                    <input style="width: 150px;" type="text" class="form-control primary_spec" id="s_titles[]"
                           name="s_titles[]" placeholder="عنوان">
                    <input style="width: 150px;" type="text" class="form-control primary_spec" id="s_values[]"
                           name="s_values[]" placeholder="مقدار">

                    <button type="button" class="btn btn-default" onclick="addInputField()">+</button>
                  </div>

                  <script>
                    var p_div = document.getElementById('primary-fields');

                    function addSelectTitle(name) {
                      var select = document.getElementById("p_titles[]");
                      var select = select.cloneNode(true);

                      select.inner = '';
                      select.name = name;
                      select.id = name;
                      p_div.appendChild(select);
                    }

                    function addSelectValue(name) {
                      var select = document.getElementById("p_values[]");
                      var select = select.cloneNode(true);

                      select.inner = '';
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


                  <label for="status">وضعیت</label>

                  <select class="form-select primary_spec" aria-label="Default select example" name="status"
                          id="status">
                    <option value="1" selected>انتخاب وضعیت</option>
                    @for($i=0; $i<5; $i++)
                      <option value="{{$i}}">{{__("product.status.$i")}}</option>
                    @endfor
                  </select>

                  <br>

                  <label for="amazing_id">شناسه تخفیف شگفت انگیز</label>
                  <input style="width: 200px;" type="number" class="form-control" id="amazing_id" name="amazing_id"/>

                  <div class="form-group row">
                    <label for="review">نقد و بررسی</label> <br>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="20" name="review"> </textarea>
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
@endsection
