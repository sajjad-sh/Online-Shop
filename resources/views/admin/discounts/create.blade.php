@extends('layouts.admin')

@section('title', 'پنل مدیریت - افزودن تخفیف')

@section('content-wrapper')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <form class="form-horizontal" method="post" action="{{route('admin.discounts.store')}}">
              @csrf
              <div class="card-body">
                <h4 class="card-title">ایجاد کد تخفیف</h4>
                <br>
                @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                  @endforeach
                @endif

                <!-- TODO: @old for forms -->
                <!-- TODO: Front Validation -->
                <div class="form-group row">
                  <br>
                  <div class="col-sm-9">
                    <label for="code">کد تخفیف</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="کد تخفیف" />
                  </div>

                  <div class="col-sm-9">
                    <label for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="عنوان" />

                    <label for="type">نوع</label>
                    <select id="type" name="type" class="form-select" aria-label="Default select example">
                      <option selected>نوع</option>
                      <option value="0">درصدی</option>
                      <option value="1">مبلغی</option>
                    </select> <br>

                    <!-- TODO: New Field depend on value of previuos select tag -->
                    <label for="amount">مبلغ/درصد</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="مبلغ/درصد" />

                    <label for="inventory">موجودی</label>
                    <input type="number" class="form-control" id="inventory" name="inventory" placeholder="موجودی" />
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
