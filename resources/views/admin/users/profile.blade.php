@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">Edit your profile</div>
        <div class="panel-body">
            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                           name="name"
                           value="{{ $user->name }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ $user->email }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password"
                           name="password"
                           class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="avatar">Change avatar</label>
                    <input type="file"
                           name="avatar"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook profile</label>
                    <input type="text"
                           name="facebook"
                           value="{{ $user->profile->facebook }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="twitter">Twitter profile</label>
                    <input type="text"
                           name="twitter"
                           value="{{ $user->profile->twitter }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="youtube">Youtube profile</label>
                    <input type="text"
                           name="youtube"
                           value="{{ $user->profile->youtube }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="about">About you</label>
                    <textarea name="about"
                           id="about"
                           class="form-control">{{ $user->profile->about }}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Update profile</button>
                </div>

            </form>
        </div>
    </div>
@endsection