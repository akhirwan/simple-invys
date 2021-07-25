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
                                echo '<div class="alert alert-info alert-dismissible rounded-0" id="success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Add / Edit Item is success</div>';                    
                            }
                        }
            
                        $id = 0;
                    ?>
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="card-title">Store Supplier</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url().'submit-supplier'?>" method="post">
                                <input type="hidden" class="form-control rounded-0" id="id" name="id" value="<?php echo ($suppliers) ? $suppliers->sup_id : 0 ?>" readonly>
                                <input type="hidden" class="form-control rounded-0" id="pers_id" name="pers_id" value="<?php echo ($suppliers) ? $suppliers->sup_person_id : 0 ?>" readonly>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Company Name / NPWP</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control rounded-0" id="name" name="name"value="<?php echo ($suppliers) ? $suppliers->sup_name : '' ?>" required>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control rounded-0" id="npwp" name="npwp" placeholder="NPWP is can be blank" value="<?php echo ($suppliers) ? $suppliers->sup_npwp : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="banned" class="col-sm-2 col-form-label"> </label>
                                    <div class="form-check col-sm-5">
                                        <input class="form-check-input" type="checkbox" name="banned" id="inlineRadio1" value="yes">
                                        <label class="form-check-label" for="inlineRadio1">Banned </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="first_name" class="col-sm-2 col-form-label">PIC Name</label>
                                    <div class="col-sm-2">
                                        <select class="form-control rounded-0" id="gender" name="gender" required>
                                            <option value="1">Mr.</option>
                                            <option value="0">Miss/Mrs.</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control rounded-0" id="first_name" name="first_name" value="<?php echo ($suppliers) ? $suppliers->first_name : '' ?>" placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control rounded-0" id="last_name" name="last_name" value="<?php echo ($suppliers) ? $suppliers->last_name : '' ?>" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">Contact</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control rounded-0" id="phone" name="phone" value="<?php echo ($suppliers) ? $suppliers->phone : '' ?>" placeholder="Phone" required>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control rounded-0" id="email" name="email" value="<?php echo ($suppliers) ? $suppliers->email : '' ?>" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control rounded-0" id="address" name="address" value="<?php echo ($suppliers) ? $suppliers->address : '' ?>" required>
                                    </div>
                                </div>
                                <a href="<?php echo base_url().'supplier'?>" class="btn btn-secondary btn-flat">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>