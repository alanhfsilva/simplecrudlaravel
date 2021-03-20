@extends('layout.app',["current" => 'categories'])

@section('body')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Categories list</h5>
        @if(!$categories->isEmpty())
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="/categories/edit/{{$category->id}}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="/categories/delete/{{$category->id}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else 
        <h5>No results found.</h5>
        @endif
    </div>
    <div class="card-footer">
        <a href="/categories/create" class="btn btn-primary btn-sm" role="button">+ Add new</a>
    </div>
</div>

@endsection