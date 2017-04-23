@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <table class="table table-hover">
                <thead>
                <th>Tag Name</th>
                <th>Editing</th>
                <th>Deleting</th>
                </thead>

                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->tag }}</td>

                        <td>
                            <a href="{{ route('tag.edit', ['id' => $tag->id]) }}"
                               role="button"
                               class="btn btn-info">Edit</a>
                        </td>

                        <td>
                            <a href="{{ route('tag.destroy', ['id' => $tag->id]) }}"
                               role="button"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
