@extends('layout.master')
@push('style')

@endpush
<div class="col-md-6 m-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Product List</h2>
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
@push('script')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
@endpush
