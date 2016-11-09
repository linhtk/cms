@extends('layouts.backend')

@section('title', $category->exists ? 'Editing '.$category->title : 'Create New Category')

@section('content')
    {!! Form::model($category, [
        'method' => $category->exists ? 'put' : 'post',
        'route' => $category->exists ? ['backend.categories.update', $category->id] : ['backend.categories.store']
    ]) !!}

    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('parent_id', 'Parent') !!}
        {!! Form::select('parent_id', $parents, $category->parent_id, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('has_child') !!}
        {!! Form::checkbox('has_child') !!}
    </div>

    <div class="form-group">
        {!! Form::label('position') !!}
        {!! Form::text('position', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Active') !!}
        {!! Form::checkbox('active') !!}

    </div>

    {!! Form::submit($category->exists ? 'Save Page' : 'Create New Page', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    <script>
        new SimpleMDE().render();
    </script>
@endsection
