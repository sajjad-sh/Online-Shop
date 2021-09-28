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
            <form class="form-horizontal" method="post" action="{{route('admin.shop.products.update', $product)}}">
              @csrf
              @method('PATCH')
              <div class="card-body">

                <h4 class="card-title">Edit product #{{$product->id}}</h4>
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
                  <div class="col-sm-9">
                    <label for="en-title">نام انگلیسی</label>
                    <input type="text" class="form-control" id="en-title" name="en_title" placeholder="عنوان انگلیسی"
                           value="{{$product->en_title}}"/>

                    <label for="price">قیمت</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="قیمت"
                           value="{{$product->price}}"/>

                    <label for="inventory">موجودی</label>
                    <input type="number" class="form-control" id="inventory" name="inventory" placeholder="موجودی"
                           value="{{$product->inventory}}"/>

                    <label for="specification">مشخصات فنی ثابت</label>
                    <br>
                    <!--TODO: show previous specifiaction key/value -->
                    <!--TODO: multiple specifiaction key/value -->
                    @foreach($product->primary_specification_values as $primary_specification_value)
                      <select class="form-select primary_spec" aria-label="Default select example"
                              name="primary_specification_titles[]" id="primary_specification_titles[]">

                        <option selected>عنوان مشخصه فنی ثابت</option>
                        @foreach($primary_specification_titles as $primary_specification_title)
                          <option
                            value="{{$primary_specification_title->id}}">{{$primary_specification_title->title}}</option>
                        @endforeach
                      </select>

                      <select class="form-select primary_spec" aria-label="Default select example"
                              name="primary_specification_values[]" id="primary_specification_values[]">
                        <option selected>مقدار مشخصه فنی ثابت</option>
                        @foreach($primary_specification_titles as $primary_specification_title)
                          @foreach($primary_specification_title->primary_specification_values as $primary_specification_value)
                            <option
                              value="{{$primary_specification_value->id}}">{{$primary_specification_value->value}}</option>
                          @endforeach
                        @endforeach
                      </select>
                    @endforeach

                    <br><br>
                    <select class="form-select primary_spec" aria-label="Default select example"
                            name="primary_specification_titles[]" id="primary_specification_titles[]">
                      <option selected>عنوان مشخصه فنی ثابت</option>
                      @foreach($primary_specification_titles as $primary_specification_title)
                        <option
                          value="{{$primary_specification_title->id}}">{{$primary_specification_title->title}}</option>
                      @endforeach
                    </select>
                    <select class="form-select primary_spec" aria-label="Default select example"
                            name="primary_specification_values[]" id="primary_specification_values[]">
                      <option selected>مقدار مشخصه فنی ثابت</option>
                      @foreach($primary_specification_titles as $primary_specification_title)
                        @foreach($primary_specification_title->primary_specification_values as $primary_specification_value)
                          <option
                            value="{{$primary_specification_value->id}}">{{$primary_specification_value->value}}</option>
                        @endforeach
                      @endforeach
                    </select>
                    <button type="button" class="btn btn-default" id="addPrimarySpecification">+</button>

                    <script>
                      $('#addPrimarySpecification').click(function () {
                        var the_select1 = $("select[id=\"primary_specification_titles[]\"]");
                        var the_select2 = $("select[id=\"primary_specification_values[]\"]");
                        var the_div_of_wrapping = $("div[id=\"the_div_of_wrapping_ps\"]");

                        the_select1.clone();
                        the_div_of_wrapping.append(the_select1);

                        the_select2.clone();
                        the_div_of_wrapping.append(the_select2);
                      });
                    </script>

                    <div id="the_div_of_wrapping_ps"></div>


                    <label for="special_specifications_titles[]">مشخصات فنی این محصول</label>
                    <br>
                    @forelse($special_specifications as $key => $value)
                      <br>
                      <input type="text" name="special_specifications_titles[]" id="special_specifications_titles[]"
                             value="{{$key}}">
                      <input type="text" name="special_specifications_values[]" id="special_specifications_values[]"
                             value="{{$value}}">

                    @empty
                      مشخصه ای یافت نشد
                    @endforelse

                    <button type="button" class="btn btn-default" id="addSpecialSpecification">+</button>

                    <script>
                      $('#addSpecialSpecification').click(function () {
                        var the_input1 = $("input[id=\"special_specifications_titles[]\"]");
                        var the_input2 = $("input[id=\"special_specifications_values[]\"]");
                        var the_div_of_wrapping = $("div[id=\"the_div_of_wrapping_ss\"]");

                        the_input1.clone();
                        the_div_of_wrapping.append(the_input1);

                        the_input2.clone();
                        the_div_of_wrapping.append(the_input2);
                      });
                    </script>

                    <div id="the_div_of_wrapping_ss"></div>


                    <label for="status">وضعیت</label>

                    <select class="form-select primary_spec" aria-label="Default select example" name="status"
                            id="status">
                      <option value="{{$product->status}}" selected>{{__("product.status.$product->status")}}</option>
                      @for($i=0; $i<5; $i++)
                        @if($i == $product->status)
                          @continue;
                        @endif
                        <option value="{{$i}}">{{__("product.status.$i")}}</option>
                      @endfor
                    </select>

                    <br>
                    <label for="amazing_id">شناسه تخفیف شگفت انگیز</label>
                    <input type="text" class="form-control" id="amazing_id" name="amazing_id" placeholder="شگفت‌انگیز"
                           value="{{$product->amazing_id}}"/>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="review">نقد و بررسی</label> <br>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="20" name="review">{{$product->review}}</textarea>
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
