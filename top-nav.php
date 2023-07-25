<div class="grid_12 header-repeat">
    <div id="branding">
      <div class="floatleft"> Sri Shendhuren Electro Plating</div>
      <div class="floatright"><?php /*?>
        <div class="floatleft"> <img src="img/img-profile.jpg" alt="Profile Pic" /></div><?php */?>
        <div class="floatleft marginleft10">
          <ul class="inline-ul floatleft">
            <li>Hello 	<?php 
						$select_users = "select * from user_info where id = '" . $_SESSION['user_id'] . "'";
						$result_user = mysqli_query( $conn, $select_users );
						$fetch_results = mysqli_fetch_array( $result_user ); ?>
					    <?php echo $fetch_results['username']; ?></li>
            <li><a href="logout.php">Logout</a></li>
          </ul> </div>
      </div>
      <div class="clear"> </div>
    </div>
  </div>