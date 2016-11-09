@extends('layouts.backend')
@section('title', 'Products')
@section('content')
    <h2 class="page-header"><i class="fa fa-shopping-cart"></i> Quản lý sản phẩm
        <a href="{{ route('backend.product.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> <span class="hidden-sm hidden-xs">Thêm sản phẩm</span></a>
    </h2>

    <h4 class="sub-header">Danh sách sản phẩm</h4>
    <div class="row">
        <form class="" role="search">
            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="input-group form-group">
                    <input type="text" class="form-control" placeholder="Từ khóa tìm kiếm...">
                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">Tìm kiếm</button>
                                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

        </form>
    </div>
    <div class="table-responsive ">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Ảnh sản phẩm</th>
                <th>Giá</th>
                <th>Bán chạy</th>
                <th>Giảm giá </th>
                <th>Hiển thị</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @if($products->isEmpty())
                <tr>
                    <td colspan="8" align="center">There are no pages.</td>
                </tr>
            @else
                @foreach($products as $product)
                    <tr class="{{ $product->hidden ? 'warning' : '' }}">
                        <td>{{$product->name}}</td>
                        <td>{{$product->category_id}}</td>
                        <td>{{ $product->image1 }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->is_hot }}</td>
                        <td>{{ $product->is_sale }}</td>
                        <td>@if($product->active == 0){{ 'Ẩn' }}@else {{ 'Hiện' }}@endif</td>
                        <td>
                            <a href="{{ route('backend.product.edit', $product->id) }}" title="Edit">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{ route('backend.product.confirm', $product->id) }}" title="Delete">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    </div>
@endsection
