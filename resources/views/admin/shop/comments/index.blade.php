@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست نظرات')

@section('content-wrapper')


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
                        style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block">
                  <i class="fas fa-check" title="تائید" onclick="return confirm('آیا می‌خواهید این دیدگاه را تائید کنید ؟')"></i>
                </button>
              </form>
              <form action="{{route('admin.shop.comments.unverify', $comment)}}" method="post"
                    style="display: inline-block">
                @csrf
                @method('PATCH')
                <button type="button"
                        style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block" data-toggle="modal" data-target="#exampleModal-{{$comment->id}}">
                  <i class="fas fa-ban" title="عدم تائید"></i>
                </button>

                <div class="modal fade" id="exampleModal-{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">علت لغو را بنویسید (این پیام برای کاربر ایمیل می‌شود)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <textarea class="form-control" id="cancel_reason" name="cancel_reason"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">لغو</button>
                        <button type="submit" class="btn btn-primary">ثبت</button>
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
                      style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block" data-toggle="modal" data-target="#exampleModal-{{$comment->id}}">
                <i class="fas fa-ban" title="عدم تائید"></i>
              </button>

              <div class="modal fade" id="exampleModal-{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">علت لغو را بنویسید (این پیام برای کاربر ایمیل می‌شود)</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <textarea class="form-control" id="cancel_reason" name="cancel_reason"></textarea>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">لغو</button>
                      <button type="submit" class="btn btn-primary">ثبت</button>
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
                      style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block">
                <i class="fas fa-check" title="تائید" onclick="return confirm('آیا می‌خواهید این دیدگاه را تائید کنید ؟')"></i>
              </button>

            </form>
            @break

          @endswitch
            <form action="{{route('admin.shop.comments.destroy', $comment)}}" method="post"
                  style="display: inline-block">
              @csrf
              @method('DELETE')

              <button type="submit"
                      style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block">
                <i class="fas fa-trash" title="حذف دائم" onclick="return confirm('آیا می‌خواهید این دیدگاه را حذف کنید ؟')"></i>
              </button>
            </form>
        </td>

      </tr>
    @endforeach
    </tbody>
  </table>

  {{$comments->links()}}


@endsection
