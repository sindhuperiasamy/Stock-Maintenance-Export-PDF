<?php
include( 'config.php' );
if ( $_POST[ 'type' ] == "user_login" ) {
	$select_query = "select * from user_info where username  = '" . $_POST[ 'emp_id' ] . "' and password = '" . MD5($_POST[ 'emp_password' ]) . "'";
	$result = mysqli_query( $conn, $select_query );
	$no_of_rows = mysqli_num_rows( $result );
	$row = mysqli_fetch_array( $result );
	if ( $no_of_rows > 0 ) {
		$_SESSION['user_id'] = $row[ 'id' ];
		$_SESSION['user_type'] = $row[ 'user_type' ];
		echo "1";
	} else {
		echo "0";
	}
} else if ( $_POST[ 'type' ] == "add_client" ) {
	
	$insert_client = "INSERT INTO client_master (business_client_name, contact_person, client_email, client_contactno, alternate_contact_person, alternate_client_email, alternate_client_contactno,	gstin, pan_no, cin_no, client_address,select_state,state_code,cdate,mdate ) VALUES ('".$_POST[ 'business_client_name' ]."', '".$_POST[ 'contact_person' ]."', '".$_POST[ 'client_email' ]."', '".$_POST[ 'client_contactno' ]."', '".$_POST[ 'alternate_contact_person' ]."', '".$_POST[ 'alternate_client_email' ]."', '".$_POST[ 'alternate_client_contactno' ]."','".$_POST[ 'gstin' ]."','".$_POST[ 'pan_no' ]."','".$_POST[ 'cin_no' ]."','".$_POST[ 'client_address' ]."','".$_POST[ 'select_state' ]."','".$_POST[ 'state_code' ]."',NOW(),NOW())";
	$result = mysqli_query( $conn, $insert_client );
	if ( $result ) {
		echo "1";
	} else {
		echo "0";
	}
	
}else if($_POST[ 'type' ] == "add_client_info"){

	$insert_client = "INSERT INTO inward_client_info (client_id, p_dc_jo_type, p_dc_jo_number, p_dc_jo_date, cdate ) VALUES ('".$_POST[ 'select_client' ]."','".$_POST[ 'order_type' ]."','".$_POST[ 'p_dc_jo_number' ]."','".$_POST[ 'p_dc_jo_date' ]."', NOW())";
	$result = mysqli_query( $conn, $insert_client );
	echo $lastid = mysqli_insert_id($conn);

}else if ( $_POST[ 'type' ] == "add_inward" ) {
	
	$insert_order = "INSERT INTO inward_info(sno,item_code, item_description, quantity, sel_client_id, inward_client_id,cdate,mdate ) VALUES ('".$_POST[ 'sno' ]."','".$_POST[ 'item_code' ]."', '".$_POST[ 'item_description' ]."', '".$_POST[ 'quantity' ]."','".$_POST[ 'select_client']."','".$_POST[ 'hid_last_inid']."',NOW(),NOW())";
	$result_oder = mysqli_query( $conn, $insert_order );
	
	if ( $result_oder ) {
			$select_client_details = "select * from inward_info where inward_client_id = '".$_POST[ 'hid_last_inid']."' order by id desc";
			$result_client = mysqli_query( $conn, $select_client_details );
			$contentApp = '<table class="form" id="exampleDis">
                <tr>
                  <th>Sno</th>
                  <th>Item Code</th>
                  <th>Item Description</th>
                  <th>Quantity</th>
                  <th>Option</th>
                </tr>';
			while($fetch_client = mysqli_fetch_array( $result_client )){
				$contentApp .= '<tr id=row'.$fetch_client['id'].'>
					  <td>'.$fetch_client['sno'].'</td>
					  <td>'.$fetch_client['item_code'].'</td>
					  <td>'.$fetch_client['item_description'].'</td>
					  <td>'.$fetch_client['quantity'].'</td>
					  <td><a href="javascript:;" onClick="return deleteRecord('.$fetch_client['id'].')">Delete</a></td>
					</tr>';
			}
            echo $contentApp .= '</table>';
	} else {
		echo "0";
	}
	
}else if ( $_POST[ 'type' ] == "delete_cur_inward" ) {
	$delete_group_info="DELETE FROM inward_info WHERE id = ".$_POST['curVal'];
	$client_result=mysqli_query($conn,$delete_group_info);
	if ( $client_result ) {
		echo $_POST['curVal'];
	} else {
		echo "0";
	}
}else if ( $_POST[ 'type' ] == "add_job_work" ) {
	
	$insert_order = 'INSERT INTO job_work(sno,hsn,item_code,item_description,quantity,min_quantity, pending_quantity, rate, tax_amount, cgst, cgst_amt, sgst, sgst_amt, total_payable, inward_info_id, order_date, cdate, mdate ) VALUES ("'.$_POST[ 'sno' ].'","'.$_POST[ 'hsn' ].'", "'.$_POST[ 'item_code' ].'", "'.$_POST[ 'item_description' ].'","'.$_POST[ 'quantity'].'","'.$_POST[ 'min_quantity' ].'","'.$_POST[ 'pending_quantity' ].'", "'.$_POST[ 'rate' ].'", "'.$_POST[ 'tax_amount' ].'","'.$_POST[ 'cgst'].'","'.$_POST[ 'cgst_amt'].'","'.$_POST[ 'sgst' ].'","'.$_POST[ 'sgst_amt'].'","'.$_POST[ 'total_payable'].'","'.$_POST[ 'inward_info_id'].'","'.$_POST[ 'order_date'].'",NOW(),NOW())';
	$result_oder = mysqli_query( $conn, $insert_order );
	if ( $result_oder ) {
	
		$select_inward_infoid = "select * from inward_info where id = '".$_POST['inward_info_id']."' order by id desc";
		$result_inward_infoid = mysqli_query( $conn, $select_inward_infoid );
		$fetch_inward_infoid = mysqli_fetch_array( $result_inward_infoid );
		
		$select_inwardclient_infoid = "select * from inward_client_info where id = '".$fetch_inward_infoid['inward_client_id']."' order by id desc";
		$result_inward_client = mysqli_query( $conn, $select_inwardclient_infoid );
		$fetch_inward_client = mysqli_fetch_array( $result_inward_client );
	
		echo $fetch_inward_client['id'];
	} else {
		echo "0";
	}
}else if ( $_POST[ 'type' ] == "view_order" ) {

	$select_inward_details = "select * from job_work where inward_info_id = '".$_POST['inwardID']."' order by id desc";
	$result_inward = mysqli_query( $conn, $select_inward_details );
	$no_of_rows = mysqli_num_rows( $result_inward );
	
	$totalVal = 0;	$totalGstVal = 0; $cgstSgstVal = 0;
	
	$contentApp = '<a style="float:right; font-size:16px; float:right;" href="javascript:;" onClick="return closeBtn();">x</a><table id="exampleDis">
		<tr>
		  <th>#</th>
		  <th>Quantity Given</th>
		  <th>Pending Quantity</th>
		  <th>Rate</th>
		  <th>Taxable Amt</th>
		  <th>CGST %</th>
		  <th>CGST Amt</th>
		  <th>SGST</th>
		  <th>SGST Amt</th>
		  <th>Total Payable</th>
		  <th>Delete</th>
		</tr>';
	if($no_of_rows>0){
		$i=1;
		while($fetch_client = mysqli_fetch_array( $result_inward )){
			$contentApp .= '<tr>
				  <td>'.$i.'</td>
				  <td>'.$fetch_client['min_quantity'].'</td>
				  <td>'.$fetch_client['pending_quantity'].'</td>
				  <td>'.$fetch_client['rate'].'</td>
				  <td>'.$fetch_client['tax_amount'].'</td>
				  <td>'.$fetch_client['cgst'].'</td>
				  <td>'.$fetch_client['cgst_amt'].'</td>
				  <td>'.$fetch_client['sgst'].'</td>
				  <td>'.$fetch_client['sgst_amt'].'</td>
				  <td>'.$fetch_client['total_payable'].'</td>
				  <td><a href="javascript:;" onclick="return deleteInward('.$fetch_client['id'].')">Delete</a></td>
			</tr>';
			
			$cgstSgstVal = $fetch_client['cgst_amt']+$fetch_client['sgst_amt'];
			
			$totalVal = $totalVal+$fetch_client['total_payable'];
			
			$totalGstVal = $totalGstVal+$cgstSgstVal;
			$i++;
		} ?>
    	<?php /*?><a href="print_preview.php?clientid=<?php echo $_POST['select_client']; ?>&ordertype=<?php echo $_POST['order_type']; ?>&odernumber=<?php echo $_POST['p_dc_jo_number']; ?>&oderplacedon=<?php echo $_POST['order_placed_date']; ?>&totalgstval=<?php echo $totalGstVal; ?>&totalval=<?php echo $totalVal; ?>" class="btn" target="_blank" style="margin-bottom:2%;">Print</a><?php */?><?php
	
	}else{
		$contentApp .= '<tr><td colspan="10">No Records Found</td></tr>';
	}
	echo $contentApp .= '</table>'; 
}
else if ( $_POST[ 'type' ] == "reset_password" ) {
	$resetPassword = "UPDATE user_info SET password='".MD5($_POST[ 'password' ])."' WHERE id=".$_SESSION['user_id'];
	$result_password = mysqli_query($conn,$resetPassword);
	if ( $result_password ) {
		session_destroy(); 
		echo "1";
	} else {
		echo "0";
	}
}else if ( $_POST[ 'type' ] == "select_client_inward" ) {

	$select_client_inward = "select * from inward_client_info where client_id = '".$_POST[ 'select_client']."' and p_dc_jo_type = '".$_POST[ 'order_type']."' and p_dc_jo_number = '".$_POST[ 'p_dc_jo_number']."' order by id desc";
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
	
	$contentApp = '<table id="exampleDis">
	<tr>
	  <th>SNO</th>
	  <th>HSN</th>
	  <th>Item Code</th>
	  <th>Item Description</th>
	  <th>Quantity</th>
	  <th>Quantity Given</th>
	  <th>Rate</th>
	  <th>Taxable Amount</th>
	  <th>CGST %</th>
	  <th>CGST Amt</th>
	  <th>SGST %</th>
	  <th>SGST Amt</th>
	  <th>Total Payable</th>
	</tr>';
	$totalVal = 0;	$totalGstVal = 0; $cgstSgstVal = 0;
	foreach($expInward as $inward_infoid){
		$select_job_work = "select * from job_work where inward_info_id = '".$inward_infoid."' and order_date = '".$_POST[ 'order_placed_date']."' order by id ASC";
		$result_job_work = mysqli_query( $conn, $select_job_work );
		while($fetch_job_work = mysqli_fetch_array( $result_job_work )){
			$contentApp .= '<tr>
			  <td>'.$fetch_job_work['sno'].'</td>
			  <td>'.$fetch_job_work['hsn'].'</td>
			  <td>'.$fetch_job_work['item_code'].'</td>
			  <td>'.$fetch_job_work['item_description'].'</td>
			  <td>'.$fetch_job_work['quantity'].'</td>
			  <td>'.$fetch_job_work['min_quantity'].'</td>
			  <td>'.$fetch_job_work['rate'].'</td>
			  <td>'.$fetch_job_work['tax_amount'].'</td>
			  <td>'.$fetch_job_work['cgst'].'</td>
			  <td>'.$fetch_job_work['cgst_amt'].'</td>
			  <td>'.$fetch_job_work['sgst'].'</td>
			  <td>'.$fetch_job_work['sgst_amt'].'</td>
			  <td>'.$fetch_job_work['total_payable'].'</td>
			</tr>';
			
			$cgstSgstVal = $fetch_job_work['cgst_amt']+$fetch_job_work['sgst_amt'];
			
			$totalVal = $totalVal+$fetch_job_work['total_payable'];
			
			$totalGstVal = $totalGstVal+$cgstSgstVal;
		}
	}
	echo $contentApp .= '<tr>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td><strong>Total</strong></td>
			  <td>'.round($totalVal,2).'</td>
			</tr></table>'; ?>
    
            <?php /*?><a class="btn floatRhtBtn" onclick="generateBill('<?php echo $_POST['select_client']; ?>','<?php echo $_POST['order_type']; ?>','<?php echo $_POST['p_dc_jo_number']; ?>','<?php echo $_POST[ 'order_placed_date']; ?>','<?php echo $totalGstVal; ?>','<?php echo $totalVal; ?>')">Generate Bill</a><?php */?>
            <a href="print_preview.php?clientid=<?php echo $_POST['select_client']; ?>&ordertype=<?php echo $_POST['order_type']; ?>&odernumber=<?php echo $_POST['p_dc_jo_number']; ?>&oderplacedon=<?php echo $_POST['order_placed_date']; ?>&totalgstval=<?php echo $totalGstVal; ?>&totalval=<?php echo $totalVal; ?>" class="btn floatRhtBtn" target="_blank">Print</a>
    
<?php	
}else if ( $_POST[ 'type' ] == "bill_generation" ) {

	$billno = '';
	$select_billing = "select * from billing";
	$result_billing = mysqli_query( $conn, $select_billing );
	$no_of_rows = mysqli_num_rows( $result_billing );
	if($no_of_rows==0){
/*		$billno = 1;
		$select_last_billing = "SELECT * FROM billing LIMIT 0, 1";
		$result_last_billing = mysqli_query( $conn, $select_last_billing );
		$fetch_last_billing = mysqli_fetch_array( $result_last_billing );	
		$billno = $fetch_last_billing['bill_no']+1;*/
		
		$insert_billing = "INSERT INTO billing(	bill_no,select_client,order_type,p_dc_jo_number,order_date,gst_amt,total_amt,reverse_charge,invoice_date,transport_mode,vehicle_number,date_supply,place_supply,original_receipient,duplicate_suppliers,triplicate_suppliers,cdate) VALUES ('".$_POST[ 'invoice_no' ]."','".$_POST[ 'select_client' ]."','".$_POST[ 'order_type' ]."', '".$_POST[ 'p_dc_jo_number' ]."', '".$_POST[ 'ordered_date' ]."','".$_POST[ 'total_gst_amt']."','".$_POST[ 'total_amt']."','".$_POST[ 'reverse_charge']."','".$_POST[ 'invoice_date']."','".$_POST[ 'transport_mode']."','".$_POST[ 'vehicle_number']."','".$_POST[ 'date_supply']."','".$_POST[ 'place_supply']."','".$_POST[ 'original_receipient']."','".$_POST[ 'duplicate_suppliers']."','".$_POST[ 'triplicate_suppliers']."',NOW())";
		$result_oder = mysqli_query( $conn, $insert_billing );
		
		if ( $result_oder ) {
			echo $billno;
		} else {
			echo "0";
		}
		
	}else{
	
		$select_bill_generated = "select * from billing where select_client = '".$_POST[ 'select_client' ]."' and order_type = '".$_POST[ 'order_type' ]."' and p_dc_jo_number = '".$_POST[ 'p_dc_jo_number' ]."' and order_date = '".$_POST[ 'ordered_date' ]."' order by id ASC";
		$result_bill_generated = mysqli_query( $conn, $select_bill_generated );
		$no_of_rows_bill_generated = mysqli_num_rows( $result_bill_generated );
		
		if($no_of_rows_bill_generated>0){
		
			$update_bill = "UPDATE billing set reverse_charge = '".$_POST[ 'reverse_charge' ]."',invoice_date = '".$_POST[ 'invoice_date' ]."',transport_mode = '".$_POST[ 'transport_mode' ]."',vehicle_number = '".$_POST[ 'vehicle_number' ]."',date_supply = '".$_POST[ 'date_supply' ]."',place_supply = '".$_POST[ 'place_supply' ]."',original_receipient = '".$_POST[ 'original_receipient' ]."',duplicate_suppliers = '".$_POST[ 'duplicate_suppliers' ]."',triplicate_suppliers = '".$_POST[ 'triplicate_suppliers' ]."',total_amt = '".$_POST[ 'total_amt' ]."',gst_amt = '".$_POST[ 'total_gst_amt' ]."' where select_client = '".$_POST[ 'select_client' ]."' and order_type = '".$_POST[ 'order_type' ]."' and p_dc_jo_number = '".$_POST[ 'p_dc_jo_number' ]."' and order_date = '".$_POST[ 'ordered_date' ]."'";
			$result = mysqli_query( $conn, $update_bill );
			
			if ( $result ) {
				echo "Updated";
			} else {
				echo "0";
			}
		
		}else{
	
/*			$select_last_billing = "SELECT * FROM billing ORDER BY id DESC LIMIT 0, 1";
			$result_last_billing = mysqli_query( $conn, $select_last_billing );
			$fetch_last_billing = mysqli_fetch_array( $result_last_billing );	
			$billno = $fetch_last_billing['bill_no']+1;*/
			
			$insert_billing = "INSERT INTO billing(	bill_no,select_client,order_type,p_dc_jo_number,order_date,gst_amt,total_amt,reverse_charge,invoice_date,transport_mode,vehicle_number,date_supply,place_supply,original_receipient,duplicate_suppliers,triplicate_suppliers,cdate) VALUES ('".$_POST[ 'invoice_no' ]."','".$_POST[ 'select_client' ]."','".$_POST[ 'order_type' ]."', '".$_POST[ 'p_dc_jo_number' ]."', '".$_POST[ 'ordered_date' ]."','".$_POST[ 'total_gst_amt']."','".$_POST[ 'total_amt']."','".$_POST[ 'reverse_charge']."','".$_POST[ 'invoice_date']."','".$_POST[ 'transport_mode']."','".$_POST[ 'vehicle_number']."','".$_POST[ 'date_supply']."','".$_POST[ 'place_supply']."','".$_POST[ 'original_receipient']."','".$_POST[ 'duplicate_suppliers']."','".$_POST[ 'triplicate_suppliers']."',NOW())";
			
			$result_oder = mysqli_query( $conn, $insert_billing );
			if ( $result_oder ) {
				echo $billno;
			} else {
				echo "0";
			}
		
		}
		
	}
}else if ( $_POST[ 'type' ] == "payment_mode" ) {

			$update_payment_mode = "UPDATE billing set payment_mode = '".$_POST[ 'payment_mode' ]."', payment_number =  '".$_POST[ 'payment_number' ]."' where id = '".$_POST[ 'payment_id' ]."'";
			$result = mysqli_query( $conn, $update_payment_mode );
			
			if ( $result ) {
				echo "1";
			} else {
				echo "0";
			}
}else if ( $_POST[ 'type' ] == "bill_summary" ) {

		$select_bill_generated = "select * from billing where select_client = '".$_POST[ 'select_client' ]."' and STR_TO_DATE(order_date, '%d/%m/%Y') BETWEEN STR_TO_DATE('".$_POST[ 'start_date' ]."','%d/%m/%Y') and STR_TO_DATE('".$_POST[ 'end_date' ]."','%d/%m/%Y') order by id ASC";
		$result_bill_generated = mysqli_query( $conn, $select_bill_generated );
		$no_of_rows_bill_generated = mysqli_num_rows( $result_bill_generated );
		
		$contentApp = '<table id="exampleDis">
			<tr>
			  <th>SNO</th>
			  <th>Invoice No</th>
			  <th>Client Name</th>
			  <th>Order Type</th>
			  <th>Order Date</th>
			  <th>GST Amount</th>
			  <th>Total Amount</th>
			  <th>Payment Type</th>
			  <th>Payment Number</th>
			</tr>';
			$totalVal = 0; $i=1;	
				while($fetch_job_work = mysqli_fetch_array( $result_bill_generated )){
				
					$client_name = "select business_client_name from client_master where id = '".$fetch_job_work['select_client']."'";
					$result_client_name = mysqli_query($conn, $client_name);
					$rows_client_name = mysqli_fetch_array($result_client_name);
					
					$contentApp .= '<tr>
					  <td>'.$i.'</td>
					  <td>'.$fetch_job_work['bill_no'].'</td>
					  <td>'.$rows_client_name['business_client_name'].'</td>
					  <td>'.$fetch_job_work['order_type'].'</td>
					  <td>'.$fetch_job_work['order_date'].'</td>
					  <td>'.$fetch_job_work['gst_amt'].'</td>
					  <td>'.$fetch_job_work['total_amt'].'</td>
					  <td>'.$fetch_job_work['payment_mode'].'</td>
					  <td>'.$fetch_job_work['payment_number'].'</td>
					</tr>';
					$i++;
				}
		   '</table>';
		   echo $contentApp; ?>
		   
		  		   <a class="btn floatRhtBtn" href="export_pdf/export-billing.php?start_date=<?php echo $_POST[ 'start_date' ]; ?>&end_date=<?php echo $_POST[ 'end_date' ]; ?>&select_client=<?php echo $_POST[ 'select_client' ];?>" target="_blank">Export</a><?php
}else if ( $_POST[ 'type' ] == "delete_inward" ) {
		$delete_job_work="DELETE FROM job_work WHERE id = ".$_POST['delID'];
		$client_job_work=mysqli_query($conn,$delete_job_work);
		if ( $client_job_work ) {
			echo "1";
		} 
		
}else if ( $_POST[ 'type' ] == "select_po_dc_number" ) {

		  $select_inward_client_info = "select * from inward_client_info where p_dc_jo_type = '".$_POST['curOrderType']."' order by id DESC";
		  $result_inward_client_info = mysqli_query( $conn, $select_inward_client_info ); ?>
		
		  <select name="p_dc_jo_number" id="p_dc_jo_number" onchange="return selectDateonNumber()">
			 <option>--Select--</option><?php
				while($fetch_inward_client_info = mysqli_fetch_array( $result_inward_client_info )){ ?>
					<option value="<?php echo $fetch_inward_client_info['p_dc_jo_number']; ?>"><?php echo $fetch_inward_client_info['p_dc_jo_number']; ?></option><?php
				 }  ?> 
		  </select><?php
}
?>