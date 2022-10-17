@extends('layout.master')
@push('style')

@endpush

@section('content')
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Product List</h2>
                @include('pages.create-modal')
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
                    <tbody>
                      <tr>
                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>
                            <a href="#" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
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
        $('#save_change').on('click',function(e){
           e.preventDefault();


           let product_name = $('#product_name').val();
           let product_price = $('#product_price').val();

           $.ajax({
            method: 'post',
            url: '/add-product',
            data: {product_name:product_name,product_price:product_price},
            success:function(res){
                $('#addProduct').modal('hide');
                $('#formModal').trigger('reset');
                console.log(res);
            },error:function(err){
                let errorTest = err.responseJSON;
                $.each(errorTest.errors,function(index,value){
                    $('#errorMessage').append("<span class=text-danger>" + value + "</span><br>");
                });
            }
           })
        })
    });
</script>
@endpush
