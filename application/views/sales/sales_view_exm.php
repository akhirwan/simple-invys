
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<base href="https://demo.opensourcepos.org/" />
	<title>pom pom | Powered by OSPOS 3.3.4</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="dist/bootswatch/flatly/bootstrap.min.css"/>

			<!--[if lte IE 8]>
		<link rel="stylesheet" media="print" href="dist/print.css" type="text/css" />
		<![endif]-->
		<!-- start mincss template tags -->
		<link rel="stylesheet" type="text/css" href="dist/jquery-ui/jquery-ui.min.css"/>
		<link rel="stylesheet" type="text/css" href="dist/opensourcepos.min.css?rel=fb6bae8c26"/>
		<!-- end mincss template tags -->

		<!-- Tweaks to the UI for a particular theme should drop here  -->
	
		<!-- start minjs template tags -->
		<script type="text/javascript" src="dist/opensourcepos.min.js?rel=be58aed5e4"></script>
		<!-- end minjs template tags -->
	
	<script type="text/javascript">
	// live clock
	var clock_tick = function clock_tick() {
		setInterval('update_clock();', 1000);
	}

	// start the clock immediatly
	clock_tick();

	var update_clock = function update_clock() {
		document.getElementById('liveclock').innerHTML = moment().format("DD/MM/YYYY HH:mm:ss");
	}

	$.notifyDefaults({ placement: {
		align: "center",
		from: "bottom"
	}});

	var cookie_name = "csrf_cookie_ospos_v3";

	var csrf_token = function() {
		return Cookies.get(cookie_name);
	};

	var csrf_form_base = function() {
		return { csrf_ospos_v3 : function () { return csrf_token();  } };
	};

	var setup_csrf_token = function() {
		$('input[name="csrf_ospos_v3"]').val(csrf_token());
	};

	var ajax = $.ajax;

	$.ajax = function() {
		var args = arguments[0];
		if (args['type'] && args['type'].toLowerCase() == 'post' && csrf_token()) {
			if (typeof args['data'] === 'string')
			{
				args['data'] += '&' + $.param(csrf_form_base());
			}
			else
			{
				args['data'] = $.extend(args['data'], csrf_form_base());
			}
		}

		return ajax.apply(this, arguments);
	};

	$(document).ajaxComplete(setup_csrf_token);

	var submit = $.fn.submit;

	$.fn.submit = function() {
		setup_csrf_token();
		submit.apply(this, arguments);
	};
</script>
	<script type="text/javascript">
(function(lang, $) {

    var lines = {
        'common_submit' : "Submit",
        'common_close' : "Close"
    };

    $.extend(lang, {
        line: function(key) {
            return lines[key];
        }
    });


})(window.lang = window.lang || {}, jQuery);
</script>
	<style type="text/css">
		html {
			overflow: auto;
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<div class="topbar">
			<div class="container">
				<div class="navbar-left">
					<div id="liveclock">26/07/2021 22:33:50</div>
				</div>

				<div class="navbar-right" style="margin:0">
					<a href="https://demo.opensourcepos.org/home/change_password/1" class="modal-dlg" data-btn-submit="Submit" title="Change Password">John Doe</a>					  |  					<a href="https://demo.opensourcepos.org/home/logout">Logout</a>				</div>

				<div class="navbar-center" style="text-align:center">
					<strong>pom pom</strong>
				</div>
			</div>
		</div>

		<div class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand hidden-sm" href="https://demo.opensourcepos.org/">OSPOS</a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
													<li class="">
								<a href="https://demo.opensourcepos.org/customers" title="Customers" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/customers.png" border="0" alt="Module Icon"/><br/>
									Customers								</a>
							</li>
													<li class="">
								<a href="https://demo.opensourcepos.org/items" title="Items" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/items.png" border="0" alt="Module Icon"/><br/>
									Items								</a>
							</li>
													<li class="">
								<a href="https://demo.opensourcepos.org/item_kits" title="Item Kits" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/item_kits.png" border="0" alt="Module Icon"/><br/>
									Item Kits								</a>
							</li>
													<li class="">
								<a href="https://demo.opensourcepos.org/suppliers" title="Suppliers" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/suppliers.png" border="0" alt="Module Icon"/><br/>
									Suppliers								</a>
							</li>
													<li class="">
								<a href="https://demo.opensourcepos.org/reports" title="Reports" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/reports.png" border="0" alt="Module Icon"/><br/>
									Reports								</a>
							</li>
													<li class="">
								<a href="https://demo.opensourcepos.org/receivings" title="Receivings" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/receivings.png" border="0" alt="Module Icon"/><br/>
									Receivings								</a>
							</li>
													<li class="active">
								<a href="https://demo.opensourcepos.org/sales" title="Sales" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/sales.png" border="0" alt="Module Icon"/><br/>
									Sales								</a>
							</li>
													<li class="">
								<a href="https://demo.opensourcepos.org/giftcards" title="Gift Cards" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/giftcards.png" border="0" alt="Module Icon"/><br/>
									Gift Cards								</a>
							</li>
													<li class="">
								<a href="https://demo.opensourcepos.org/messages" title="Messages" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/messages.png" border="0" alt="Module Icon"/><br/>
									Messages								</a>
							</li>
													<li class="">
								<a href="https://demo.opensourcepos.org/expenses" title="Expenses" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/expenses.png" border="0" alt="Module Icon"/><br/>
									Expenses								</a>
							</li>
													<li class="">
								<a href="https://demo.opensourcepos.org/expenses_categories" title="Expenses Categories" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/expenses_categories.png" border="0" alt="Module Icon"/><br/>
									Expenses Categories								</a>
							</li>
													<li class="">
								<a href="https://demo.opensourcepos.org/cashups" title="Cashups" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/cashups.png" border="0" alt="Module Icon"/><br/>
									Cashups								</a>
							</li>
													<li class="">
								<a href="https://demo.opensourcepos.org/office" title="Office" class="menu-icon">
									<img src="https://demo.opensourcepos.org/images/menubar/office.png" border="0" alt="Module Icon"/><br/>
									Office								</a>
							</li>
											</ul>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">



<div id="register_wrapper">

<!-- Top register controls -->

	<form action="https://demo.opensourcepos.org/sales/change_mode" id="mode_form" class="form-horizontal panel panel-default" method="post" accept-charset="utf-8">
        <input type="hidden" name="csrf_ospos_v3" value="af896906d98719bc2c84bb73ed6bb274" />
		<div class="panel-body form-group">
			<ul>
				<li class="pull-left first_li">
					<label class="control-label">Register Mode</label>
				</li>
				<li class="pull-left">
					<select name="mode" onchange="$('#mode_form').submit();" class="selectpicker show-menu-arrow" data-style="btn-default btn-sm" data-width="fit">
						<option value="sale" selected="selected">Sales Receipt</option>
						<option value="sale_quote">Quote</option>
						<option value="sale_invoice">Invoice</option>
						<option value="return">Return</option>
					</select>
				</li>
				
				<li class="pull-right">
					<button class='btn btn-default btn-sm modal-dlg' id='show_suspended_sales_button' data-href="https://demo.opensourcepos.org/sales/suspended" title="Suspended">
					<span class="glyphicon glyphicon-align-justify">&nbsp</span>Suspended </button>
				</li>

				<li class="pull-right">
					<a href="https://demo.opensourcepos.org/sales/manage" class="btn btn-primary btn-sm" id="sales_takings_button" title="Daily Sales"><span class="glyphicon glyphicon-list-alt">&nbsp</span>Daily Sales</a>					
				</li>
			</ul>
		</div>
	</form>
	
	<form action="https://demo.opensourcepos.org/sales/add" id="add_item_form" class="form-horizontal panel panel-default" method="post" accept-charset="utf-8">
		<input type="hidden" name="csrf_ospos_v3" value="af896906d98719bc2c84bb73ed6bb274" />                  
		<div class="panel-body form-group">
			<ul>
				<li class="pull-left first_li">
					<label for="item" class='control-label'>Find or Scan Item or Receipt</label>
				</li>
				<li class="pull-left">
					<input type="text" name="item" value="" id="item" class="form-control input-sm" size="50" tabindex="1"  />
					<span class="ui-helper-hidden-accessible" role="status"></span>
				</li>
				<li class="pull-right">
					<button id='new_item_button' class='btn btn-info btn-sm pull-right modal-dlg' data-btn-new="New" data-btn-submit="Submit" data-href="https://demo.opensourcepos.org/items/view" title="New Item">
					<span class="glyphicon glyphicon-tag">&nbsp</span>New Item </button>
				</li>
			</ul>
		</div>
	</form>

<!-- Sale Items List -->

	<table class="sales_table_100" id="register">
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
					<td colspan='8'>
						<div class='alert alert-dismissible alert-info'>There are no Items in the cart.</div>
					</td>
				</tr>
					</tbody>
	</table>
</div>

<!-- Overall Sale -->

<div id="overall_sale" class="panel panel-default">
	<div class="panel-body">
		<form action="https://demo.opensourcepos.org/sales/select_customer" id="select_customer_form" class="form-horizontal" method="post" accept-charset="utf-8">
			<input type="hidden" name="csrf_ospos_v3" value="af896906d98719bc2c84bb73ed6bb274" />
			<div class="form-group" id="select_customer">
				<label id="customer_label" for="customer" class="control-label" style="margin-bottom: 1em; margin-top: -1em;">Select Customer (Required for Due Payments)</label>
				<input type="text" name="customer" value="Start typing customer details..." id="customer" class="form-control input-sm"  />
				<button class='btn btn-info btn-sm modal-dlg' data-btn-submit="Submit" data-href="https://demo.opensourcepos.org/customers/view" dtitle="New Customer">
				<span class="glyphicon glyphicon-user">&nbsp</span>New Customer	</button>
			</div>
		</form>
		<table class="sales_table_100" id="sale_totals">
			<tr>
				<th style="width: 55%;">Quantity of 0 Items</th>
				<th style="width: 45%; text-align: right;">0</th>
			</tr>
			<tr>
				<th style="width: 55%;">Subtotal</th>
				<th style="width: 45%; text-align: right;">$0.00</th>
			</tr>			
			<tr>
				<th style="width: 55%; font-size: 150%">Total</th>
				<th style="width: 45%; font-size: 150%; text-align: right;"><span id="sale_total">$0.00</span></th>
			</tr>
		</table>

	</div>
</div>

<script type="text/javascript">
$(document).ready(function()
{
	$("input[name='item_number']").change(function() {
		var item_id = $(this).parents('tr').find("input[name='item_id']").val();
		var item_number = $(this).val();
		$.ajax({
			url: "https://demo.opensourcepos.org/sales/change_item_number",
			method: 'post',
			data: {
				'item_id': item_id,
				'item_number': item_number,
			},
			dataType: 'json'
		});
	});

	$("input[name='name']").change(function() {
		var item_id = $(this).parents('tr').find("input[name='item_id']").val();
		var item_name = $(this).val();
		$.ajax({
			url: "https://demo.opensourcepos.org/sales/change_item_name",
			method: 'post',
			data: {
				'item_id': item_id,
				'item_name': item_name,
			},
			dataType: 'json'
		});
	});

	$("input[name='item_description']").change(function() {
		var item_id = $(this).parents('tr').find("input[name='item_id']").val();
		var item_description = $(this).val();
		$.ajax({
			url: "https://demo.opensourcepos.org/sales/change_item_description",
			method: 'post',
			data: {
				'item_id': item_id,
				'item_description': item_description,
			},
			dataType: 'json'
		});
	});

	$('#item').focus();

	$('#item').blur(function() {
		$(this).val("Start typing Item Name or scan Barcode...");
	});

	$('#item').autocomplete( {
		source: "https://demo.opensourcepos.org/sales/item_search",
		minChars: 0,
		autoFocus: false,
		delay: 500,
		select: function (a, ui) {
			$(this).val(ui.item.value);
			$('#add_item_form').submit();
			return false;
		}
	});

	$('#item').keypress(function (e) {
		if(e.which == 13) {
			$('#add_item_form').submit();
			return false;
		}
	});

	var clear_fields = function() {
		if($(this).val().match("Start typing Item Name or scan Barcode...|Start typing customer details..."))
		{
			$(this).val('');
		}
	};

	$('#item, #customer').click(clear_fields).dblclick(function(event) {
		$(this).autocomplete('search');
	});

	$('#customer').blur(function() {
		$(this).val("Start typing customer details...");
	});

	$('#customer').autocomplete( {
		source: "https://demo.opensourcepos.org/customers/suggest",
		minChars: 0,
		delay: 10,
		select: function (a, ui) {
			$(this).val(ui.item.value);
			$('#select_customer_form').submit();
			return false;
		}
	});

	$('#customer').keypress(function (e) {
		if(e.which == 13) {
			$('#select_customer_form').submit();
			return false;
		}
	});

	$('.giftcard-input').autocomplete( {
		source: "https://demo.opensourcepos.org/giftcards/suggest",
		minChars: 0,
		delay: 10,
		select: function (a, ui) {
			$(this).val(ui.item.value);
			$('#add_payment_form').submit();
			return false;
		}
	});

	$('#comment').keyup(function() {
		$.post("https://demo.opensourcepos.org/sales/set_comment", {comment: $('#comment').val()});
	});

			$('#sales_invoice_number').keyup(function() {
			$.post("https://demo.opensourcepos.org/sales/set_invoice_number", {sales_invoice_number: $('#sales_invoice_number').val()});
		});

	
	$('#sales_print_after_sale').change(function() {
		$.post("https://demo.opensourcepos.org/sales/set_print_after_sale", {sales_print_after_sale: $(this).is(':checked')});
	});

	$('#price_work_orders').change(function() {
		$.post("https://demo.opensourcepos.org/sales/set_price_work_orders", {price_work_orders: $(this).is(':checked')});
	});

	$('#email_receipt').change(function() {
		$.post("https://demo.opensourcepos.org/sales/set_email_receipt", {email_receipt: $(this).is(':checked')});
	});

	$('#finish_sale_button').click(function() {
		$('#buttons_form').attr('action', "https://demo.opensourcepos.org/sales/complete");
		$('#buttons_form').submit();
	});

	$('#finish_invoice_quote_button').click(function() {
		$('#buttons_form').attr('action', "https://demo.opensourcepos.org/sales/complete");
		$('#buttons_form').submit();
	});

	$('#suspend_sale_button').click(function() {
		$('#buttons_form').attr('action', "https://demo.opensourcepos.org/sales/suspend");
		$('#buttons_form').submit();
	});

	$('#cancel_sale_button').click(function() {
		if(confirm("Are you sure you want to clear this sale? All items will be cleared."))
		{
			$('#buttons_form').attr('action', "https://demo.opensourcepos.org/sales/cancel");
			$('#buttons_form').submit();
		}
	});

	$('#add_payment_button').click(function() {
		$('#add_payment_form').submit();
	});

	$('#payment_types').change(check_payment_type).ready(check_payment_type);

	$('#cart_contents input').keypress(function(event) {
		if(event.which == 13)
		{
			$(this).parents('tr').prevAll('form:first').submit();
		}
	});

	$('#amount_tendered').keypress(function(event) {
		if(event.which == 13)
		{
			$('#add_payment_form').submit();
		}
	});

	$('#finish_sale_button').keypress(function(event) {
		if(event.which == 13)
		{
			$('#finish_sale_form').submit();
		}
	});

	dialog_support.init('a.modal-dlg, button.modal-dlg');

	table_support.handle_submit = function(resource, response, stay_open) {
		$.notify( { message: response.message }, { type: response.success ? 'success' : 'danger'} )

		if(response.success)
		{
			if(resource.match(/customers$/))
			{
				$('#customer').val(response.id);
				$('#select_customer_form').submit();
			}
			else
			{
				var $stock_location = $("select[name='stock_location']").val();
				$('#item_location').val($stock_location);
				$('#item').val(response.id);
				if(stay_open)
				{
					$('#add_item_form').ajaxSubmit();
				}
				else
				{
					$('#add_item_form').submit();
				}
			}
		}
	}

	$('[name="price"],[name="quantity"],[name="discount"],[name="description"],[name="serialnumber"],[name="discounted_total"]').change(function() {
		$(this).parents('tr').prevAll('form:first').submit()
	});

	$('[name="discount_toggle"]').change(function() {
		var input = $('<input>').attr('type', 'hidden').attr('name', 'discount_type').val(($(this).prop('checked'))?1:0);
		$('#cart_'+ $(this).attr('data-line')).append($(input));
		$('#cart_'+ $(this).attr('data-line')).submit();
	});
});

function check_payment_type()
{
	var cash_mode = "1";

	if($("#payment_types").val() == "Gift Card")
	{
		$("#sale_total").html("$0.00");
		$("#sale_amount_due").html("$0.00");
		$("#amount_tendered_label").html("Gift Card Number");
		$("#amount_tendered:enabled").val('').focus();
		$(".giftcard-input").attr('disabled', false);
		$(".non-giftcard-input").attr('disabled', true);
		$(".giftcard-input:enabled").val('').focus();
	}
	else if(($("#payment_types").val() == "Cash" && cash_mode == '1'))
	{
		$("#sale_total").html("$0.00");
		$("#sale_amount_due").html("$0.00");
		$("#amount_tendered_label").html("Amount Tendered");
		$("#amount_tendered:enabled").val("0.00");
		$(".giftcard-input").attr('disabled', true);
		$(".non-giftcard-input").attr('disabled', false);
	}
	else
	{
		$("#sale_total").html("$0.00");
		$("#sale_amount_due").html("$0.00");
		$("#amount_tendered_label").html("Amount Tendered");
		$("#amount_tendered:enabled").val("0.00");
		$(".giftcard-input").attr('disabled', true);
		$(".non-giftcard-input").attr('disabled', false);
	}
}
</script>

		</div>
	</div>

	<div id="footer">
		<div class="jumbotron push-spaces">
			<strong>© 2010 - 2021 · 
			<a href="https://opensourcepos.org" target="_blank">opensourcepos.org</a>  · 
  			3.3.4 - c19612</strong>.
		</div>
	</div>
</body>
</html>
