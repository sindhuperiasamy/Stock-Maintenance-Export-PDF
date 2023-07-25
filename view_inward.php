<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<title>View Inward | Sri Shendhuren Electro Plating</title>
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

            setDatePicker('date-picker');

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
<?php if(isset($_SESSION['user_id'])){?>
    <div class="container_12">
      <?php include('top-nav.php'); ?>
      <div class="clear"> </div>
      <?php include('left-sidebar.php'); ?>
      <div class="grid_10">
        <div class="box round first fullpage">
          <h2>View Inward</h2>
          <div class="block"><?php
                if(isset($_REQUEST['view'])){ 
    
                    $select_inward_detail = "select * from inward_client_info where id = ".$_REQUEST['view'];
                    $result_inward = mysqli_query( $conn, $select_inward_detail );
                    $no_of_rows = mysqli_num_rows( $result_inward );
                    $fetch_inward = mysqli_fetch_array( $result_inward ); ?>
    
                    <table class="form">
                        <?php 			
                        $select_client_details = "select * from client_master where id = ".$fetch_inward['client_id'];
                        $result_client = mysqli_query( $conn, $select_client_details );
                        $fetch_client = mysqli_fetch_array( $result_client ); ?>
                        <tr>
                          <td><label>Business / Client Name</label> </td>
                          <td>
						  	<?php echo $fetch_client['business_client_name']; ?>
                            <input type="hidden" name="client_id" id="client_id" value="<?php echo $fetch_inward['client_id']; ?>" />
                           </td>
                        </tr>
                        <tr>
                          <td><label>Order Type</label></td>
                          <td>
						  	<?php echo $fetch_inward['p_dc_jo_type']; ?> 
                            <input type="hidden" name="p_dc_jo_type" id="p_dc_jo_type" value="<?php echo $fetch_inward['p_dc_jo_type']; ?>" />
                           </td>
                        </tr>
                        <tr>
                          <td><label>PO / JO / DC Number</label></td>
                          <td>
						  	<?php echo $fetch_inward['p_dc_jo_number']; ?> 
                            <input type="hidden" name="p_dc_jo_number" id="p_dc_jo_number" value="<?php echo $fetch_inward['p_dc_jo_number']; ?>" />
                          </td>
                        </tr>
                        <tr>
                          <td><label>PO / JO / DC Date</label> </td>
                          <td>
						  	<?php echo $fetch_inward['p_dc_jo_date']; ?>
                            <input type="hidden" name="p_dc_jo_date" id="p_dc_jo_date" value="<?php echo $fetch_inward['p_dc_jo_date']; ?>" />
                          </td>
                        </tr>
                    </table>
                    
                    <?php 
                    if(isset($_REQUEST['del'])){
                        
                        $delete_group_info="DELETE FROM inward_info WHERE id = ".$_REQUEST['del'];
                        $client_result=mysqli_query($conn,$delete_group_info);
                    
                        echo '<h5 class="errorMsg">Deleted Successfully</h5>';
                    }
                        
                    $select_inwardDetails = "select * from inward_info where sel_client_id = ".$fetch_inward['client_id']." and inward_client_id = ".$fetch_inward['id'];
                    $result_inward_info = mysqli_query( $conn, $select_inwardDetails ); ?>
                    
                    <table class="form">
                      <thead>
                        <tr>
                          <td>SNO</td>
                          <td>Item Code</td>
                          <td>Item Description</td>
                          <td>Quantity</td>
                          <td>Pending Qty</td>
                          <td>Status</td>
                          <td>Option</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i=1;
                        while($fetch_inward_details = mysqli_fetch_array( $result_inward_info )){?>
                        
                            <tr class="<?php if($i==1){?>odd<?php }else{ echo "even"; } ?> gradeA">
                              <td><?php echo $fetch_inward_details['sno']; ?></td>
                              <td><?php echo $fetch_inward_details['item_code']; ?></td>
                              <td><?php echo $fetch_inward_details['item_description']; ?></td>
                              <td class="center"> <?php echo $fetch_inward_details['quantity']; ?></td>
                              
                              <?php
                                $select_pendingQty = "select pending_quantity from job_work where inward_info_id = ".$fetch_inward_details['id']." ORDER BY id DESC LIMIT 0,1";
                                $result_pendingQty = mysqli_query( $conn, $select_pendingQty ); 
								$fetch_pendingQty = mysqli_fetch_array( $result_pendingQty )
								
							?>
                              
                              <td class="center"> <?php echo $fetch_pendingQty['pending_quantity']; ?></td>
                              <td class="center"> 
							  	<?php 
									if($fetch_pendingQty['pending_quantity']==0&&$fetch_pendingQty['pending_quantity']!=""){ 
										echo "<p style='color:green;'>Completed</p>"; 
									}else{ 
										echo "<p style='color:red;'>Pending</p>"; 
									} ?>
                               </td>
                              <td class="center"><a href="add_job_work.php?add=<?php echo $fetch_inward_details['id']; ?>">Place Order</a> | <a href="javascript:;" onClick="return displayViewOrder(<?php echo $fetch_inward_details['id']; ?>);">View Order</a> | <a href="view_inward.php?view=<?php echo $_REQUEST['view']; ?>&del=<?php echo $fetch_inward_details['id']; ?>">Delete</a></td>
                            </tr><?php
                            
                            $i++;															
                        } ?>
                        
                      </tbody>
                    </table>
                    
                 <?php 
                } ?>
          </div>
          <div id="regTableDis">
                
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
function displayViewOrder(inwardID){
		jQuery.ajax( {
		type: "POST",
		url: "shen_ajax.php",
		async: false,
		data: {
			"inwardID": inwardID,
			"select_client": $('#client_id').val(),
			"order_type": $('#p_dc_jo_type').val(),
			"p_dc_jo_number": $('#p_dc_jo_number').val(),
			"order_placed_date": $('#p_dc_jo_date').val(),
			"inwardID": inwardID,
			"type": 'view_order'
		},
		success: function ( responseData ) {
			if ( responseData !="" ) {
				$('#regTableDis').css('display','block');
				$('#regTableDis').html(responseData);
			} 
		}
	});
}
function closeBtn(){
	$('#regTableDis').html('');
}

function deleteInward(delID){
	jQuery.ajax( {
		type: "POST",
		url: "shen_ajax.php",
		async: false,
		data: {
			"delID": delID,
			"type": 'delete_inward'
		},
		success: function ( responseData ) {
			if ( responseData !="" ) {
				location.reload();
			} 
		}
	});
}
</script>
</body>
</html>
