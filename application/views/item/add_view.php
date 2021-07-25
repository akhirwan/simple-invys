<form action="" method="post">
    <div class="modal-content rounded-0">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="overflow-y: scroll;">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control rounded-0" id="name" name="name" >
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control rounded-0" id="category_id" name="category_id">
                    <option value="1">Food and Baverage</option>
                    <option value="2">Stationery</option>
                    <option value="3">Electronic</option>
                    <option value="4">Otomotif</option>
                    <option value="5">Fashion</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control rounded-0" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="cost_price">Cost Price</label>
                <input type="text" class="form-control rounded-0" id="cost_price" name="cost_price" >
            </div>
            <div class="form-group">
                <label for="sell_price">Sell Price</label>
                <input type="text" class="form-control rounded-0" id="sell_price" name="sell_price" >
            </div>
            <div class="form-group">
                <label for="supplier_id">Supplier</label>
                <input type="text" class="form-control rounded-0" id="supplier_id" name="supplier_id" >
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary btn-flat">Submit</button>
        </div>
    </div>
</form>