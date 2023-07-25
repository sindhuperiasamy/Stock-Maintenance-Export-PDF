<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<title>Reset Password | Sri Shendhuren Electro Plating</title>
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
<!-- END: load jqplot -->
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
            
            if ( registerFormName.password.value == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'password' );
                returnVal = false;
            }
            if ( registerFormName.confirm_password.value == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'confirm_password' );
                returnVal = false;
            }
            if ( registerFormName.password.value != "" && registerFormName.confirm_password.value != ""){
                if(registerFormName.password.value!=registerFormName.confirm_password.value){
                    showLabelAlert( 'Not Matching', 'confirm_password' );
                    returnVal = false;
                }
            }
            
            if ( returnVal == true ) {
            
                jQuery.ajax( {
                    type: "POST",
                    url: "shen_ajax.php",
                    async: false,
                    data: {
                        "password": registerFormName.password.value,
                        "type": 'reset_password'
                    },
                    success: function ( responseData ) {
                        if ( responseData == 1 ) {
                            window.location = "index.php";
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
          <h2>Add Client</h2>
          <div class="block">
            <form name="registerForm" id="registerForm" autocomplete="off" method="POST" enctype="multipart/form-data">
              <table class="form">
                <tr>
                  <td><label>Enter Password</label> </td>
                  <td>
                      <input type="text" name="password" id="password" class = "mini" maxlength="150" onchange="return trim(this)">
                      <div id="alert_password" class="formError_msg inputError"></div>
                  </td>
                </tr>
                <tr>
                  <td><label>Confirm Password</label></td>
                  <td>
                    <input type="text" name="confirm_password" id="confirm_password" class = "mini" onchange="return trim(this)" maxlength="150" />
                    <div id="alert_confirm_password" class="error_msg inputError"></div>
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
