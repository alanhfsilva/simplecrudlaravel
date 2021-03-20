@extends('layout.modal',["current" => 'products'])

@section('body')
<form action="" class="form-horizontal" id="frmProduct">
    @csrf
    <input type="hidden" name="id">
    <div class="modal-header">
        <h5 class="modal-title">Create new product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="productName">Name: </label>
            <input type="text" id="productName" name="name" class="form-control" placeholder="Product name" required>
            <label for="productName">Category: </label>
            <select name="category_id" id="slCategory" class="form-control" required>
            </select>
            <div class="row">
                <div class="col-lg-6">
                    <label for="productPrice">Price: </label>
                    <input type="number" id="productPrice" min="0" step="0.01" name="price" class="form-control" placeholder="Product Price">
                </div>
                <div class="col-lg-6">
                    <label for="productInventory">Inventory: </label>
                    <input type="number" id="productinventory" min="0" step="0.01" name="price" class="form-control" placeholder="Product Inventory">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    </div>
</form>
@endsection