<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<title>Add Inward | Sri Shendhuren Electro Plating</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<!-- BEGIN: load jquery -->
<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
<script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
<!-- END: load jquery -->
<link href="css/fancy-button/fancy-button.css" rel="stylesheet" type="text/css" />
<!--Jquery UI CSS-->
<link href="css/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css" />

<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<!--jQuery Date Picker-->
<script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.progressbar.min.js" type="text/javascript"></script>
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

<script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
    <!-- Load TinyMCE -->

    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>



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
<script type="text/javascript">
jQuery(document).ready(function() {
	var dateToday = new Date();  
	jQuery('#p_dc_jo_date').datepicker({
		changeYear: true,
		dateFormat: "dd/mm/yy"
	});
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

<script type="text/javascript">
function confirmButtuon(){
	var returnVal = true;
	var clientFormName = document.clientForm;
	$( 'div[id^="alert_"]' ).html( '' );
	
	if ( clientFormName.select_client.value == "-- Select --" ) {
		showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'select_client' );
		returnVal = false;
	}
	if (clientFormName.p_dc_jo_number.value == ""){
		showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'p_dc_jo_number' );
		returnVal = false
	}
	if (clientFormName.p_dc_jo_date.value == ""){
		showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'p_dc_jo_date' );
		returnVal = false
	}
	if ( returnVal == true ) {
		jQuery.ajax( {
			type: "POST",
			url: "shen_ajax.php",
			async: false,
			data: {
				"select_client": clientFormName.select_client.value,
				"order_type": clientFormName.order_type.value,
				"p_dc_jo_number": clientFormName.p_dc_jo_number.value,
				"p_dc_jo_date": clientFormName.p_dc_jo_date.value,
				"type": 'add_client_info'
			},
			success: function ( responseData ) {
				if ( responseData != "" ) {
					$('#login_submit').css('display','none');
					$("#clientForm input,#clientForm select").prop("disabled", true);
					$('.registerFormCls').css('display','block');
					$('#hid_last_inid').val(responseData);
				} else {
					$( '#success_msg' ).addClass( 'formError_msg' );
					document.getElementById( 'success_msg' ).innerHTML = 'Please Provide Valid Data in All the Fields';
				}
			}
		});
	}
}
</script>
<?php if(isset($_SESSION['user_id'])){?>
    <div class="container_12">
      <?php include('top-nav.php'); ?>
      <div class="clear"> </div>
      <?php include('left-sidebar.php'); ?>
      <div class="grid_10">
        <div class="box round first fullpage">
          <h2>Add Inward</h2>
          <div class="block">
          
            <form name="clientForm" id="clientForm" autocomplete="off" method="POST" enctype="multipart/form-data">
              <table class="form">
                <tr>
                  <td><label>Select Client</label> </td>
                  <td>
                     <select name="select_client" id="select_client" onchange="return selectClient(this.value)">
                        <option>-- Select --</option>
                        <?php
                        $select_client_details = "select * from client_master order by id desc";
                        $result_client = mysqli_query( $conn, $select_client_details );
                        $no_of_rows = mysqli_num_rows( $result_client );
                        $i=1;
                        while($fetch_client = mysqli_fetch_array( $result_client )){?>
                            <option value="<?php echo $fetch_client['id']; ?>"><?php echo $fetch_client['business_client_name']; ?></option><?php
                        } ?>
                     </select>
                      <div id="alert_select_client" class="formError_msg inputError"></div>
                  </td>
                </tr>
                <tr>
                  <td><label>PO/DC/JO</label> </td>
                  <td>
                     <select name="order_type" id="order_type">
                        <option value="DC">DC</option>
                        <option value="PO">PO</option>
                        <option value="JO">JO</option>
                     </select>
                     <div id="alert_order_type" class="formError_msg inputError"></div>
                  </td>
                </tr>
                <tr>
                  <td><label>PO/DC/JO Number</label> </td>
                  <td>
                     <input type="text" name="p_dc_jo_number" id="p_dc_jo_number" class = "mini" maxlength="20" onchange="return trim(this)">
                     <div id="alert_p_dc_jo_number" class="formError_msg inputError"></div>
                  </td>
                </tr>
                <tr>
                  <td><label>PO/DC/JO Date</label> </td>
                  <td>
                     <input type="text" name="p_dc_jo_date" id="p_dc_jo_date" class = "mini" maxlength="20" onchange="return trim(this)">
                     <div id="alert_p_dc_jo_date" class="formError_msg inputError"></div>
                  </td>
                </tr>
                <tr>
                <td></td>
                <td>
                    <input type="button" name="login_submit" id="login_submit" value="Confirm" onClick="return confirmButtuon();" class="btn"/>
                </td>
                </tr>
               </table>
            </form>
            <div class="marginTopBot" id="regTableDis">
                
            </div>
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
                    if ( registerFormName.item_description.value == "" ) {
                        showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'item_description' );
                        returnVal = false;
                    }
                    if (registerFormName.quantity.value == ""){
                        showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'quantity' );
                        returnVal = false
                    }
            
                    if ( returnVal == true ) {
                        var select_client = $('#select_client').val();
                        jQuery.ajax( {
                            type: "POST",
                            url: "shen_ajax.php",
                            async: false,
                            data: {
                                "sno": registerFormName.sno.value,
                                "item_code": registerFormName.item_code.value,
                                "item_description": registerFormName.item_description.value,
                                "quantity": registerFormName.quantity.value,
                                "hid_last_inid":registerFormName.hid_last_inid.value,
                                "select_client":select_client,
                                "type": 'add_inward'
                            },
                            success: function ( responseData ) {
                                if ( responseData != 0 ) {
                                    $('.mini').val('');
                                    $('#regTableDis').css('display','block');
                                    $('#regTableDis').html(responseData);
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
            <form name="registerForm" id="registerForm" autocomplete="off" method="POST" enctype="multipart/form-data" class="registerFormCls">
              <table class="form">
                <tr>
                  <td><label>S No</label> </td>
                  <td>
                      <input type="text" name="sno" id="sno" class = "mini" maxlength="250" onchange="return trim(this)">
                      <div id="alert_sno" class="formError_msg inputError"></div>
                      <input type="hidden" name="hid_last_inid" id="hid_last_inid" />
                  </td>
                </tr>
                <tr>
                  <td><label>Item Code</label> </td>
                  <td>
                     <input type="text" name="item_code" id="item_code" class = "mini" maxlength="250" onchange="return trim(this)">
                      <div id="alert_item_code" class="formError_msg inputError"></div>
                  </td>
                </tr>
                <tr>
                  <td><label>Item Description</label></td>
                  <td>
                    <input type="text" name="item_description" id="item_description" class = "mini" onchange="return trim(this)">
                    <div id="alert_item_description" class="formError_msg inputError"></div>
                  </td>
                </tr>
                <tr>
                  <td><label>Quantity</label> </td>
                  <td>
                     <input type="number" name="quantity" id="quantity" class = "mini" maxlength="3" onchange="return trim(this)">
                      <div id="alert_quantity" class="formError_msg inputError"></div>
                  </td>
                </tr>
                <tr>
                <td></td>
                <td>
                    <input type="button" name="login_submit2" id="login_submit2" value="Submit" onClick="return regFormValidate();" class="btn"/>&nbsp;&nbsp;
                    <input type="reset" name="reset" value="Clear" class="btn"/>
                </td>
                </tr>
              </table>
            </form>
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
		$('#select_client').prop('disabled', 'disabled');
	}else{
		$('.registerFormCls').css('display','none');
	}
}
function deleteRecord(curVal){
	jQuery.ajax( {
		type: "POST",
		url: "shen_ajax.php",
		async: false,
		data: {
			"curVal": curVal,
			"type": 'delete_cur_inward'
		},
		success: function ( responseData ) {
			if ( responseData !="" ) {
				$('.mini').val('');
				$('#row'+responseData).css('display','none');
			} else {
				$( '#success_msg' ).addClass( 'formError_msg' );
				document.getElementById( 'success_msg' ).innerHTML = 'Please Provide Valid Data in All the Fields';
			}
		}
	});
}
</script>
</body>
</html>
