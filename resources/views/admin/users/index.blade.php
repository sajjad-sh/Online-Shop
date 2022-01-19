@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست کاربران')

@section('content-wrapper')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <br>
          <h3 class="box-title">پنل مدیریت - فهرست کاربران</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover" style=" margin: 34px 34px; width: 97%; ">
            <tr>
              <th>ردیف</th>
              <th>نام و نام خانوادگی</th>
              <th>شناسه کاربری</th>
              <th>شناسه سبد خرید جاری</th>
              <th>ایمیل</th>
              <th>شماره تماس</th>
              <th>نقش</th>
              <th>نشانی‌ها</th>
              <th>تاریخ عضویت</th>
              <th>وضعیت</th>
              <th>اقدامات</th>
            </tr>

            @foreach($users as $user)
              <tr>
                <th>{{ (($users->currentPage() - 1 ) * $users->perPage() ) + $loop->iteration }}</th>
                <td>{{$user->full_name}}</td>
                <td>{{$user->id}}</td>
                <td>{{$user->cart_id}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->role}}</td>
                <td></td>
                <td>{{verta($user->created_at)}}</td>
                <td>
                  @if($user->deleted_at)
                    <span class="label label-danger">مسدود</span>
                  @else
                    <span class="label label-success">فعال</span>
                  @endif
                </td>

                <td style="text-align: center;">
                  @if($user->deleted_at)
                    <form action="{{route('admin.users.update', $user->id)}}" method="post"
                      style="display: inline-block">
                      @csrf
                      @method('PATCH')

                      <button type="submit" class="btn btn-app"  onclick="return confirm('آیا می‌خواهید این کاربر را فعال کنید ؟')">
                        <i class="fa fa-toggle-on" title="فعال‌سازی"></i> فعال‌سازی
                      </button>

                      {{--              <x-alert id="active" title="هشدار" message="با انتخاب این گزینه کاربر بازیابی می‌شود. آیا مطمئنید ؟"/>--}}

                    </form>

                  @else
                    <form action="{{route('admin.users.destroy', $user)}}" method="post"
                      style="display: inline-block">
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="btn btn-app" onclick="return confirm('آیا می‌خواهید این کاربر را مسدود کنید ؟')">
                        <i class="fa fa-ban"></i> مسدودسازی
                      </button>

                      {{--              <x-alert id="ban" title="هشدار" message="با انتخاب این گزینه کاربر بن می‌شود. آیا مطمئنید ؟"/>--}}

                    </form>
                  @endif&nbsp;


                  <form action="{{route('admin.users.delete', $user)}}" method="post"
                    style="display: inline-block">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-app" onclick="return confirm('آیا می‌خواهید این کاربر را برای همیشه حذف کنید ؟')">
                      <i class="fa fa-trash"></i> حذف دائم
                    </button>

                    {{--            <x-alert id="delete" title="هشدار" message="با انتخاب این گزینه کاربر حذف می‌شود. آیا مطمئنید ؟"/>--}}

                  </form>
                </td>
              </tr>
            @endforeach

          </table>
          <div style="text-align: center">
            {{ $users->links() }}
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection
