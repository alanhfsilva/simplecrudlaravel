@extends('layout.modal',["current" => 'products'])

@section('body')
<form action="" class="form-horizontal" id="frmProduct">
    @csrf
    <input type="hidden" name="id" value="{{ old('id', $product->id ?? '') }}">
    <div class="modal-header">
        <h5 class="modal-title">Create new product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="productName">Name: </label>
            <input type="text" id="productName" name="name" class="form-control" placeholder="Product name" value="{{ old('id', $product->name ?? '') }}">
            <label for="productName">Category: </label>
            <select name="category_id" id="slCategory" class="form-control">
            </select>
            <div class="row">
                <div class="col-lg-6">
                    <label for="productPrice">Price: </label>
                    <input type="number" id="productPrice" min="0" step="0.01" name="price" class="form-control" placeholder="Product Price" value="{{ old('id', $product->price ?? '0.00') }}">
                </div>
                <div class="col-lg-6">
                    <label for="productInventory">Inventory: </label>
                    <input type="number" id="productinventory" min="0" step="0.01" name="inventory" class="form-control" placeholder="Product Inventory" value="{{ old('id', $product->inventory ?? '0.00') }}">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    </div>
</form>
<script>
    $(document).ready(function () {
        $('#frmProduct').submit(function (e){
            e.preventDefault();
            submitProductData();
            $('#mdlProduct').modal('hide');
            loadProducts();
        });
    });

    function submitProductData() {
        var params = $('#frmProduct').serialize();
        @if(isset($product->id))
        $.ajax({
            type: 'PUT',
            url: '{{ route("products.update",$product->id) }}',
            dataType: 'json',
            data: params
        }).then(data => {
            console.log('Product updated.');
            $('#mdlProduct').html(data).modal("hide");
            loadProducts();
        })
        .catch(error => {
            var xhr = $.ajax();
            console.log(xhr);
            console.log(error);
        });
        @else
        $.post('{{route('products.store')}}',params,function(data){
            console.log(data);
        });
        @endif
    }

    function loadCategoriesInSelect() {
        var url = "{{ route('api.categories') }}";
        var sl_category = $('#slCategory');
        var category_id = {{ old('id', $product->category_id ?? '0') }};
        $.getJSON(url, function(data) {
            for(i=0;i<data.length;i++) {
                option = '<option value="'+data[i].id+'"'+(category_id == data[i].id ? 'selected' : '')+'>'+data[i].name+'</option>';
                sl_category.append(option);
            }
        });
    }

    loadCategoriesInSelect();
</script>
@endsection