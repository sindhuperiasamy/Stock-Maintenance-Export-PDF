<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<title>Bill Generate | Sri Shendhuren Electro Plating</title>
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
          <h2>View Bill Generated</h2>
          <div class="block"><?php
                if(isset($_REQUEST['view'])){ 
        
                    $select_client_detail = "select * from billing where id = ".$_REQUEST['view'];
                    $result_client = mysqli_query( $conn, $select_client_detail );
                    $no_of_rows = mysqli_num_rows( $result_client );
                    $fetch_client = mysqli_fetch_array( $result_client ); ?>
                
                    <table class="form">
                    <tr>
                      <td><label>Business / Client Name</label> </td>
                      <td><?php echo $fetch_client['select_client']; ?></td>
                    </tr>
                    <tr>
                      <td><label>Bill No</label></td>
                      <td><?php echo $fetch_client['bill_no']; ?> </td>
                    </tr>
                    <tr>
                      <td><label>Order Type</label> </td>
                      <td><?php echo $fetch_client['order_type']; ?></td>
                    </tr>
                    <tr>
                      <td><label>PO / DC / Jo Number</label></td>
                      <td><?php echo $fetch_client['p_dc_jo_number']; ?> </td>
                    </tr>
                    <tr>
                      <td><label>Order Date</label> </td>
                      <td><?php echo $fetch_client['order_date']; ?></td>
                    </tr>
                    <tr>
                      <td><label>Reverse Charge</label></td>
                      <td><?php echo $fetch_client['reverse_charge']; ?> </td>
                    </tr>
                    <tr>
                      <td><label>Invoice Date</label> </td>
                      <td><?php echo $fetch_client['invoice_date']; ?> </td>
                    </tr>
                    <tr>
                      <td><label>Vehicle Number</label> </td>
                      <td><?php echo $fetch_client['vehicle_number']; ?>
                    </tr>
                    <tr>
                      <td><label>Date of Supply</label> </td>
                      <td><?php echo $fetch_client['date_supply']; ?></td>
                    </tr>
                    <tr>
                      <td><label>Place of Supply</label> </td>
                      <td><?php echo $fetch_client['place_supply']; ?></td>
                    </tr>
                    <tr>
                      <td><label>Original for Receipient</label> </td>
                      <td><?php echo $fetch_client['original_receipient']; ?></td>
                    </tr>
                    <tr>
                      <td><label>Duplicate for Suppliers / Transporters</label></td>
                      <td><?php echo $fetch_client['duplicate_suppliers']; ?></td>
                    </tr>
                    <tr>
                      <td><label>Triplicate for Suppliers</label> </td>
                      <td><?php echo $fetch_client['triplicate_suppliers']; ?></td>
                    </tr>
                    <tr>
                      <td><label>GST Amt</label> </td>
                      <td><?php echo $fetch_client['gst_amt']; ?></td>
                    </tr>
                    <tr>
                      <td><label>Total Amount</label></td>
                      <td><?php echo $fetch_client['total_amt']; ?></td>
                    </tr>
                  </table><a href="print_preview_copy.php?billid=<?php echo $fetch_client['bill_no']; ?>&id=<?php echo $fetch_client['id']; ?>&clientid=<?php echo $fetch_client['select_client']; ?>&ordertype=<?php echo $fetch_client['order_type']; ?>&odernumber=<?php echo $fetch_client['p_dc_jo_number']; ?>&oderplacedon=<?php echo $fetch_client['order_date']; ?>" class="btn" target="_blank">Print Copy</a><?php
                } ?>
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
</body>
</html>
