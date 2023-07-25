<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<title>Client List | Sri Shendhuren Electro Plating</title>
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
          <h2>Clients</h2>
          <div class="block">
            <form name="clientForm" id="clientForm" autocomplete="off" method="POST" enctype="multipart/form-data">
              <table class="form">
                <tr>
                  <td><label>Select Client</label> </td>
                  <td>
                    <select name="select_client" id="select_client" onchange="return selectClient(this.value)">
                        <option>-- Select --</option>
                        <?php
                        $select_client_details = "select * from client_master order by id ASC";
                        $result_client = mysqli_query( $conn, $select_client_details );
                        $no_of_rows = mysqli_num_rows( $result_client );
                        $i=1;
                        while($fetch_client = mysqli_fetch_array( $result_client )){?>
                            <option value="<?php echo $fetch_client['id']; ?>"><?php echo $fetch_client['business_client_name']; ?></option><?php
                        } ?>
                    </select>
            	  </td>
                </tr>
               </table>
             </form>
            <div class="marginTopBot" id="regTableDis">
                
            </div>
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
		jQuery.ajax( {
			type: "POST",
			url: "shen_ajax.php",
			async: false,
			data: {
				"client_id": selVal,
				"type": 'select_client_inward'
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
</script>
</body></html>
