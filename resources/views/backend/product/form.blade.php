@extends('layouts.backend')

@section('title', $product->exists ? 'Editing '.$product->title : 'Create New Product')

@section('content')
    <h2 class="page-header"><i class="fa fa-shopping-cart"></i>
        <span class="hidden-sm hidden-xs">Thêm sản phẩm</span>
    </h2>
    {!! Form::model($product, [
        'method' => $product->exists ? 'put' : 'post',
        'route' => $product->exists ? ['backend.product.update', $product->id] : ['backend.product.store']
    ]) !!}

    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('short_desc') !!}
        {!! Form::text('short_desc', $product->short_desc, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description') !!}
        {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('image1') !!}
        {!! Form::file('image1', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('image2') !!}
        {!! Form::file('image2', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('image3') !!}
        {!! Form::file('image3', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_hot') !!}
        {!! Form::checkbox('is_hot') !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_sale') !!}
        {!! Form::checkbox('is_sale') !!}
    </div>

    <div class="form-group">
        {!! Form::label('price') !!}
        {!! Form::text('price', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sale_price') !!}
        {!! Form::text('sale_price', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('position') !!}
        {!! Form::text('position', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Active') !!}
        {!! Form::checkbox('active') !!}

    </div>

    {!! Form::submit($product->exists ? 'Save Product' : 'Create New Product', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    <script>
        new SimpleMDE().render();
    </script>
@endsection
