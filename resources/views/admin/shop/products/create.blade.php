@extends('layouts.admin')

@section('title', 'پنل مدیریت - ایجاد محصول جدید')

@section('content-wrapper')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <form class="form-horizontal" method="post" action="{{route('admin.shop.products.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body" style="padding: 20px">

                <h4 class="card-title">ایجاد محصول جدید</h4>
                <br>
                @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                  @endforeach
                @endif
                <div class="form-group row">
                  <br>

                  <div class="col-sm-9">
                    <input value="{{ old('fa_title') }}" type="text" class="form-control" id="fa-title" name="fa_title" placeholder="نام فارسی"
                    />
                  </div>
                  <div id="primary-fields" class="col-sm-9">
                    <input value="{{ old('en_title') }}" type="text" class="form-control" id="en-title" name="en_title" placeholder="نام انگلیسی"
                    />

                    <input value="{{ old('slug') }}" type="text" class="form-control" id="slug" name="slug" placeholder="نشانک"/>

                    <label for="description">شرح کوتاه</label>
                    <textarea id="description" class="form-control" rows="20" name="description" placeholder="شرح کوتاه">{{ old('description') }}</textarea>

                    <label for="price">قیمت</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="قیمت"
                    value="{{ old('price') }}"/>

                    <label for="inventory">موجودی</label>
                    <input value="{{ old('inventory') }}" type="number" class="form-control" id="inventory" name="inventory" placeholder="موجودی"/>

                    <label for="review">نقد و بررسی</label> <br>
                    <textarea class="form-control" rows="20" name="review">{{ old('review') }}</textarea>
                  </div>

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
                  <input style="width: 200px;" type="number" class="form-control" id="amazing_id" name="amazing_id" value="{{ old('amazing_id') }}"/>

                  <label for="formFileMultiple" class="form-label">عکس اصلی</label>
                  <input value="{{ old('file') }}" style="width: auto" name="file" class="form-control" type="file" id="formFileMultiple">

                  <label for="formFileMultiple" class="form-label">انتخاب دسته جمعی سایر عکس ها</label>
                  <input value="{{ old('files') }}" style="width: auto" name="files[]" class="form-control" type="file" id="formFileMultiple" multiple>

                  <br>
                  <br>

                  <select id="catSelect" name="categories[]" class="form-select" multiple aria-label="multiple select example">
                    <option disabled selected>انتخاب دسته بندی</option>
                    @foreach($categories as $category)
                      <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                  </select>

                  <br><br>
                  <label for="brandSelect" class="form-label">برند:</label>
                  <input value="{{ old('brand') }}" type="text" id="brandSelect" name="brand"> <br>

                  <label for="colorSelect" class="form-label">رنگ:</label>
                  <input value="{{ old('color') }}" type="text" id="colorSelect" name="color">

                  <br>
                  <br>
                  <input type="button" onclick="addInput()" value="افزودن مشخصات فنی دیگر"/> <br>

                  <span id="responce"></span>
                  <script>
                    function addInput()
                    {
                      document.getElementById('responce').innerHTML+='<br/><input style="width: 100px;" type="text" name="mykeys[]" id="mykeys[]" value="" /> : <input style="width: 100px" type="text" name="myvalues[]" id="myvalues[]" value="" /><br/>';
                    }
                  </script>


                  <div class="border-top">
                    <div class="card-body">
                      <br>
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
