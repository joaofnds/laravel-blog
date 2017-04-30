@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">Create a new tag</div>
        <div class="panel-body">
            <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="POST">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text"
                           name="tag"
                           class="form-control"
                           value="{{ $tag->tag }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Create tag</button>
                </div>

            </form>
        </div>
    </div>
@endsection