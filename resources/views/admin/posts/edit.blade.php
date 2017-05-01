@extends('layouts.app')

@include('admin.includes.froala')

@section('content')

    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Create a new post</div>
        <div class="panel-body">
            <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text"
                           name="title"
                           value="{{ $post->title }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file"
                           name="featured"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="category">Select a category</label>
                    <select name="category_id" id="category" class="form-control" value="{{ $post->category_id }}">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    {{ $post->category_id === $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"
                                       name="tags[]"
                                       value="{{ $tag->id }}"
                                       {{ in_array($tag->id, array_column($post->tags()->get()->all(), 'id')) ? "checked" : "" }}>{{ $tag->tag }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content"
                              id="content"
                              rows="5"
                              class="form-control">{{ $post->content }}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Update Post</button>
                </div>

            </form>
        </div>
    </div>
@endsection