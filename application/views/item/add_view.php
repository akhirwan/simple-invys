<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo $title?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?php echo $breadcrumb?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <?php
            if(isset($_GET['alert'])){
                if($_GET['alert']=="success"){
                    echo '<div class="alert alert-info alert-dismissible rounded-0" id="success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Add / Edit Item is success</div>';                    
                }
            }

            $id = 0;
        ?>
        <div class="card rounded-0">
            <div class="card-header">
                <h3 class="card-title">Store Item</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url().'insert-item'?>" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="hidden" class="form-control rounded-0" id="id" name="id" value="<?php echo ($item) ? $item->id : '' ?>" readonly>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control rounded-0" id="code" name="code" value="<?php echo ($item) ? $item->code : 'ITEM-'.time() ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control rounded-0" id="name" name="name" value="<?php echo ($item) ? $item->name : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control rounded-0" id="category_id" name="category_id" required>
                                    <option value="1" selected>Food and Baverage</option>
                                    <option value="2">Stationery</option>
                                    <option value="3">Electronic</option>
                                    <option value="4">Otomotif</option>
                                    <option value="5">Fashion</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="supplier_id">Supplier</label>
                                <input type="text" class="form-control rounded-0" id="supplier_id" name="supplier_id" value="<?php echo ($item) ? $item->supplier_id : '' ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="cost_price">Cost Price</label>
                                <input type="text" class="form-control rounded-0" id="cost_price" name="cost_price" value="<?php echo ($item) ? $item->cost_price : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="sell_price">Sell Price</label>
                                <input type="text" class="form-control rounded-0" id="sell_price" name="sell_price" value="<?php echo ($item) ? $item->sell_price : '' ?>" required>
                            </div>   
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control rounded-0" id="description" name="description" rows="4"><?php echo ($item) ? $item->description : '' ?></textarea>
                            </div>                     
                        </div>
                        <div class="col-lg-12">
                            <a href="<?php echo base_url().'item'?>" class="btn btn-secondary btn-flat">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>