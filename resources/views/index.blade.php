@extends('layout.app',["current" => 'index'])

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Simple CRUD</h3>
                    <p class="card-text">
                        This is a simpple CRUD using Laravel and JavaScript. Here you get two basic CRUD examples:
                        <ul>
                            <li><strong>Category:</strong> it is a basic example using just single process for create, update, show and delete.</li>
                            <li><strong>Product:</strong> it is a basic example using REST for all operations.</li>
                        </ul>
                    </p>
                    <p>To check the funcionalities, just use the top bar menu. </p>
                    <p>Enjoy :)</p>
                </div>
            </div>
        </div>
  </div>
@endsection