<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<title>Job Work | Sri Shendhuren Electro Plating</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
<!-- BEGIN: load jquery -->
<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
<script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
<script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.dialog.min.js" type="text/javascript"></script>
<!-- END: load jquery -->
<script type="text/javascript" src="js/table/table.js"></script>
<script src="js/setup.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
</script>
<script type="text/javascript">
     $(window).load(function () {
         $('#demo-side-bar').removeAttr('style');
     });
</script>
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
<?php include( 'config.php' ); ?>
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
        <div class="box round first grid">
          <h2>Job Work</h2>
          <div class="block">
    
   			<table class="form">
            	<?php 	
				$select_client_inward = "select * from inward_client_info where id = '".$_REQUEST[ 'inwardcid']."' order by id desc";
				$result_client_inward = mysqli_query( $conn, $select_client_inward );
				$fetch_client_inward = mysqli_fetch_array( $result_client_inward ) ?>
                <tr>
					<?php
                    $select_client_details = "select * from client_master where id = ".$fetch_client_inward['client_id'];
                    $result_client = mysqli_query( $conn, $select_client_details );
                    $fetch_client = mysqli_fetch_array( $result_client ); ?>
                    
                  <td><label>Select Client : </label> </td>
                  <td><?php echo $fetch_client['business_client_name']; ?></td>
                  <td><label>PO/DC/JO : </label> </td>
                  <td><?php echo $fetch_client_inward['p_dc_jo_type']; ?></td>
                  <td><label>PO/DC/JO Number : </label> </td>
                  <td><?php echo $fetch_client_inward['p_dc_jo_number']; ?></td>
                  <td><label>PO/DC/JO Date : </label> </td>
                  <td><?php echo $fetch_client_inward['p_dc_jo_date']; ?></td>
                </tr>
            </table>
    		
            <table class="data display datatable" id="example">
              <thead>
                <tr>
                  <th>Sno</th>
                  <th>Item Code</th>
                  <th>Item Description</th>
                  <th>Quantity</th>
                  <th>Option</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $select_inward_details = "select * from inward_info where inward_client_id = '".$_REQUEST['inwardcid']."' order by id desc";
                $result_inward = mysqli_query( $conn, $select_inward_details );
                $no_of_rows = mysqli_num_rows( $result_inward );
                $i=1;
                while($fetch_inward = mysqli_fetch_array( $result_inward )){?>
                
                    <tr class="<?php if($i==1){?>odd<?php }else{ echo "even"; } ?> gradeA">
                      <td><?php echo $fetch_inward['sno']; ?></td>
                      <td><?php echo $fetch_inward['item_code']; ?></td>
                      <td><?php echo $fetch_inward['item_description']; ?></td>
                      <td><?php echo $fetch_inward['quantity']; ?></td>
                      <td class="center"><a href="add_job_work.php?add=<?php echo $fetch_inward['id']; ?>">Place Order</a> | <a href="javascript:;" onClick="return displayViewOrder(<?php echo $_REQUEST['inwardcid']; ?>);">View Order</a></td>
                    </tr><?php
                    
                    $i++;															
                } ?>
                
              </tbody>
            </table>
            
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
<style>
.sorting,.sorting_asc {
background-image:none;
}
#example_filter {
display:none;
}
</style>
<script type="text/javascript">
function displayViewOrder(inwardID){
		jQuery.ajax( {
		type: "POST",
		url: "shen_ajax.php",
		async: false,
		data: {
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
</script>
</body></html>
