<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Login | Sri Shendhuren Electro Plating</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
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
<!-- jQuery dialog related-->
<script src="js/jquery-ui/external/jquery.bgiframe-2.1.2.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.draggable.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.position.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.resizable.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.dialog.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.blind.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.explode.min.js" type="text/javascript"></script>
<!-- jQuery dialog end here-->
<script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
<!--Fancy Button-->
<script src="js/fancy-button/fancy-button.js" type="text/javascript"></script>
<script src="js/setup.js" type="text/javascript"></script>
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
<style type="text/css">
#progress-bar {
	width: 400px;
}
</style>
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

<script type="text/javascript">
	var captchaBool = 0;
	var $name = "";

	function regFormValidate() {
		var returnVal = true;
		var loginFormName = document.loginForm;
		$( 'div[id^="alert_"]' ).html( '' );
		
		if ( loginFormName.emp_id.value == "" ) {
			showLabelAlert( '<?php echo ALERT_EMP_ID; ?>', 'emp_id' );
			returnVal = false;
		}
		if ( loginFormName.emp_password.value == "" ) {
			showLabelAlert( '<?php echo ALERT_EMP_PASSWORD; ?>', 'emp_password' );
			returnVal = false;
		}
		if ( returnVal == true ) {
			jQuery.ajax( {
				type: "POST",
				async: true,
				dataType: "script",
				url: "shen_ajax.php",
				data: {
					"emp_id": loginFormName.emp_id.value,
					"emp_password": loginFormName.emp_password.value,
					"type": 'user_login'
				},
				success: function ( responseData ) {
					if ( responseData == 1 ) {
						window.location = "dashboard.php";
					} else {
						$( '#success_msg' ).addClass( 'error_msg' );
						document.getElementById( 'success_msg' ).innerHTML = 'Please Enter Valid Employee ID / Password !!!';
					}
				}
			});
		}
	}
</script>
<div class="container_12">
  <div class="grid_12 header-repeat">
    <div id="branding">
      <div class="floatleft">Sri Shendhuren Electro Plating</div>
      <div class="clear"> </div>
    </div>
  </div>
  <div class="grid_12">
    <div class="box round first fullpage">
      <h2> Login</h2>
      <div class="block">
       <form name="loginForm" id="loginForm" autocomplete="off" method="POST">
          <table class="form">
            <tr>
              <td><label> Username</label>
              </td>
              <td><input type="text" name="emp_id" id="emp_id" class="mini" />
              <div id="alert_emp_id" class="error_msg inputError"></div>
              </td>
            </tr>
            <tr>
              <td><label>Password</label>
              </td>
              <td><input type="password" name="emp_password" id="emp_password" class="mini" />
              <div id="alert_emp_password" class="error_msg inputError"></div>
              </td>
            </tr>
            <tr>
            <td></td>
            <td>
            	<input type="button" name="login_submit" id="login_submit" value="Login" onClick="return regFormValidate();" class="btn"/>&nbsp;&nbsp;
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
</div>
</body>
</html>