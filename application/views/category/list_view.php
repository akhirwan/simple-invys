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
                                echo '<div class="alert alert-info alert-dismissible rounded-0" id="success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Add / Edit / Delete Category is success</div>';                    
                            }
                        }
            
                        $id = 0;
                    ?>
                    <div class="card rounded-0">
                        <div class="card-header">
                            <button type="button" class="btn btn-flat btn-outline-primary float-right" data-toggle="modal" data-target="#addCat">
                                <i class="fas fa-folder-plus"></i> Add Category
                            </button>
            
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-sm" id="addCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content rounded-0">
                                        <form action="<?php echo base_url().'submit-category'?>" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control rounded-0" id="id" name="id" value="0" readonly>
                                                <div class="form-group">
                                                    <label for="code">Code</label>
                                                    <input type="text" class="form-control rounded-0" id="code" name="code" value="<?php echo 'CAT-' . time() ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control rounded-0" id="name" name="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Activated</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0" checked>
                                                        <label class="form-check-label" for="inlineRadio1">No</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1">
                                                        <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control rounded-0" id="description" name="description" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Modal -->
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if (!$categories) {
                                        echo '<tr><td colspan="10" style="text-align: center;"><b>No data to display<b></td></tr>';
                                    } else {
                                        $i = 1; foreach ($categories as $cat) {
                                    ?>
            
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $cat->cat_code?></td>
                                        <td><?php echo $cat->cat_name?></td>
                                        <td><?php echo $cat->cat_description?></td>
                                        <td>
                                            <form action="<?php echo base_url().'status-category/'.$cat->cat_id?>" method="post">
                                            <?php 
                                                if ($cat->cat_is_active == 1) {
                                                    $unAct = '<input type="hidden" id="status" name="status" value="0" readonly>';
                                                    $unAct .= '<button type="submit" class="btn btn-xs btn-outline-primary btn-flat"><i class="fas fa-toggle-on"></i></button>';
            
                                                    echo $unAct;
                                                } else {
                                                    $act = '<input type="hidden" id="status" name="status" value="1" readonly>';
                                                    $act .= '<button type="submit" class="btn btn-xs btn-outline-danger btn-flat"><i class="fas fa-toggle-off"></i></button>';
            
                                                    echo $act;
                                                }
                                            ?>                                
                                            </form>
                                        </td>
                                        <td>
                                            <!-- <a href="<?php echo base_url().'store-item/'.$cat->cat_id?>" class="btn btn-xs btn-outline-secondary btn-flat"><i class="fas fa-edit"></i></a> -->
                                            <button type="button" class="btn btn-xs btn-outline-secondary btn-flat" data-toggle="modal" data-target="#editCat<?php echo $cat->cat_id?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-xs btn-outline-secondary btn-flat" data-toggle="modal" data-target="#delCat<?php echo $cat->cat_id?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
            
                                        </td>
                                    </tr>
            
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-sm" id="editCat<?php echo $cat->cat_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content rounded-0">
                                                <form action="<?php echo base_url().'submit-category'?>" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" class="form-control rounded-0" id="id" name="id" value="<?php echo $cat->cat_id?>" readonly>
                                                        <div class="form-group">
                                                            <label for="code">Code</label>
                                                            <input type="text" class="form-control rounded-0" id="code" name="code" value="<?php echo $cat->cat_code?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control rounded-0" id="name" name="name" value="<?php echo $cat->cat_name?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status">Activated</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0" <?php echo ($cat->cat_is_active == 0) ? 'checked' : '' ?>>
                                                                <label class="form-check-label" for="inlineRadio1">No</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1" <?php echo ($cat->cat_is_active == 1) ? 'checked' : '' ?>>
                                                                <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description</label>
                                                            <textarea class="form-control rounded-0" id="description" name="description" rows="4"><?php echo $cat->cat_description ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Modal -->
            
                                    <!-- Modal Remove -->
                                    <div class="modal fade bd-example-modal-sm" id="delCat<?php echo $cat->cat_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content rounded-0">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete <?php echo $cat->cat_name?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                                                    <a href="<?php echo base_url().'delete-category/'.$cat->cat_id?>" class="btn btn-danger btn-flat">Delete</a>
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