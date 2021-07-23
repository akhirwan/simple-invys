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
                <button class="btn btn-flat btn-outline-primary float-right">
                    <i class="fas fa-folder-plus"></i> &nbsp;
                    Add Item
                </button>
                <div class="btn-group">
                    <button class="btn btn-flat btn-default">
                        Add Item
                    </button>
                    <button class="btn btn-flat btn-default">
                        Add Item
                    </button>
                    <button class="btn btn-flat btn-default">
                        Add Item
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?php var_dump($items)?>
                <table class="table table-striped table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Test</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tist</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Test</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Tist</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>