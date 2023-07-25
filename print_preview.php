<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<title>Print Preview | Sri Shendhuren Electro Plating</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<!-- BEGIN: load jquery -->
<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
<script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
<!-- END: load jquery -->
<script type="text/javascript" src="js/table/table.js"></script>
<script src="js/setup.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	var dateToday = new Date();  
	jQuery('#invoice_date,#date_supply').datepicker({
		changeYear: true,
		dateFormat: "dd/mm/yy"
	});
});	
</script>
<?php include( 'config.php' ); ?>
<div class="container">
		<script type="text/javascript">
            function printpage(printViewContainer){
            
                $('.btn').addClass('display','none');
                 var printContents = document.getElementById(printViewContainer).innerHTML;
                    w = window.open();
            
                    w.document.write(printContents);
                    w.document.write('<scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>');
            
                    w.document.close(); // necessary for IE >= 10
                    w.focus(); // necessary for IE >= 10
            
                    return true;
            }
        </script>
        <div class="printSaveButton">
             <a href="javascript:;" onclick="printpage('printViewContainer')" style="float:right; font-weight:bold; color:#000; display:block;"><img src="img/printicon.png" style="float:right;" onclick="printpage('printViewContainer')" /></a>
             <a class="btn" style="float:right; margin-right:2%;" onclick="generateBill('<?php echo $_REQUEST['clientid']; ?>','<?php echo $_REQUEST['ordertype']; ?>','<?php echo $_REQUEST['odernumber']; ?>','<?php echo $_REQUEST[ 'oderplacedon']; ?>','<?php echo $_REQUEST[ 'totalgstval']; ?>','<?php echo $_REQUEST[ 'totalval']; ?>')">Save</a>
        </div>   
        <div class="welcome" id="printViewContainer">
        	<style>
				* {
					margin: 0px;
					padding: 0px;
				}
				.container{
					float:left;
					width:100%;
				}
				.printSaveButton {
					float:left;
					width:98%;
					margin-top:1%;
				}
				.contentArea {
					border:1px solid #ccc;
					float:left;
					width:96%;
					margin:2%;
				}
				.topAddressSection {
					float:left;
					width:100%;
					padding:1% 0;
					font-size:15px;
				}
				.topAddressSection p {
					text-align:center;
				}
				.mainContainerArea {
					float:left;
					width:100%;
				}
				.second_row {
					float:left;
					width:100%;
					padding: 1% 0;
					border-top:1px solid #ccc;
				}
				.secondLeft {
					float:left;
					width:53%;
					padding-right:2%;
				}
				.secondLeft p {
					text-align:right;
					font-size:16px;
					font-weight:bold;
				}
				.checkboxes {
					float:right;
					width:45%;
				}
				.checkboxStyle {
					text-align:left;
					margin-left:35%;
				}
				.loginFooterContent {
					float: left;
					width: 96%;
					margin-top: 2%;
					padding: 2%;
				}
				.boxes {
					float:left;
					width:100%;
					border-top:1px solid #ccc;
				}
				.first_box,.second_box {
					float: left;
					padding:2% 0;
					width:50%
				}
				.first_box {
					width:46%;
					padding-left:3%;
					border-right:1px solid #ccc;
				}
				
				.bottom_row {
					float:left;
					width:100%;
				}
				.amount_row {
					width:60%;
					float:left;
				}
				.amtInWords,.bank_details,.received_by  {
					float:left;
					width:96%;
					padding:2%;
					border-bottom:1px solid #ccc;
					border-right:1px solid #ccc;
				}
				.received_by {
					border-bottom:0px;
					border-right:1px solid #ccc;
				}
				.amount_row input {
					width: 400px;
				}
				.tax_row,.signature {
					width:40%;
					float:right;
				}
				.signature {
					padding: 6% 0;
				}
				.taxSection {
					float:left;
					width:100%;
					padding-bottom:6%;
					border-bottom:1px solid #ccc;
				}
				.width50 {
					float:left;
					width:46%;
					padding:2%;
				}
				.width50 p {
					text-align:center;
				}
				.first_box .width50 {
					padding:0px;
				}
				.first_box .width50 p {
					text-align:left;
				}
				.bank_details> p:first-child {
					font-weight:bold;
				}
				.row_bg {
					background-color:#eee;
				}
				.tablescroll {
					float: left;
					width: 100%;
					overflow-x: scroll;
				}
				.table1 {
					float:left;
					width: 100%;
					margin:0;
					text-align: center;
					border-collapse: collapse;
					border-top: 1px solid #ccc;
					border-bottom: 1px solid #ccc;
				}
				.table2 {
					float:left;
					width: 100%;
					margin:0;
					text-align: center;
				}
				.table2 td {
					border-right: 1px solid #ccc;
					padding:10px;
					font-weight: normal;
				}
				table {
					float:left;
					width:100%;
				}
				
				textarea {
					font:13px/1.5 Tahoma, Helvetica, Arial, 'Liberation Sans', FreeSans, sans-serif;
				}
				.first_box input, .second_box input, .amount_row input, .tax_row input, textarea {
					border: none;
					width:100%;
				}
				.first_box input:hover, .second_box input:hover, .amount_row input:hover, .tax_row input:hover {
					background-color: #ccc;
				}
				@page {
					 size: A4;
					 margin: 0;
				}
				 @media print {
					html, body {
						width: 29.7cm;
						height: 21cm;
						font-size:18px;
						font-family:"Times New Roman", Times, serif;
					}
					#printViewContainer {
						margin: 0;
						border: initial;
						border-radius: initial;
						width: initial;
						min-height: initial;
						box-shadow: initial;
						background: initial;
						page-break-after: always;
					}
					table {
						border:0;
					}
				}
			</style>
        	<div class="contentArea">
                <div class="mainContainerArea">
                   <div class="topAddressSection">
                              <p><b>Shri Shendhuren Electro Plating</b><br/> 
                              No 338/5 Sri Venkateswara Estate, <br/>
                              Near Balaguru Garden, Peelamedu, <br/>
                              Coimbatore - 641004. <br/>
                              PH: 98422-56022 <br/>
                              E-mail: shrishendhuren@gmail.com</p>
                              <p><strong>GSTIN: </strong> 33BVOPS7856Q1ZB</p>
                   </div>
                   <div class="second_row">
                   		<div class="secondLeft">
                        	<p>Cash Bill / Invoice</p>
                        </div>
                        <div class="checkboxes">
                            <p class="checkboxStyle"><input type="checkbox" name="original_receipient" id="original_receipient" value="Original for Receipient" />&nbsp;&nbsp;Original for Receipient</p>
                            <p class="checkboxStyle"><input type="checkbox" name="duplicate_suppliers" id="duplicate_suppliers" value="Duplicate for Supplier / Transporter" />&nbsp;&nbsp;Duplicate for Supplier / Transporter &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                            <p class="checkboxStyle"><input type="checkbox" name="triplicate_suppliers" id="triplicate_suppliers" value="Triplicate for Supplier" />&nbsp;&nbsp;Triplicate for Supplier &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        </div>
                    </div>    
                   <div class="boxes">
                        <div class="first_box">
							<?php
                            $billno = ''; $spliVar = '';
                            $select_billing = "select * from billing";
                            $result_billing = mysqli_query( $conn, $select_billing );
                            $no_of_rows = mysqli_num_rows( $result_billing );
                            if($no_of_rows==0){
                                $billno = 1;
                            }else{
							
								$select_biilinginfo = "SELECT * FROM billing where select_client = '".$_REQUEST['clientid']."' and order_type = '".$_REQUEST['ordertype']."' and p_dc_jo_number = '".$_REQUEST['odernumber']."' and order_date = '".$_REQUEST['oderplacedon']."'";
								$result_biilinginfo = mysqli_query( $conn, $select_biilinginfo);
								$no_of_rows = mysqli_num_rows( $result_biilinginfo );
								
								if($no_of_rows>0){
									$fetch_biilinginfo = mysqli_fetch_array( $result_biilinginfo );
									$spliVar = explode ("GST-", $fetch_biilinginfo['bill_no']);
									$billno = $spliVar[1]; 
								
								}else{
									$select_last_billing = "SELECT * FROM billing ORDER BY id DESC LIMIT 0,1";
									$result_last_billing = mysqli_query( $conn, $select_last_billing );
									$fetch_last_billing = mysqli_fetch_array( $result_last_billing );
									$spliVar = explode ("GST-", $fetch_last_billing['bill_no']);
									$billno = $spliVar[1]+1; 
								}
                            }	
                            ?>
                        	<div class="width50">
                           		 <p>Reverse Charge : </p>
                                 <p>Invoice No : </p>
                                 <p>Invoice Date : </p>
                                 <p>State : </p>
                                 <p>State Code : </p>
                            </div>
                            <div class="width50">
                            	<p><input type="text" name="reverse_charge" id="reverse_charge"></p>
                                <p><input type="text" name="invoice_no" id="invoice_no" value="GST-<?php echo $billno; ?>"></p>
                                <p><input type="text" name="invoice_date" id="invoice_date" value="<?php echo date('d/m/Y'); ?>"></p>
                                <p><input type="text" name="state" id="state" value="TAMILNADU"></p>
                                <p><input type="text" name="state_code" id="state_code" value="33"></p>
                            </div>
                        </div>
                        <div class="second_box">
                            <table>
                                <tr><td><p class="checkboxStyle">Transportation Mode : </p></td><td><input type="text" name="transport_mode" id="transport_mode"></td></tr>
                                <tr><td><p class="checkboxStyle">Vehicle Number : </p></td><td><input type="text" name="vehicle_number" id="vehicle_number"></td></tr>
                                <tr><td><p class="checkboxStyle">Date of Supply : </p></td><td><input type="text" name="date_supply" id="date_supply"></td></tr>
                                <tr><td><p class="checkboxStyle">Place of Supply : </p></td><td><input type="text" name="place_supply" id="place_supply"></td></tr>
                            </table>
                        </div>
                    </div>
                    <div class="boxes">
                    	<div class="first_box">
                                <?php 	
                                $select_client_details = "select * from client_master where id = '".$_REQUEST['clientid']."'";
                                $result_client = mysqli_query( $conn, $select_client_details );
                                $fetch_client = mysqli_fetch_array( $result_client );
                                 ?>
                                 
                                 <div class="width50">
                                    <p><strong>Details of Receiver (Bill to)</strong></p>
                                 	<p>Name : </p> 
                                    <p>Address : </p> 
                                    <p>GSTIN : </p> 
                                    <p>State : </p>
                                    <p>State Code : </p>
                                 </div>
                                 <div class="width50">
                                     <p>&nbsp;</p>
                                 	<p><?php echo $fetch_client['business_client_name']; ?></p> 
                                    <p><?php echo nl2br(strip_tags($fetch_client['client_address'])); ?></p> 
                                    <p style="text-transform:uppercase;"><?php if($fetch_client['gstin']){ echo $fetch_client['gstin']; }else{ echo "&nbsp;"; }?></p>
                                    <p><?php echo $fetch_client['select_state']; ?></p>
                                    <p><?php echo $fetch_client['state_code']; ?></p>
                                 </div>
						</div>
                        <div class="second_box">&nbsp;</div>
                    </div>
                   <table  border="2" cellpadding="0" cellspacing="0" class="table1">
                        <tr>
                            <td colspan="2" class="table_td" >
                                <table cellspacing="0" cellpadding="0" border="1" class="table2">
                                    <tr class="row_bg">
                                        <td width="5%"><strong>SL no</strong></td>
                                        <td width="35%"><strong>Name of Product / Service</strong></td>
                                        <td width="10%"><strong>HSN / ACS <br/> Code</strong></td>
                                        <td width="10%"><strong>Qty</strong></td>
                                        <td width="20%"><strong>Rate</strong></td>
                                        <td width="30%"><strong>Amount</strong></td>
                                    </tr>
									 <?php                               
                                    $select_client_inward = "select * from inward_client_info where client_id = '".$_REQUEST[ 'clientid']."' and p_dc_jo_type = '".$_REQUEST[ 'ordertype']."' and p_dc_jo_number = '".$_REQUEST[ 'odernumber']."' order by id desc";
                                    $result_client_inward = mysqli_query( $conn, $select_client_inward );
                                    $fetch_client_inward = mysqli_fetch_array( $result_client_inward );
                                    
                                    $inward_info_id = "";
                                    $select_inward_info = "select * from inward_info where inward_client_id = '".$fetch_client_inward['id']."' order by id desc";
                                    $result_inward_info = mysqli_query( $conn, $select_inward_info );
                                
                                    while($fetch_inward_info = mysqli_fetch_array( $result_inward_info )){
                                        $inward_info_id .= $fetch_inward_info['id'].',';
                                    }
                                    
                                    $inward_infoId = rtrim($inward_info_id,',');
                                    $expInward = explode(',',$inward_infoId); 
									
									$totalVal = 0;	$totalGstVal = 0; $cgstVal = 0; $SgstVal = 0;$i=1;
									foreach($expInward as $inward_infoid){
										$select_job_work = "select * from job_work where inward_info_id = '".$inward_infoid."' and order_date = '".$_REQUEST[ 'oderplacedon']."' order by id ASC";
										$result_job_work = mysqli_query( $conn, $select_job_work );
										
										while($fetch_job_work = mysqli_fetch_array( $result_job_work )){ ?>
                                            <tr>
                                                  <td><?php echo $i; ?></td>
                                                  <td><?php echo $fetch_job_work['item_description']; ?></td>
                                                  <td><?php echo $fetch_job_work['hsn']; ?></td>
                                                  <td><?php echo $fetch_job_work['min_quantity']; ?></td>
                                                  <td><?php echo $fetch_job_work['rate']; ?></td>
                                                  <td><?php $total_cost = $fetch_job_work['min_quantity']*$fetch_job_work['rate']; 
												  echo $total_cost;
												  $SgstVal = $SgstVal+$fetch_job_work['sgst_amt'];
												  $cgstVal = $cgstVal+$fetch_job_work['cgst_amt'];
												  $totalVal = $totalVal+$total_cost; ?></td>
                                            </tr>
                                        <?php $i++; } 
									}?>
                                    <tr>	
                                    	  <td>&nbsp;</td>
                                          <td>Your DC No : <?php echo $_REQUEST['odernumber']; ?>/<?php echo $_REQUEST['oderplacedon']; ?></td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    	  <td>&nbsp;</td>
                                          <td>(Hard Chrome Plating)</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                    </tr>
                                </table>
                          	</td>
                        </tr> 
                   </table>
                </div>
                <div class="bottom_row">
                    <div class="amount_row">
                    	<div class="amtInWords">
                            <p>Amount In Words &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;<?php 
                            error_reporting(0);
                            function convertNumberToWord($num = false){
                                $num = str_replace(array(',', ' '), '' , trim($num));
                                if(! $num) {
                                    return false;
                                }
                                $num = (int) $num;
                                $words = array();
                                $list1 = array('', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven','Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
                                );
                                $list2 = array('', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety', 'Hundred');
                                $list3 = array('', 'Thousand', 'Million', 'Billion');
                                $num_length = strlen($num);
                                $levels = (int) (($num_length + 2) / 3);
                                $max_length = $levels * 3;
                                $num = substr('00' . $num, -$max_length);
                                $num_levels = str_split($num, 3);
                                for ($i = 0; $i < count($num_levels); $i++) {
                                    $levels--;
                                    $hundreds = (int) ($num_levels[$i] / 100);
                                    $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '');
                                    $tens = (int) ($num_levels[$i] % 100);
                                    $singles = '';
                                    if ( $tens < 20 ) {
                                        $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
                                    } else {
                                    $tens = (int)($tens / 10);
                                    $tens = ' ' . $list2[$tens] . ' ';
                                    $singles = (int) ($num_levels[$i] % 10);
                                    $singles = ' ' . $list1[$singles] . ' ';
                                }
                                $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
                            } 
                            $commas = count($words);
                            if ($commas > 1) {
                                $commas = $commas - 1;
                            }
                            $data= implode(' ', $words);
                                return $data." ".'only';
                            }
                            echo convertNumberToWord($totalVal+$cgstVal+$SgstVal); ?></p>
                        </div>
                        <div class="bank_details">
                            <p>Bank Details</p>
                            <table>
                                <tr><td>Bank Name:</td><td>United Bank Of India, Peelamedu Branch</td></tr>
                                <tr><td>Bank A/C No:</td><td>1488210000444</td></tr>
                                <tr><td>IFSC Code No:</td><td>UTBI0PLU841</td></tr>
                            </table>
                        </div> 
                        <div class="received_by">
                            <p><strong>Terms & Condition</strong></p>
                            <p>1. Our responsibility ceases on delivery of the goods to carriers</p>
                            <p>2. Goods once sold will not accepted back.</p>
                            <p>3. Interest 24% will be charged on unpaid bill after 15 days</p>
                    	</div>
                    </div>
                    <div class="tax_row">
                    	<div class="taxSection">
                            <div class="width50">
                                <p>Total Amount Before Tax: </p>
                                <p>Add : SGST 9% </p>
                                <p>Add : CGST 9% </p>
                                <p>Add : IGST 18% </p>
                                <p>Total Amount after Tax:</p>
                            </div>
                            <div class="width50">
                                <p><?php echo $totalVal; ?></p>
                                <p><?php if($fetch_client['state_code']=="33") { echo $cgstVal; }else{ echo "&nbsp;"; } ?></p>
                                <p><?php if($fetch_client['state_code']=="33") { echo $SgstVal; }else{ echo "&nbsp;"; } ?></p>
                                <p><?php if($fetch_client['state_code']!="33") { echo $cgstVal+$SgstVal; }else{ echo "&nbsp;"; } ?></p>
                                <p><?php echo $totalVal+$cgstVal+$SgstVal; ?></p>
                            </div>
                        </div>
                        <div class="signature">
                        <strong><b style="font-size:12px">Shri Shendhuren Electro Plating,</b></strong><br /><br /><br />
                            <p>Authorized Signature</p>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
  </div>
<script type="text/javascript">
function generateBill(select_client,order_type,p_dc_jo_number,ordered_date,totalGstVal,total_amt) {

	var original_receipient = ""; var duplicate_suppliers = ""; var triplicate_suppliers = "";
	var returnVal = true;
	
	if($('#invoice_no').val()==""){
		 $('#invoice_no').css('border', '1px solid #ff0000');
		 returnVal = false;
	}
	
	if($('#original_receipient').is(':checked')==false){
		original_receipient = "";
	}else{
		original_receipient = $('#original_receipient').val();
	}
	
	if($('#duplicate_suppliers').is(':checked')==false){
		duplicate_suppliers = "";
	}else{
		duplicate_suppliers = $('#duplicate_suppliers').val();
	}
	
	if($('#triplicate_suppliers').is(':checked')==false){
		triplicate_suppliers = "";
	}else{
		triplicate_suppliers = $('#triplicate_suppliers').val();
	}
	
	if ( returnVal == true ) {
		jQuery.ajax( {
			type: "POST",
			url: "shen_ajax.php",
			async: false,
			data: {
				"select_client": select_client,
				"order_type": order_type,
				"p_dc_jo_number": p_dc_jo_number,
				"ordered_date":ordered_date,
				"total_gst_amt":totalGstVal,
				"total_amt":total_amt,
				"reverse_charge":$('#reverse_charge').val(),
				"invoice_no":$('#invoice_no').val(),
				"invoice_date":$('#invoice_date').val(),
				"transport_mode":$('#transport_mode').val(),
				"vehicle_number":$('#vehicle_number').val(),
				"date_supply":$('#date_supply').val(),
				"place_supply":$('#place_supply').val(),
				"original_receipient":original_receipient,
				"duplicate_suppliers":duplicate_suppliers,
				"triplicate_suppliers":triplicate_suppliers,
				"type": 'bill_generation'
			},
			success: function ( responseData ) {
				if ( responseData != 0 ) {
					alert("Bill No: "+responseData);
				} else {
					$( '#success_msg' ).addClass( 'formError_msg' );
					document.getElementById( 'success_msg' ).innerHTML = 'Please Provide Valid Data in All the Fields';
				}
			}
		});
	}
}
</script>
</body></html>
