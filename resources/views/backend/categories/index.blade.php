@extends('layouts.backend')

@section('title', 'Categories')

@section('content')
    <p><a href="{{ route('backend.categories.create') }}" class="btn btn-primary">Create Category</a></p>
    <div class="table-responsive ">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Parent</th>
                <th>Has child</th>
                <th>Position</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($categories->isEmpty())
                <tr>
                    <td colspan="5" align="center">There are no pages.</td>
                </tr>
            @else
                @foreach($categories as $category)
                    <tr class="{{ $category->hidden ? 'warning' : '' }}">
                        <td>
                            {{$category->name}}
                        </td>
                        <td>@if($category->parent_id == 0){{ 'Danh mục gốc' }}@else{{$category->parent_id}}@endif</td>
                        <td>@if($category->has_child == 0){{ 'Không' }}@else {{ 'Có' }}@endif</td>
                        <td>{{ $category->position }}</td>
                        <td>@if($category->active == 0){{ 'Ẩn' }}@else {{ 'Hiện' }}@endif</td>
                        <td>
                            <a href="{{ route('backend.categories.edit', $category->id) }}" title="Edit">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{ route('backend.categories.confirm', $category->id) }}" title="Delete">
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
