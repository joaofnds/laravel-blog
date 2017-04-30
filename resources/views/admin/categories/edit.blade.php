@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">Create a new post</div>
        <div class="panel-body">
            <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text"
                           name="name"
                           value="{{ $category->name }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Update category</button>
                </div>

            </form>
        </div>
    </div>
@endsection