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
                <!-- CART -->
                <div class="col-lg-8">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <form action="" id="mode_form" method="post" class="form-horizontal" accept-charset="utf-8">
                                <input type="hidden" name="csrf_ospos_v3" value="af896906d98719bc2c84bb73ed6bb274" />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Register Mode</label>
                                    <div class="col-sm-4">
                                        <select class="form-control rounded-0" name="mode" id="mode" onchange="$('#mode_form').submit();"  data-width="fit">
                                            <option value="sale" selected="selected">Sales Receipt</option>
                                            <option value="sale_quote">Quote</option>
                                            <option value="sale_invoice">Invoice</option>
                                            <option value="return">Return</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-outline-primary btn-block btn-flat float-right">
                                            Daily Sales
                                        </button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-outline-primary btn-block btn-flat float-right">
                                            Suspended
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <form action="" id="add_item_form" method="post" class="form-horizontal" accept-charset="utf-8">
                                <input type="hidden" name="csrf_ospos_v3" value="af896906d98719bc2c84bb73ed6bb274" />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Find or Scan Item or Receipt</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="item" value="" id="item" class="form-control rounded-0" size="50" tabindex="1"  />
                                        <span class="ui-helper-hidden-accessible" role="status"></span>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-outline-primary btn-block btn-flat float-right">
                                            New Item
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; ">Delete</th>
                                        <th style="width: 15%;">Item #</th>
                                        <th style="width: 30%;">Item Name</th>
                                        <th style="width: 10%;">Price</th>
                                        <th style="width: 10%;">Quantity</th>
                                        <th style="width: 15%;">Disc</th>
                                        <th style="width: 10%;">Total</th>
                                        <th style="width: 5%; ">Update</th>
                                    </tr>
                                </thead>
                                <tbody id="cart_contents">
                                    <tr>
                                        <td colspan='8' style="text-align: center;">
                                            <div class='alert alert-dismissible alert-info rounded-0'><b>The cart is empty</b></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- PAYMENT -->
                <div class="col-lg-4">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <form action="" id="select_customer_form" class="form-horizontal" method="post" accept-charset="utf-8">
                                <input type="hidden" name="csrf_ospos_v3" value="af896906d98719bc2c84bb73ed6bb274" />
                                <div class="form-group" id="select_customer">
                                    <label id="customer_label" for="customer" class="control-label" style="margin-bottom: 1em; margin-top: -1em;">Select Customer (Required for Due Payments)</label>
                                    <input type="text" name="customer" placeholder="Start typing customer details..." id="customer" class="form-control rounded-0"/>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-block btn-flat float-right">
                                    <i class="fa fa-user">&nbsp</i>New Customer	
                                </button>
                            </form>
                            &nbsp
                            <table class="table" id="sale_totals">
                                <tr>
                                    <th style="width: 55%;">Quantity of 0 Items</th>
                                    <th style="width: 45%; text-align: right;">0</th>
                                </tr>
                                <tr>
                                    <th style="width: 55%;">Subtotal</th>
                                    <th style="width: 45%; text-align: right;">Rp. 0.00</th>
                                </tr>			
                                <tr>
                                    <th style="width: 55%; font-size: 150%">Total</th>
                                    <th style="width: 45%; font-size: 150%; text-align: right;"><span id="sale_total">Rp. 0.00</span></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>