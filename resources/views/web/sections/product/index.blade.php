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
            <tbody>
                
            </tbody>
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
        $('.btn-new-product').on('click', function () {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                    type: 'GET',
                    url: '/products/create/',
                    dataType: 'HTML',
    
                    success: function (data) {
    
                    },
                }).then(data => {
                    $('#mdlProduct').html(data).modal("show");
                    $('#productName').focus();
                    loadCategoriesInSelect();
                })
                .catch(error => {
                    var xhr = $.ajax();
                    console.log(xhr);
                    console.log(error);
                })
    
        });
        loadProducts();
    });

    function loadCategoriesInSelect() {
        var url = "/api/categories";
        var sl_category = $('#slCategory');
        $.getJSON(url, function(data) {
            for(i=0;i<data.length;i++) {
                option = '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                sl_category.append(option);
            }
        });
    }

    function mountRow(data,no_columns,actions){
        var row = "<tr>";
        for (const property in data) {
            if(!no_columns.includes(property) ) {
                row += "<td>"+data[property]+"</td>";
            }
        }
        if(actions) {
            row += '<td><a href="#'+data.id+'" class="btn btn-sm btn-primary">Edit</a> <a href="#'+data.id+'" class="btn btn-sm btn-danger">Delete</a></td>';
        }
        row += "</tr>\n";
        return row;
    } 

    function loadProducts() {
        var url = "/api/products";
        var table_products = $('#tblProducts>tbody');

        $.getJSON(url, function(data) {
            table_products.html('');
            for(i=0;i<data.length;i++) {
                row = mountRow(data[i],['created_at','updated_at'],true);
                table_products.append(row);
            }
        });
    }
</script>
@endsection