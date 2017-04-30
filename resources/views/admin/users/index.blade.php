@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Delete</th>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        
                        <td>
                            <img src="{{ asset($user->profile->avatar) }}" width="60px" height="60px">
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            <a href="{{ route('user.toggleAdmin', ['id' => $user->id]) }}"
                               role="button"
                               class="btn btn-xs btn-{{ $user->admin ? 'danger' : 'info' }}">{{ $user->admin ? 'Remove' : 'Grant' }} Privileges</a>
                        </td>

                        <td>
                            <a href="{{ route('user.delete') }}"
                               class="btn btn-danger"
                               role="button">Delete</a>
                        </td>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
