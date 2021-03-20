@extends('layout.app',["current" => 'categories'])

@section('body')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create category</h5>
        <form action="/categories/{{$category->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nameCategory">Name: </label>
                <input type="text" name="name" class="form-control{{ ($errors->has('name')) ? ' is-invalid' : ''}}" value="{{$category->name}}" placeholder="Category name">
                @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <button class="btn btn-primary btn-sm" type="submit">Save</button>
            <a href="/categories" class="btn btn-danger btn-sm btn-cancel">Cancel</a>
        </form>
    </div>
    @if($errors->any())
    <div class="card-footer">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    </div>
    @endif
</div>
@endsection