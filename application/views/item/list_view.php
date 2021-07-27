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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if(isset($_GET['alert'])){
                            if($_GET['alert']=="success"){
                                echo '<div class="alert alert-info alert-dismissible rounded-0" id="success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Add / Edit / Delete Item is success</div>';                    
                            }
                        }
            
                        $id = 0;
                    ?>
                    <div class="card rounded-0">
                        <div class="card-header">
                            <!-- <div class="btn-group">
                                <button class="btn btn-flat btn-outline-secondary">
                                    Add Item
                                </button>
                                <button class="btn btn-flat btn-outline-secondary">
                                    Add Item
                                </button>
                                <button class="btn btn-flat btn-outline-secondary">
                                    Add Item
                                </button>
                            </div> -->
                            <a href="<?php echo base_url().'store-item/0'?>" class="btn btn-flat btn-outline-primary float-right">
                                <i class="fas fa-folder-plus"></i> &nbsp;
                                Add Item
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                        <th>Supplier</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if (!$items) {
                                        echo '<tr><td colspan="8" style="text-align: center;"><div class="alert alert-info"><b>No data to display</b></div></td></tr>';
                                    } else {
                                        $i = 1; foreach ($items as $item) {
                                    ?>
            
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $item->item_code?></td>
                                        <td><?php echo $item->item_name?></td>
                                        <td><?php echo $item->item_stock?></td>
                                        <td><?php echo $item->cat_name?></td>
                                        <td><?php echo $item->sup_name?></td>
                                        <td>
                                            <form action="<?php echo base_url().'status-item/'.$item->item_id?>" method="post">
                                            <?php 
                                                if ($item->item_is_active == 1) {
                                                    $act = '<input type="hidden" id="status" name="status" value="0" readonly>';
                                                    $act .= '<button type="submit" class="btn btn-xs btn-outline-primary btn-flat"><i class="fas fa-toggle-on"></i></button>';
            
                                                    echo $act;
                                                } else {
                                                    $act = '<input type="hidden" id="status" name="status" value="1" readonly>';
                                                    $act .= '<button type="submit" class="btn btn-xs btn-outline-danger btn-flat"><i class="fas fa-toggle-off"></i></button>';
            
                                                    echo $act;
                                                }
                                            ?>                                
                                            </form>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url().'store-item/'.$item->item_id?>" class="btn btn-xs btn-outline-secondary btn-flat"><i class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-xs btn-outline-secondary btn-flat" data-toggle="modal" data-target="#delItem<?php echo $item->item_id?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
            
                                        </td>
                                    </tr>
            
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-sm" id="delItem<?php echo $item->item_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content rounded-0">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete <?php echo $item->item_name?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                                                    <a href="<?php echo base_url().'delete-item/'.$item->item_id?>" class="btn btn-danger btn-flat">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        }
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    setTimeout(() => {
        document.getElementById("success").style.display="none";
    }, 5000);
</script>