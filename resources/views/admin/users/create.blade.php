@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">Create a new user</div>
        <div class="panel-body">
            <form action="{{ route('user.store') }}" method="POST">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Create user</button>
                </div>

            </form>
        </div>
    </div>
@endsection