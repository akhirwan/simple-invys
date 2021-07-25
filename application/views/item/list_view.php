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
        <div class="card rounded-0">
            <div class="card-header">
                <!-- <h3 class="card-title">List Items</h3> -->
                <button class="btn btn-flat btn-outline-primary float-right" data-toggle="modal" data-target="#addItem">
                    <i class="fas fa-folder-plus"></i> &nbsp;
                    Add Item
                </button>
                <div class="btn-group">
                    <button class="btn btn-flat btn-outline-secondary">
                        Add Item
                    </button>
                    <button class="btn btn-flat btn-outline-secondary">
                        Add Item
                    </button>
                    <button class="btn btn-flat btn-outline-secondary">
                        Add Item
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Cost</th>
                            <th>Price</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (!$items) {
                            echo '<tr><td colspan="10" style="text-align: center;"><b>No data to display<b></td></tr>';
                        } else {
                            $i = 1; foreach ($items as $item) {
                                ?>

                        <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $item->code?></td>
                            <td><?php echo $item->name?></td>
                            <td><?php echo $item->stock?></td>
                            <td><?php echo $item->description?></td>
                            <td><?php echo $item->category_id?></td>
                            <td><?php echo $item->cost_price?></td>
                            <td><?php echo $item->sell_price?></td>
                            <td><?php echo $item->supplier_id?></td>
                            <td>
                                <a href="" class="btn btn-xs btn-outline-secondary btn-flat"><i class="fas fa-edit"></i></a>    
                                <a href="" class="btn btn-xs btn-outline-secondary btn-flat"><i class="fas fa-trash"></i></a>    
                            </td>
                        </tr>
                        
                        <?php
                            }
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?php $this->load->view('item/add_view');?>
    </div>
</div>