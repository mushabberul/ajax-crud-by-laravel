<!-- Modal -->
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
    <form id="editFormModal" action="" method="post">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductLabel">Edit Product</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="errorMessage"></div>
                    <div class="form-group mb-3">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" class="form-control" id="edit_product_name" placeholder="Enter product name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="product_price">Price</label>
                        <input type="text" name="product_price" class="form-control" id="edit_product_price" placeholder="Product price">
                    </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="update" class="btn btn-primary">Update</button>
              </div>
            </div>
          </div>
    </form>
</div>
