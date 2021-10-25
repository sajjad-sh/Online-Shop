@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست نظرات')

@section('content')

  <!-- TODO: Seed and add relations to tables -->
  <h1>فهرست نظرات</h1><br>

  <br>
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <li style="color: red;">{{ $error }}</li>
    @endforeach
  @endif

  <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">شناسه</th>
      <th scope="col">شناسه کاربری</th>
      <th scope="col">شناسه محصول</th>
      <th scope="col">متن دیدگاه</th>
      <th scope="col">وضعیت تائید</th>
      <th scope="col">علت عدم تائید</th>
      <th scope="col">تعداد لایک</th>
      <th scope="col">تعداد دیسلایک</th>
      <th scope="col">تاریخ ایجاد</th>
      <th scope="col">عملیات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
      <tr>
        <th scope="row">{{$comment->id}}</th>
        <th scope="row">{{$comment->user_id}}</th>
        <td>{{$comment->product_id}}</td>
        <td>{{$comment->content}}</td>
        <td>
          <span style="color: {{__("comment.color.$comment->is_verify")}}">
            {{__("comment.status.$comment->is_verify")}}
          </span>
        </td>
        <td>{{$comment->cancel_reason ? $comment->cancel_reason : '-'}}</td>
        <td>{{$comment->likes}}</td>
        <td>{{$comment->dislikes}}</td>
        <td>{{verta($comment->created_at)}}</td>

        <td style="text-align: center; width: 100px">

          @switch($comment->is_verify)
            @case(0)
              <form action="{{route('admin.shop.comments.verify', $comment)}}" method="post"
                    style="display: inline-block">
                @csrf
                @method('PATCH')

                <button type="submit"
                        style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block"
                        data-bs-toggle="modal" data-bs-target="#active">
                  <i class="fas fa-check" title="تائید"></i>
                </button>

                {{--              <x-alert id="active" title="هشدار" message="با انتخاب این گزینه کاربر بازیابی می‌شود. آیا مطمئنید ؟"/>--}}

              </form>
              <form action="{{route('admin.shop.comments.unverify', $comment)}}" method="post"
                    style="display: inline-block">
                @csrf
                @method('PATCH')
                <button type="button"
                        style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block"
                        data-bs-toggle="modal" data-bs-target="#unverify{{$comment->id}}">
                  <i class="fas fa-ban" title="عدم تائید"></i>
                </button>

                {{--              <x-alert id="ban" title="هشدار" message="با انتخاب این گزینه کاربر بن می‌شود. آیا مطمئنید ؟"/>--}}

                <div class="modal fade" id="unverify{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="mb-3">
                            <label for="cancel_reason" class="col-form-label">Reason:</label>
                            <textarea required class="form-control" id="cancel_reason" name="cancel_reason"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>

              </form>
            @break

            @case(1)
            <form action="{{route('admin.shop.comments.unverify', $comment)}}" method="post"
                  style="display: inline-block">
              @csrf
              @method('PATCH')
              <button type="button"
                      style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block"
                      data-bs-toggle="modal" data-bs-target="#unverify{{$comment->id}}">
                <i class="fas fa-ban" title="عدم تائید"></i>
              </button>

              {{--              <x-alert id="ban" title="هشدار" message="با انتخاب این گزینه کاربر بن می‌شود. آیا مطمئنید ؟"/>--}}
              <div class="modal fade" id="unverify{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModal2Label">New message</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="cancel_reason" class="col-form-label">Reason:</label>
                        <textarea required class="form-control" id="cancel_reason" name="cancel_reason"></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
              </div>

            </form>


            @break

            @case(2)
              <form action="{{route('admin.shop.comments.verify', $comment)}}" method="post"
                  style="display: inline-block">
              @csrf
              @method('PATCH')

              <button type="submit"
                      style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block"
                      data-bs-toggle="modal" data-bs-target="#active">
                <i class="fas fa-check" title="تائید"></i>
              </button>

              {{--              <x-alert id="active" title="هشدار" message="با انتخاب این گزینه کاربر بازیابی می‌شود. آیا مطمئنید ؟"/>--}}

            </form>
            @break

          @endswitch
            <form action="{{route('admin.shop.comments.destroy', $comment)}}" method="post"
                  style="display: inline-block">
              @csrf
              @method('DELETE')

              <button type="submit"
                      style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block"
                      data-bs-toggle="modal" data-bs-target="#delete">
                <i class="fas fa-trash" title="حذف دائم"></i>
              </button>

              {{--            <x-alert id="delete" title="هشدار" message="با انتخاب این گزینه کاربر حذف می‌شود. آیا مطمئنید ؟"/>--}}

            </form>
        </td>

      </tr>
    @endforeach
    </tbody>
  </table>

@endsection
