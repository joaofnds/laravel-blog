@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Restore</th>
                <th>Delete</th>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>

                        <td>
                            <img width="80px" height="45px" src="{{ $post->featured }}">
                        </td>

                        <td>
                            {{ $post->title }}
                        </td>

                        <td>
                            <a href="{{ route('post.restore', ['id' => $post->id]) }}"
                               role="button"
                               class="btn btn-info">Restore</a>
                        </td>

                        <td>
                            <a href="{{ route('post.destroy', ['id' => $post->id]) }}"
                               role="button"
                               class="btn btn-danger">Delete Forever</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
