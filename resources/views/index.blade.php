@extends('layout.app',["current" => 'index'])

@section('body')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">CRUD for produtcts.</p>
                    <a href="#" class="btn btn-primary">New</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <p class="card-text">CRUD for categories.</p>
                    <a href="#" class="btn btn-primary">New</a>
                </div>
            </div>
        </div>
  </div>
@endsection