@extends('layout.app',["current" => 'products'])

@section('body')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Products list</h5>
        <table class="table table-ordered table-hover" id="tblProducts">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="50%">Name</th>
                    <th width="5%">Inventory</th>
                    <th width="5%">Price</th>
                    <th width="20%">Category</th>
                    <th width="15%">Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        @if($products->isEmpty()) 
            @include('components.noresults') 
        @endif
    </div>
    <div class="card-footer">
        <button class="btn btn-primary btn-sm btn-new-product" data-toggle="modal">+ Add new</button>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="mdlProduct">
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.btn-new-product').on('click', function () {
            
            $.ajax({
                    type: 'GET',
                    url: '{{ route('products.create') }}',
                    dataType: 'HTML',
                }).then(data => {
                    $('#mdlProduct').html(data).modal("show");
                    $('#productName').focus();
                })
                .catch(error => {
                    var xhr = $.ajax();
                    console.log(xhr);
                    console.log(error);
                })
    
        });
        loadProducts();
    });

    function mountRow(data,no_columns,actions){
        var row = "<tr>";
        for (const property in data) {
            if(!no_columns.includes(property) ) {
                row += "<td>"+data[property]+"</td>";
            }
        }
        if(actions) {
            row += '<td><button type="button" class="btn btn-sm btn-primary" onclick="productEdit('+data.id+')">Edit</button> <button type="button" class="btn btn-sm btn-danger" onclick="productDelete('+data.id+')">Delete</button>';
        }
        row += "</tr>\n";
        return row;
    } 

    function loadProducts() {
        var url = "{{route('products.index')}}";
        var table_products = $('#tblProducts > tbody');

        $.getJSON(url, function(data) {
            table_products.html('');
            for(i=0;i<data.length;i++) {
                row = mountRow(data[i],['created_at','updated_at','category_id'],true);
                table_products.append(row);
            }
        });
    }

    function productEdit(product_id) {
        $.ajax({
            type: 'GET',
            url: '{{ route('products.index') }}/'+product_id+'/edit',
            dataType: 'HTML'
        }).then(data => {
            $('#mdlProduct').html(data).modal("show");
            $('#productName').focus();
        })
        .catch(error => {
            var xhr = $.ajax();
            console.log(xhr);
            console.log(error);
        })
    }

    function productDelete(product_id) {
        if(confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: 'DELETE',
                url: '{{route('products.index')}}/'+product_id,
                dataType: 'HTML'
            }).then(data => {
                console.log('Product deleted.');
                loadProducts();
            })
            .catch(error => {
                var xhr = $.ajax();
                console.log(xhr);
                console.log(error);
            });
        }
    }

</script>
@endsection