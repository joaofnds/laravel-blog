@extends('layouts.app')

@section('content')
    <div class="col-lg-3">
        <div class="panel panel-info">
            <div class="panel-heading">Posts</div>
            <div class="panel-body">{{ $posts_count }}</div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-danger">
            <div class="panel-heading">Trashed posts</div>
            <div class="panel-body">{{ $trashed_count}}</div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-success">
            <div class="panel-heading">Users</div>
            <div class="panel-body">{{ $users_count}}</div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-info">
            <div class="panel-heading">categories</div>
            <div class="panel-body">{{ $categories_count }}</div>
        </div>
    </div>
@endsection
