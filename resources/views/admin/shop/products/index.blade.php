@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست محصولات')

@section('content-wrapper')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <br>
          <h3 class="box-title">پنل مدیریت - فهرست محصولات</h3>
          <a href="{{route('admin.shop.products.create')}}" class="btn btn-primary" style="display: inline-block">افزودن</a>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="جستجو">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover" style=" margin: 34px 34px; width: 97%; ">
            <tr>
              <th>ردیف</th>
              <th>عنوان فارسی</th>
              <th>عنوان انگلیسی</th>
              <th>شناسه محصول</th>
              <th>تخفیف شگفت انگیز</th>
              <th>قیمت</th>
              <th>موجودی</th>
              <th>تعداد فروش</th>
              <th>تعداد بازدید</th>
              <th>وضعیت</th>
              <th>تاریخ ایجاد</th>
              <th>اقدامات</th>
            </tr>

            @foreach($products as $product)
              <tr>
                <th>{{ (($products->currentPage() - 1 ) * $products->perPage() ) + $loop->iteration }}</th>
                <td>{{$product->fa_title}}</td>
                <td>{{$product->en_title}}</td>
                <td>{{$product->id}}</td>
                <td>{{$product->amazing_id ?: '-'}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->inventory}}</td>
                <td>{{$product->sales}}</td>
                <td>{{$product->visits}}</td>
                <td>{{__("product.status.$product->status")}}</td>
                <td>{{$product->created_at}}</td>
                <td style="text-align: center;">

                  <a href="{{ route('admin.shop.products.edit', $product) }}" style="color: black;">
                    <button class="btn btn-app" onclick="return confirm('آیا می‌خواهید این محصول را ویرایش کنید ؟')">
                      <i class="fa fa-pencil" title="ویرایش"></i>
                      ویرایش
                    </button>
                  </a>

                  @if($product->deleted_at)
                    <form action="{{route('admin.shop.products.restore', $product)}}" method="post"
                      style="display: inline-block">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="btn btn-app" onclick="return confirm('آیا می‌خواهید این محصول را بازیابی کنید ؟')">
                        <i class="fa fa-window-restore"></i>بازیابی
                      </button>
                    </form>
                  @else
                    <form action="{{route('admin.shop.products.destroy', $product)}}" method="post"
                      style="display: inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-app" onclick="return confirm('آیا می‌خواهید این محصول را به زباله‌دان منتقل کنید ؟')">
                        <i class="fa fa-eraser"></i> انتقال به زباله‌دان
                      </button>

                    </form>
                  @endif&nbsp;

                  <form action="{{route('admin.shop.products.delete', $product)}}" method="post"
                    style="display: inline-block">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-app" onclick="return confirm('آیا می‌خواهید این محصول را برای همیشه حذف کنید ؟')">
                      <i class="fa fa-trash"></i> حذف دائم
                    </button>

                    {{--            <x-alert id="delete" title="هشدار" message="با انتخاب این گزینه کاربر حذف می‌شود. آیا مطمئنید ؟"/>--}}

                  </form>

                  </form>
                </td>


                @endforeach

              </tr>
          </table>
          <div style="text-align: center">
            {{ $products->links() }}
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection
