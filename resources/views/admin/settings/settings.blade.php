@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">Edit blog settings</div>
        <div class="panel-body">
            <form action="{{ route('settings.update') }}" method="POST">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="site_name">Site name</label>
                    <input type="text"
                           name="site_name"
                           id="site_name"
                           value="{{ $settings->site_name }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="contact_email">Email</label>
                    <input type="email"
                           name="contact_email"
                           id="contact_email"
                           value="{{ $settings->contact_email }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text"
                           name="address"
                           id="address"
                           value="{{ $settings->address }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="string"
                           name="contact_number"
                           id="contact_number"
                           value="{{ $settings->contact_number }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Update Settings</button>
                </div>

            </form>
        </div>
    </div>
@endsection