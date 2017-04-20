@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create a new post</div>
        <div class="panel-body">
            <form action="{{ route('post.store') }}" method="POST">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content"
                                id="content"
                                rows="5"
                                class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Submit Post</button>
                </div>

            </form>
        </div>
    </div>
@endsection