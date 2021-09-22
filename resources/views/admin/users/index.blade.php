@extends('layouts.app')

@section('title', 'پنل مدیریت - فهرست کاربران')

@section('content')

    <h1>فهرست کاربران</h1><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">شناسه</th>
            <th scope="col">شناسه سبد خرید جاری</th>
            <th scope="col">نام</th>
            <th scope="col">نام خانوادگی</th>
            <th scope="col">ایمیل</th>
            <th scope="col">شماره تماس</th>
            <th scope="col">نقش</th>
            <th scope="col">آدرس‌ها</th>
            <th scope="col">تاریخ عضویت</th>
            <th scope="col">وضعیت</th>
            <th scope="col">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->cart_id}}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->addresses}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->deleted_at ?'بن':'فعال'}}</td>

                <!-- TODO: patch not working -->
                <td style="text-align: center;">
                    @if($user->deleted_at)
                        <form action="{{route('admin.users.update', $user->id)}}" method="post"
                              style="display: inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                    style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block">
                                <i class="fas fa-check-square" title="فعال‌سازی"></i>
                            </button>
                        </form>
                    @else
                        <form action="{{route('admin.users.destroy', $user)}}" method="post"
                              style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block">
                                <i class="fas fa-ban" title="بن کردن"></i>
                            </button>
                        </form>
                    @endif&nbsp;
                    <form action="{{route('admin.users.forceDelete', $user)}}" method="post"
                          style="display: inline-block">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block">
                            <i class="fas fa-trash" title="حذف دائم"></i>
                        </button>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
