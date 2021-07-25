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
                                echo '<div class="alert alert-info alert-dismissible rounded-0" id="success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Add / Edit / Delete Supplier is success</div>';                    
                            }
                        }
            
                        $id = 0;
                    ?>
                    <div class="card rounded-0">
                        <div class="card-header">
                            <a href="<?php echo base_url().'store-customer/0'?>" class="btn btn-flat btn-outline-primary float-right">
                                <i class="fas fa-user-plus"></i> &nbsp;
                                Add Customer
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if (!$customers) {
                                        echo '<tr><td colspan="10" style="text-align: center;"><b>No data to display<b></td></tr>';
                                    } else {
                                        $i = 1; foreach ($customers as $cust) {
                                    ?>
            
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $cust->first_name . ' ' . $cust->last_name?></td>
                                        <td>
                                            <form action="<?php echo base_url().'status-customer'?>" id="form_status" method="post">
                                            <?php
                                                if ($cust->cust_is_active == 1) {
                                                    $act = '<input type="hidden" value="'.$cust->cust_id.'" id="id" name="id" readonly>';
                                                    $act .= '<button type="submit" class="btn btn-xs btn-outline-primary btn-flat"><i class="fas fa-toggle-on"></i></button>';

                                                    echo $act;
                                                } else {
                                                    $act = '<input type="hidden" value="'.$cust->cust_id.'" id="id" name="id" readonly>';
                                                    $act .= '<button type="submit" class="btn btn-xs btn-outline-danger btn-flat"><i class="fas fa-toggle-off"></i></button>';

                                                    echo $act;
                                                }
                                            ?>                                        
                                            </form>                                            
                                        </td>
                                        <td>
                                            <i class="fas fa-phone"></i> <?php echo $cust->phone?> <br>
                                            <i class="fas fa-envelope"></i> <?php echo $cust->email?> <br>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url().'store-customer/'.$cust->cust_id?>" class="btn btn-xs btn-outline-secondary btn-flat"><i class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-xs btn-outline-secondary btn-flat" data-toggle="modal" data-target="#delCust<?php echo $cust->cust_id?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
            
                                        </td>
                                    </tr>
            
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-sm" id="delCust<?php echo $cust->cust_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content rounded-0">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete <?php echo $cust->first_name?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                                                    <a href="<?php echo base_url().'delete-customer/'.$cust->cust_id?>" class="btn btn-danger btn-flat">Delete</a>
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