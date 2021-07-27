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
                            <a href="<?php echo base_url().'store-employee/0'?>" class="btn btn-flat btn-outline-primary float-right">
                                <i class="fas fa-user-plus"></i> &nbsp;
                                Add Employee
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="myTable1" class="table table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Contact</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 1; foreach ($employees as $empl) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $empl->first_name . ' ' . $empl->last_name?></td>
                                        <td><?php echo $empl->user_is_active?></td>
                                        <td>
                                            <i class="fas fa-phone"></i> <?php echo $empl->phone?> <br>
                                            <i class="fas fa-envelope"></i> <?php echo $empl->email?> <br>
                                        </td>
                                        <td><?php echo $empl->user_dept_id?></td>
                                        <td>
                                            <?php if ($empl->id != $this->session->userdata('id')) {?>
                                            <a href="<?php echo base_url().'store-employee/'.$empl->user_id?>" class="btn btn-xs btn-outline-secondary btn-flat"><i class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-xs btn-outline-secondary btn-flat" data-toggle="modal" data-target="#delEmpl<?php echo $empl->user_id?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <?php } ?>
                                        </td>
                                    </tr>
            
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-sm" id="delEmpl<?php echo $empl->user_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content rounded-0">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete <?php echo $empl->first_name?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                                                    <a href="<?php echo base_url().'delete-employee/'.$empl->user_id?>" class="btn btn-danger btn-flat">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
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