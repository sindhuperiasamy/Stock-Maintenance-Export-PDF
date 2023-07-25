<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<title>Add Client | Sri Shendhuren Electro Plating</title>
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
          <h2>Add Payment Type</h2>
          <div class="block"><?php
                if(isset($_REQUEST['view'])){  ?>
					<script type="text/javascript">
                    function confirmButtuon(){
                        var returnVal = true;
                        var clientFormName = document.clientForm;
                        $( 'div[id^="alert_"]' ).html( '' );
                       
                            jQuery.ajax( {
                                type: "POST",
                                url: "shen_ajax.php",
                                async: false,
                                data: {
                                    "payment_mode": clientFormName.payment_mode.value,
                                    "payment_number": clientFormName.payment_number.value,
									"payment_id":<?php echo $_REQUEST['view']; ?>,
                                    "type": 'payment_mode'
                                },
                                success: function ( responseData ) {
                                    if ( responseData != "" ) {
                                        window.location="payment_mode.php";
                                    } else {
                                        $( '#success_msg' ).addClass( 'formError_msg' );
                                        document.getElementById( 'success_msg' ).innerHTML = 'Please Provide Valid Data in All the Fields';
                                    }
                                }
                            });
                    }
                    </script>
                    <form name="clientForm" id="clientForm" autocomplete="off" method="POST" enctype="multipart/form-data">
                      <table class="form">
                      <tr>
                          <td><label>Payment Mode</label> </td>
                          <td>
                             <select name="payment_mode" id="payment_mode" onchange="return selectClient(this.value)">
                                <option value="cheque">Cheque</option>
                                <option value="neft">NEFT</option>
                                <option value="rtgs">RTGS</option>
                                <option value="imps">IMPS</option>
                                <option value="cash">CASH</option>
                             </select>
                              <div id="alert_payment_mode" class="formError_msg inputError"></div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Payment Number (if any)</label> </td>
                          <td>
                             <input type="text" name="payment_number" id="payment_number" class = "mini" maxlength="150" onchange="return trim(this)">
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
</body>
</html>
