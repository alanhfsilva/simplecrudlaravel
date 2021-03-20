@extends('layout.app',["current" => 'categories'])

@section('body')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create category</h5>
        <form action="/categories" method="POST">
            @csrf
            <div class="form-group">
                <label for="nameCategory">Name: </label>
                <input type="text" name="name" class="form-control" value="" placeholder="Category name">
            </div>
            <button class="btn btn-primary btn-sm" type="submit">Save</button>
            <button class="btn btn-danger btn-sm" type="button">Cancel</button>
        </form>
    </div>
</div>
@endsection