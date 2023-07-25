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
            
            if ( registerFormName.business_client_name.value == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'business_client_name' );
                returnVal = false;
            }
            if ( registerFormName.contact_person.value == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'contact_person' );
                returnVal = false;
            }
            if ( registerFormName.client_email.value == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'client_email' );
                returnVal = false;
            }
            else if (registerFormName.client_email.value.indexOf("@", 0) < 0){
                showLabelAlert('<?php echo ALERT_EMP_EMAIL; ?>', 'client_email');
                returnVal= false;
            }
            else if (registerFormName.client_email.value.indexOf(".", 0) < 0){
                showLabelAlert('<?php echo ALERT_EMP_EMAIL; ?>', 'client_email');
                returnVal= false;
    
            }
            if ( registerFormName.client_contactno.value == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'client_contactno' );
                returnVal = false;
            }
            if ( registerFormName.alternate_contact_person.value != "" ) {
                if (registerFormName.alternate_client_email.value == ""){
                    showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'alternate_client_email' );
                    returnVal = false
                }else if (registerFormName.alternate_client_email.value.indexOf("@", 0) < 0){
                    showLabelAlert('<?php echo ALERT_EMP_EMAIL; ?>', 'alternate_client_email');
                    returnVal= false;
                }else if (registerFormName.alternate_client_email.value.indexOf(".", 0) < 0){
                    showLabelAlert('<?php echo ALERT_EMP_EMAIL; ?>', 'alternate_client_email');
                    returnVal= false;
                }
                if ( registerFormName.alternate_client_contactno.value == "" ) {
                    showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'alternate_client_contactno' );
                    returnVal = false;
                }
            }
			
			if ( registerFormName.state_code.value == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'state_code' );
                returnVal = false;
            }
            
            var content = tinymce.get("client_address").getContent();
            if ( content == "" ) {
                showLabelAlert( '<?php echo ALERT_REQUIRED; ?>', 'client_address' );
                returnVal = false;
            }
            
            if ( returnVal == true ) {
    
                jQuery.ajax( {
                    type: "POST",
                    url: "shen_ajax.php",
                    async: false,
                    data: {
                        "business_client_name": registerFormName.business_client_name.value,
                        "contact_person": registerFormName.contact_person.value,
                        "client_email": registerFormName.client_email.value,
                        "client_contactno": registerFormName.client_contactno.value,
                        "alternate_contact_person": registerFormName.alternate_contact_person.value,
                        "alternate_client_email": registerFormName.alternate_client_email.value,
                        "alternate_client_contactno": registerFormName.alternate_client_contactno.value,
                        "gstin": registerFormName.gstin.value,
                        "pan_no": registerFormName.pan_no.value,
                        "cin_no": registerFormName.cin_no.value,
						"state_code": registerFormName.state_code.value,
						"select_state": registerFormName.select_state.value,
                        "client_address": content,
                        "type": 'add_client'
                    },
                    success: function ( responseData ) {
                        if ( responseData == 1 ) {
                            window.location = "client_list.php";
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
              <td><label>Business / Client Name *</label>
              </td>
              <td><input type="text" name="business_client_name" id="business_client_name" class = "mini" maxlength="250" onchange="return trim(this)" style="text-transform:capitalize">
                <div id="alert_business_client_name" class="formError_msg inputError"></div></td>
            </tr>
            <tr>
              <td><label>Contact Person *</label></td>
              <td><input type="text" name="contact_person" id="contact_person" class = "mini" onchange="return trim(this)" maxlength="150" style="text-transform:capitalize" />
                <div id="alert_contact_person" class="error_msg inputError"></div></td>
            </tr>
            <tr>
              <td><label>Email ID *</label>
              </td>
              <td><input type="text" name="client_email" id="client_email" class = "mini" maxlength="250" onchange="return trim(this)">
                <div id="alert_client_email" class="formError_msg inputError"></div></td>
            </tr>
            <tr>
              <td><label>Contact No * </label></td>
              <td><input type="text" name="client_contactno" id="client_contactno" class = "mini" maxlength="20" onchange="return trim(this)" onkeypress="return numberHyphenOnly(event)">
                <div id="alert_client_contactno" class="formError_msg inputError"></div></td>
            </tr>
            <tr>
              <td><label>Alternate Contact Person</label>
              </td>
              <td><input type="text" name="alternate_contact_person" id="alternate_contact_person" class = "mini" maxlength="150" onchange="return trim(this)">
                <div id="alert_alternate_contact_person" class="formError_msg inputError"></div></td>
            </tr>
            <tr>
              <td><label>Alternate Email ID</label></td>
              <td><input type="text" name="alternate_client_email" id="alternate_client_email" class = "mini" maxlength="250" onchange="return trim(this)">
                <div id="alert_alternate_client_email" class="formError_msg inputError"></div></td>
            </tr>
            <tr>
              <td><label> Alternate Contact No</label>
              </td>
              <td><input type="text" name="alternate_client_contactno" id="alternate_client_contactno" class = "mini" maxlength="20" onchange="return trim(this)" onkeypress="return numberHyphenOnly(event)">
                <div id="alert_alternate_client_contactno" class="formError_msg inputError"></div></td>
            </tr>
            <tr>
              <td><label>GSTIN</label>
              </td>
              <td><input type="text" name="gstin" id="gstin" class = "mini" maxlength="50" onchange="return trim(this)" style="text-transform:uppercase" />
                <div id="alert_gstin" class="formError_msg inputError"></div></td>
            </tr>
            <tr>
              <td><label>PAN</label>
              </td>
              <td><input type="text" name="pan_no" id="pan_no" class = "mini" maxlength="50" onchange="return trim(this)" style="text-transform:uppercase" />
                <div id="alert_alternate_pan_no" class="formError_msg inputError"></div></td>
            </tr>
            <tr>
              <td><label>CIN</label>
              </td>
              <td><input type="text" name="cin_no" id="cin_no" class = "mini" maxlength="50" onchange="return trim(this)" style="text-transform:uppercase" />
                <div id="alert_cin_no" class="formError_msg inputError"></div></td>
            </tr>
            
            <tr>
              <td><label>State</label>
              </td>
              <td>
              <select id="select_state" name="select_state">
                  <option value="Andhra Pradesh">Andhra Pradesh</option>
                  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                  <option value="Assam">Assam</option>
                  <option value="Bihar">Bihar</option>
                  <option value="Chhattisgarh">Chhattisgarh</option>
                  <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                  <option value="Daman and Diu">Daman and Diu</option>
                  <option value="Delhi">Delhi</option>
                  <option value="Goa">Goa</option>
                  <option value="Gujarat">Gujarat</option>
                  <option value="Haryana">Haryana</option>
                  <option value="Himachal Pradesh">Himachal Pradesh</option>
                  <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                  <option value="Jharkhand">Jharkhand</option>
                  <option value="Karnataka">Karnataka</option>
                  <option value="Kerala">Kerala</option>
                  <option value="Madhya Pradesh">Madhya Pradesh</option>
                  <option value="Maharashtra">Maharashtra</option>
                  <option value="Manipur">Manipur</option>
                  <option value="Meghalaya">Meghalaya</option>
                  <option value="Mizoram">Mizoram</option>
                  <option value="Nagaland">Nagaland</option>
                  <option value="Orissa">Orissa</option>
                  <option value="Puducherry">Puducherry</option>
                  <option value="Punjab">Punjab</option>
                  <option value="Rajasthan">Rajasthan</option>
                  <option value="Sikkim">Sikkim</option>
                  <option value="Tamil Nadu">Tamil Nadu</option>
                  <option value="Telangana">Telangana</option>
                  <option value="Tripura">Tripura</option>
                  <option value="Uttar Pradesh">Uttar Pradesh</option>
                  <option value="Uttarakhand">Uttarakhand</option>
                  <option value="West Bengal">West Bengal</option>
                </select>
                <div id="alert_cin_no" class="formError_msg inputError"></div></td>
            </tr>
            <tr>
              <td><label>State Code *</label>
              </td>
              <td><input type="text" name="state_code" id="state_code" class = "mini" maxlength="20" onchange="return trim(this)" />
                <div id="alert_state_code" class="formError_msg inputError"></div></td>
            </tr>
            <tr>
              <td><label>Contact Address *</label></td>
              <td><textarea name="client_address" id="client_address" class="tinymce" onchange="return trim(this)"></textarea>
                <div id="alert_client_address" class="formError_msg inputError"></div></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="button" name="login_submit" id="login_submit" value="Submit" onClick="return regFormValidate();" class="btn"/>
                &nbsp;&nbsp;
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
</body></html>
