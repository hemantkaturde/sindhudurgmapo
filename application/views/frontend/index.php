<!DOCTYPE html>
<html lang="en">
	<head>
	    <!-- Meta tags and seo configuration -->
	    <?php include 'site_meta.php';?>
	    <!-- Top css library files -->
	    <?php include 'includes_top.php';?>
	</head>

	<body>
		<div id="page">
			<!-- Header -->
			<?php
			if ($page_name == 'home' || $page_name == '404')
				include 'header_home.php';
			else if ($page_name == 'listings' || $page_name == 'listing/create')
				include 'header_listing.php';
			else if ($page_name == 'directory_listing')
				include 'header_home.php';
			else
				include 'header.php';
			?>

			<!-- Main page -->
			<main>
				<?php include $page_name . '.php'; ?>
			</main>
			<!-- Site footer -->
			<?php
				if(!($page_name == 'listings' && $this->session->userdata('listings_view') == 'list_view')):
					include 'footer.php';
				endif;
			?>
		</div>

		<!-- Signin popup -->
		<?php include 'signin_popup.php';?>

		<!-- Back to top button -->
		<div id="toTop"></div>

		<!-- Bottom js library files -->
		<?php include 'includes_bottom.php';?>
		
		<!--modal-->
		<?php include 'modal.php'; ?>
		<?php
			if(get_frontend_settings('cookie_status') == 1):
				include 'eu-cookie.php';
			endif;
		?>
		<?php
			if(get_addon_details('fb_messenger') != 0){
				if(isset($listing_details['id'])):
					if(check_facebook_page_data($listing_details['id']) && $page_name == 'directory_listing'){
						include 'fb_messenger.php';
					}
				endif;
			}
		?>
	</body>
</html>


<!-- Load font awesome icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- The social media icon bar -->
<div class="icon-bar">
  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
  <a href="#" class="google"><i class="fa fa-google"></i></a>
  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
</div>


