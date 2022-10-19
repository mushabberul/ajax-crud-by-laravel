@extends('layout.master')
@push('style')

@endpush

@section('content')
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Product List</h2>
                @include('pages.create')
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Produce Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @forelse ($products as $key=>$product)
                            <tr data-id="{{$product->id}}" class="rowId{{$product->id}}">
                                <th>{{$product->id}}</th>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>
                                    <a href="#" class="btn btn-info edit" data-bs-toggle="modal" data-bs-target="#editProduct">Edit</a>
                                    <a href="#" class="btn btn-danger destroy">Delete</a>
                                </td>
                              </tr>
                        @empty
                            <tr>
                                <td colspan="99">Not found!</td>
                            </tr>
                        @endforelse

                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@include('pages.edit')
@endsection

@push('script')
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        //ajax data insert and show
        $('#save_change').on('click',function(e){
           e.preventDefault();

           let product_name = $('#product_name').val();
           let product_price = $('#product_price').val();

           $.ajax({
            method: 'post',
            url: '/add-product',
            data: {product_name:product_name,product_price:product_price},
            success:function(res){
                let $product_info = `<tr data-id="${res.id}">
                    <th>${res.id}</th>
                    <td>${res.product_name}</td>
                    <td>${res.product_price}</td>
                    <td>
                        <a href="#" class="btn btn-info edit" data-bs-toggle="modal" data-bs-target="#editProduct">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>`;
                $('#tbody').prepend($product_info);
                $('#addProduct').modal('hide');
                $('#formModal').trigger('reset');
            },error:function(err){
                //console.dir(err.responseJSON.errors.product_name);
                //let errorTest = err.responseJSON;
                $.each(err.responseJSON.errors,function(index,value){
                    $('#errorMessage').append("<span class=text-danger>" + value + "</span><br>");
                });
            }
           })
        });

        //ajax data edit
        $('.edit').on('click',function(){
            let id = $(this).closest('tr').data('id');

            $.ajax({
                method: 'GET',
                url: `/edit/product/${id}`,
                success: function(res){
                    $('#edit_product_name').val(res.product_name);
                    $('#edit_product_price').val(res.product_price);
                    $('#update').attr('data-editid',res.id);
                },
                error: function(err){
                    console.log(err);
                }
            });
        });
        //ajax data update
        $('#update').on('click',function(){
            let id = $(this).data('editid');

            let product_name = $('#edit_product_name').val();
            let product_price = $('#edit_product_price').val();
            $.ajax({
                method: 'post',
                url: '/update/product/'+id,
                data: {product_name:product_name,product_price:product_price},
                success:function(res){
                    let $product_info = `
                        <th>${res.id}</th>
                        <td>${res.product_name}</td>
                        <td>${res.product_price}</td>
                        <td>
                            <a href="#" class="btn btn-info edit" data-bs-toggle="modal" data-bs-target="#editProduct">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>`;
                $('.rowId'+id).html($product_info);
                $('#editProduct').modal('hide');
                $('#editFormModal').trigger('reset');
                },
                error:function(err){
                    console.log(err);
                }
            });

        });

        //ajax data destroy
        $('.destroy').on('click',function(){
            let id = $(this).closest('tr').data('id');

            $.ajax({
                method: 'GET',
                url: '/remove/product/'+id,
                success:function(res){
                    $('.rowId'+id).remove();
                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    });

</script>
@endpush
