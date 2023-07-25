<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<title>Place Order | Sri Shendhuren Electro Plating</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<!-- END: load jquery -->
<link href="css/fancy-button/fancy-button.css" rel="stylesheet" type="text/css" />
<!--Jquery UI CSS-->
<link href="css/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<!-- BEGIN: load jquery -->
<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
<script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
<!-- END: load jquery -->
<!--jQuery Date Picker-->
<script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.progressbar.min.js" type="text/javascript"></script>
<!-- BEGIN: load jqplot -->
<!-- BEGIN: load jqplot -->
<link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
<script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="js/jqPlot/plugins/jqplot.canvasTextRenderer.min.js"></script>
<script type="text/javascript" src="js/jqPlot/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
<script type="text/javascript" src="js/jqPlot/plugins/jqplot.donutRenderer.min.js"></script>
<script type="text/javascript" src="js/jqPlot/plugins/jqplot.bubbleRenderer.min.js"></script>
    <!-- Load TinyMCE -->

    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            setupTinyMCE();

            setupProgressbar('progress-bar');

            setupDialogBox('dialog', 'opener');

            $('input[type="checkbox"]').fancybutton();

            $('input[type="radio"]').fancybutton();

        });

    </script>

    <!-- /TinyMCE -->
<!-- END: load jqplot -->
<?php include( 'config.php' ); ?>
<script src="js/setup.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
          			setSidebarHeight();
        });
</script>
<script type="text/javascript">
     $(window).load(function () {
         $('#demo-side-bar').removeAttr('style');
     });
</script>
<style type="text/css">
#demo-side-bar {
	left:90%!important;
	display:block!important;
}
#branding .floatright {
	margin-right:130px!important;
}
</style>
<script type="text/javascript" src="js/custom.js"></script>
<?php include('alerts.php'); ?>

<?php if(isset($_SESSION['user_id'])){?>
	<script type="text/javascript">
        var captchaBool = 0;
        var $name = "";
    
        function regFormValidate() {
            var returnVal = true;
            var registerFormName = document.registerForm;
            $( 'div[id^="alert_"]' ).html( '' );
            
            if ( registerFormName.sno.value == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'sno' );
                returnVal = false;
            }
            if ( registerFormName.hsn.value == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'hsn' );
                returnVal = false;
            }
            if ( registerFormName.item_description.value == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'item_description' );
                returnVal = false;
            }
            if (registerFormName.quantity.value == ""){
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'quantity' );
                returnVal = false
            }
            if (registerFormName.min_quantity.value == ""){
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'min_quantity' );
                returnVal = false
            }	
            if (registerFormName.min_quantity.value == ""){
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'min_quantity' );
                returnVal = false
            }		
            if (registerFormName.rate.value == ""){
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'rate' );
                returnVal = false
            }
            if ( registerFormName.tax_amount.value == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'tax_amount' );
                returnVal = false;
            }
            if (registerFormName.cgst.value == ""){
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'cgst' );
                returnVal = false
            }
            if (registerFormName.sgst.value == ""){
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'sgst' );
                returnVal = false
            }
            if (registerFormName.order_date.value == ""){
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'order_date' );
                returnVal = false
            }		
            if ( returnVal == true ) {
    
                jQuery.ajax( {
                    type: "POST",
                    url: "shen_ajax.php",
                    async: false,
                    data: {
                        "sno": registerFormName.sno.value,
                        "hsn": registerFormName.hsn.value,
                        "item_code": registerFormName.item_code.value,
                        "item_description": registerFormName.item_description.value,
						"quantity": registerFormName.quantity.value,
                        "min_quantity": registerFormName.min_quantity.value,
                        "pending_quantity": registerFormName.pending_quantity.value,
                        "rate": registerFormName.rate.value,
                        "tax_amount": registerFormName.tax_amount.value,
                        "cgst": registerFormName.cgst.value,
                        "cgst_amt": registerFormName.cgst_amt.value,
                        "sgst": registerFormName.sgst.value,
                        "sgst_amt": registerFormName.sgst_amt.value,
                        "total_payable": registerFormName.total_payable.value,
                        "order_date": registerFormName.order_date.value,
                        "inward_info_id" : <?php echo $_REQUEST['add']; ?>,
                        "type": 'add_job_work'
                    },
                    success: function ( responseData ) {
                        if ( responseData>0) {
                            window.location = "view_inward.php?view="+responseData;
                        } else {
                            $( '#success_msg' ).addClass( 'formError_msg' );
                            document.getElementById( 'success_msg' ).innerHTML = 'Please Provide Valid Data in All the Fields';
                        }
                    }
                });
            }
        }
        
        function closeModal() {
            $('.modal').css('display','none');
            location.reload(true);
        }
    </script>
    <div class="container_12">
      <?php include('top-nav.php'); ?>
      <div class="clear"> </div>
      <?php include('left-sidebar.php'); ?>
      <div class="grid_10">
        <div class="box round first fullpage">
          <h2>Place Order</h2>
          <div class="block">
            <?php
            $select_jobwork = "select * from job_work where inward_info_id = '".$_REQUEST['add']."' order by id DESC LIMIT 0,1";
            $result_jobwork = mysqli_query( $conn, $select_jobwork );
            $fetch_jobwork = mysqli_fetch_array( $result_jobwork );
            $no_of_jobwork = mysqli_num_rows( $result_jobwork );
            
            $select_inward_details = "select * from inward_info where id = '".$_REQUEST['add']."' order by id desc";
            $result_inward = mysqli_query( $conn, $select_inward_details );
            $no_of_rows = mysqli_num_rows( $result_inward );
            $fetch_inward = mysqli_fetch_array( $result_inward );
            
            if($fetch_jobwork['pending_quantity']>0 || $fetch_jobwork['pending_quantity']==""){?>
                <form name="registerForm" id="registerForm" autocomplete="off" method="POST" enctype="multipart/form-data">
                  <table class="form">
                    <tr>
                      <td><label>S No</label> </td>
                      <td>
                          <input type="text" name="sno" id="sno" class = "mini" maxlength="250" onchange="return trim(this)" disabled="disabled" value="<?php echo $fetch_inward['sno']; ?>">
                          <div id="alert_sno" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>HSN</label></td>
                      <td>
                        <input type="text" name="hsn" id="hsn" class = "mini" onchange="return trim(this)" maxlength="150" value="998898" />
                        <div id="alert_hsn" class="error_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Item Code</label> </td>
                      <td>
                         <input type="text" name="item_code" id="item_code" class = "mini" maxlength="250" value="<?php echo $fetch_inward['item_code']; ?>" disabled="disabled">
                          <div id="alert_item_code" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Item Description</label></td>
                      <td>
                        <input type="text" name="item_description" id="item_description" class = "mini" value="<?php echo $fetch_inward['item_description']; ?>" disabled="disabled">
                        <div id="alert_item_description" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Quantity</label> </td>
                      <td>
                         <input type="number" name="quantity" id="quantity" class = "mini" maxlength="3" value="<?php if($no_of_jobwork>0){ echo $fetch_jobwork['pending_quantity']; }else{ echo $fetch_inward['quantity']; } ?>" disabled="disabled">
                          <div id="alert_quantity" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Minimum Quantity</label> </td>
                      <td>
                         <input type="number" name="min_quantity" id="min_quantity" class = "mini" maxlength="3" onchange="return pendingQtyCal()">
                          <div id="alert_min_quantity" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Pending Quantity</label> </td>
                      <td>
                         <input type="number" name="pending_quantity" id="pending_quantity" class = "mini" maxlength="3" onchange="return trim(this)" disabled="disabled">
                          <div id="alert_pending_quantity" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Rate</label></td>
                      <td>
                        <input type="text" name="rate" id="rate" class = "mini" maxlength="50" onchange="return calTaxableAmt()">
                        <div id="alert_rate" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Taxable Amount</label> </td>
                      <td>
                         <input type="text" name="tax_amount" id="tax_amount" class = "mini" maxlength="50" />
                         <div id="alert_tax_amount" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>CGST %</label> </td>
                      <td>
                         <input type="text" name="cgst" id="cgst" class = "mini" maxlength="2" value="9" disabled="disabled" />
                         <div id="alert_cgst" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>CGST Amt</label> </td>
                      <td>
                         <input type="text" name="cgst_amt" id="cgst_amt" class = "mini" maxlength="50" onchange="return trim(this)" disabled="disabled" />
                         <div id="alert_cgst_amt" class="formError_msg inputError"></div>
                      </td>
                    </tr>       
                    <tr>
                      <td><label>SGST %</label> </td>
                      <td>
                         <input type="text" name="sgst" id="sgst" class = "mini" maxlength="2" value="9" disabled="disabled" />
                         <div id="alert_sgst" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>SGST Amt</label> </td>
                      <td>
                         <input type="text" name="sgst_amt" id="sgst_amt" class = "mini" maxlength="50" onchange="return trim(this)" disabled="disabled" />
                         <div id="alert_sgst_amt" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Total</label> </td>
                      <td>
                         <input type="text" name="total_payable" id="total_payable" class = "mini" maxlength="50" onchange="return trim(this)" disabled="disabled" />
                         <div id="alert_cin_no" class="formError_msg inputError"></div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Order Placed On</label> </td>
                      <td>
                         <input type="text" name="" id="order_date" class = "mini" maxlength="10" onchange="return trim(this)" disabled="disabled" value="<?php echo date('d/m/Y'); ?>">
                         <div id="alert_order_date" class="formError_msg inputError"></div>
                      </td>
                    </tr> 
                    <tr>
                    <td></td>
                    <td>
                        <input type="button" name="login_submit" id="login_submit" value="Submit" onClick="return regFormValidate();" class="btn"/>&nbsp;&nbsp;
                        <input type="reset" name="reset" value="Clear" class="btn"/>
                    </td>
                    </tr>
                  </table>
                </form>
            <?php }else{ ?>
                <p>No Order to be Placed</p>
            <?php } ?>
    
          </div>
        </div>
      </div>
      <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
    <div id="site_info">
       <p> Copyright <a href="http://webdroit.in/" target="_blank">Webdroit Technologies</a>. All Rights Reserved. </p>
    </div>
<?php } ?>
</div>

<script type="text/javascript">
function selectClient(selVal) {
	if(selVal!="-- Select --"){
		$('.registerFormCls').css('display','block');
		$('#select_client').prop('disabled', 'disabled');
	}else{
		$('.registerFormCls').css('display','none');
	}
}
function calTaxableAmt(){
	var quantity = $('#min_quantity').val();
	var rate = $('#rate').val();
	var taxAmt =  quantity * rate;
	$('#tax_amount').val(taxAmt);
	
	var tax_amount = $('#tax_amount').val();
	var cgst = $('#cgst').val();	
	var cgstAmt = tax_amount * cgst /100;
	var cgstAmtRound = cgstAmt.toFixed(2);
	$('#cgst_amt').val(cgstAmtRound);
	
	var tax_amount = $('#tax_amount').val();
	var sgst = $('#sgst').val();	
	var sgstAmt = tax_amount * sgst /100;
	var sgstAmtRound = sgstAmt.toFixed(2);
	$('#sgst_amt').val(sgstAmtRound);

	var cgstAmt = $('#cgst_amt').val();
	var totalval = parseFloat(tax_amount) + parseFloat(cgstAmt) + parseFloat(sgstAmt);
	
	$('#total_payable').val(totalval);
	
}/*
function cgstCalculation() {
	$('#cgst_amt').val('');
	var tax_amount = $('#tax_amount').val();
	var cgst = $('#cgst').val();	
	var cgstAmt = tax_amount * cgst /100;
	var cgstAmtRound = cgstAmt.toFixed(2);
	$('#cgst_amt').val(cgstAmtRound);
}
function sgstCalculation(){
	$('#sgst_amt').val('');
	var tax_amount = $('#tax_amount').val();
	var sgst = $('#sgst').val();	
	var sgstAmt = tax_amount * sgst /100;
	var sgstAmtRound = sgstAmt.toFixed(2);
	$('#sgst_amt').val(sgstAmtRound);

	var cgstAmt = $('#cgst_amt').val();
	var totalval = parseFloat(tax_amount) + parseFloat(cgstAmt) + parseFloat(sgstAmt);
	
	$('#total_payable').val(totalval);
}*/

function pendingQtyCal(){
	var quantity = $('#quantity').val();
	var min_quantity = $('#min_quantity').val();
	var pending_quantity = parseInt(quantity)-parseInt(min_quantity);
	
	$('#pending_quantity').val(pending_quantity);
}
</script>
</body>
</html>
