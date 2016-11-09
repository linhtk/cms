@extends('layouts.backend')

@section('title', 'Delete '.$category->title)

@section('content')
    {!! Form::open(['method' => 'delete', 'route' => ['backend.categories.destroy', $page->id]]) !!}
        <div class="alert alert-danger">
            <strong>Warning!</strong> You are about to delete a category. This action cannot be undone. Are you sure you want to continue?
        </div>

        {!! Form::submit('Yes, delete this category!', ['class' => 'btn btn-danger']) !!}

        <a href="{{ route('backend.categories.index') }}" class="btn btn-success">
            <strong>No, get me out of here!</strong>
        </a>
    {!! Form::close() !!}
@endsection
