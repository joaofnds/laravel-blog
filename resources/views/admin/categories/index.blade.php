@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <table class="table table-hover">
                <thead>
                    <th>Category Name</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>

                        <td>
                            <button class="btn btn-info">Edit</button>
                        </td>

                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
