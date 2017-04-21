@extends('layouts.app')

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
            <form action="{{ route('category.store') }}" method="POST">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Create cateogry</button>
                </div>

            </form>
        </div>
    </div>
@endsection