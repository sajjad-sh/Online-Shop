@extends('layouts.admin')

@section('title', 'پنل مدیریت - فهرست محصولات')

@section('content')

    <h1>فهرست محصولات</h1><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">شناسه</th>
            <th scope="col">تخفیف شگفت انگیز</th>
            <th scope="col">عنوان فارسی</th>
            <th scope="col">عنوان انگلیسی</th>
            <th scope="col">قیمت</th>
            <th scope="col">موجودی</th>
            <th scope="col">تعداد فروش</th>
            <th scope="col">تعداد بازدید</th>
            <th scope="col">وضعیت</th>
            <th scope="col">تاریخ ایجاد</th>
            <th scope="col">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->amazing_id}}</td>
                <td>{{$product->fa_title}}</td>
                <td>{{$product->en_title}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->inventory}}</td>
                <td>{{$product->sales}}</td>
                <td>{{$product->visits}}</td>
                <td>{{$product->status}}</td>
                <td>{{$product->created_at}}</td>

                <td style="text-align: center;">
                    <a href="{{route('admin.shop.products.edit', $product)}}" style="color: black;"><i
                            class="fas fa-edit"></i></a> &nbsp;

                    @if($product->deleted_at)
                        <form action="{{route('admin.shop.products.restore', $product)}}" method="post"
                              style="display: inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                    style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block">
                                <i class="fas fa-trash-restore" title="بازیابی"></i>
                            </button>
                        </form>
                    @else
                        <form action="{{route('admin.shop.products.destroy', $product)}}" method="post"
                              style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    style="color: black; background: none;	border: none; 	padding: 0;	font: inherit;	cursor: pointer;	outline: inherit; display: inline-block">
                                <i class="fas fa-eraser" title="انتقال به زباله‌دان"></i>
                            </button>
                        </form>
                    @endif&nbsp;
                    <form action="{{route('admin.shop.products.delete', $product)}}" method="post"
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
