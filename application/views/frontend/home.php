
<style>
.addon_search_bar{
	background-color: #fff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    border-radius: 5px;
    margin-top: 10px;
    -webkit-box-shadow: 0px 0px 30px 0px rgb(0 0 0 / 30%);
    -moz-box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 0px 30px 0px rgb(0 0 0 / 30%);

}
.addon_search_bar input{

	border: 0;
    height: 50px;
    padding-left: 15px;
    border-right: 1px solid #d2d8dd;
    font-weight: 500;
}

.addon_search_bar select{

border: 0;
height: 50px;
padding-left: 15px;
border-right: 1px solid #d2d8dd;
font-weight: 500;
}



.addon_search_bar input[type='submit'] {
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    color: #fff;
    font-weight: 600;
    font-size: 14px;
    font-size: 0.875rem;
    border: 0;
    padding: 0 25px;
    height: 50px;
    cursor: pointer;
    outline: none;
    width: 100%;
    -webkit-border-radius: 0 3px 3px 0;
    -moz-border-radius: 0 3px 3px 0;
    -ms-border-radius: 0 3px 3px 0;
    border-radius: 0 3px 3px 0;
    background-color: #004dda;
    margin-right: -1px;
	height: 54px;
}

</style>


<section class="hero_single version_2" style="background: #222 url(<?php echo base_url('uploads/system/home_banner.jpg'); ?>) center center no-repeat; background-size: cover;">
	<div class="wrapper">
		<div class="container">
			<h3><?php echo get_frontend_settings('banner_title'); ?></h3>
			<p><?php echo get_frontend_settings('slogan'); ?></p>
			<form action="<?php echo site_url('home/search'); ?>" method="get">



                <div class="row no-gutters addon_search_bar">

                   <div class="col-lg-3 col-sm-12">
						<div class="form-group">
							<input class="form-control" type="text" name="search_string" placeholder="<?php echo get_phrase('what_are_you_looking_for'); ?>...">
							<i class="icon_search"></i>
							
						</div>
					</div>

					<div class="col-lg-2 col-sm-12 mb-1">
						<select class="wide" name="selected_category_id" id="selected_category_id" >
							<option value=""><?php echo get_phrase('All_categories'); ?></option>
							<?php
							$categories = $this->crud_model->get_categories()->result_array();
							foreach ($categories as $category):?>
								<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="col-lg-2 col-sm-12 mb-1">
						<select class="wide" name="selected_subcategory_id" id="selected_subcategory_id">
							<option value=""><?php echo get_phrase('All_subcategories'); ?></option>
						
						</select>

						<!-- <select id="mySelect"></select> -->
					</div>


					<div class="col-lg-2 col-sm-12 mb-1">
						<select class="wide" name="selected_taluka_id">
							<option value=""><?php echo get_phrase('All_Taluka'); ?> / <?php echo get_phrase('cites'); ?></option>
							<?php
							$taluka = $this->crud_model->get_cities()->result_array();
							foreach ($taluka as $taluka_value):?>
								<option value="<?php echo $taluka_value['id']; ?>"><?php echo $taluka_value['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="col-lg-2 col-sm-12 mb-1">
						<select class="wide" name="selected_city_id">
							<option value=""><?php echo get_phrase('village'); ?> / <?php echo get_phrase('area'); ?></option>
							<?php
							$cities = $this->crud_model->get_cities()->result_array();
							foreach ($cities as $city):?>
								<option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="col-lg-1 col-sm-12 ">
						<input  style="height: 54px;" type="submit" value="<?= get_phrase('search'); ?>">
					</div>
                </div>

				<!-- <div class="row no-gutters custom-search-input-2">
					<div class="col-lg-3 col-sm-12">
						<div class="form-group">
							<input class="form-control" type="text" name="search_string" placeholder="<?php echo get_phrase('what_are_you_looking_for'); ?>...">
							<i class="icon_search"></i>
							
						</div>
					</div>
					<div class="col-lg-2 col-sm-12 mb-1">
						<select class="wide" name="selected_category_id" id="selected_category_id" >
							<option value=""><?php echo get_phrase('All_categories'); ?></option>
							<?php
							$categories = $this->crud_model->get_categories()->result_array();
							foreach ($categories as $category):?>
								<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					
					<div class="col-lg-2 col-sm-12 mb-1">
						 <select class="wide" name="selected_subcategory_id" id="selected_subcategory_id">
							<option value=""><?php echo get_phrase('All_subcategories'); ?></option>
						
						</select>

						<select id="mySelect"></select>
					</div>

					<div class="col-lg-2 col-sm-12 mb-1">
						<select class="wide" name="selected_taluka_id">
							<option value=""><?php echo get_phrase('Taluka'); ?></option>
							<?php
							$taluka = $this->crud_model->get_taluka()->result_array();
							foreach ($taluka as $taluka):?>
								<option value="<?php echo $taluka['id']; ?>"><?php echo $taluka['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="col-lg-2 col-sm-12 mb-1">
						<select class="wide" name="selected_city_id">
							<option value=""><?php echo get_phrase('Location'); ?></option>
							<?php
							$cities = $this->crud_model->get_cities()->result_array();
							foreach ($cities as $city):?>
								<option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="col-lg-1 col-sm-12 ">
						<input  style="height: 54px;" type="submit" value="<?= get_phrase('search'); ?>">
					</div>
				</div> -->
				<!-- /row -->
			</form>
		</div>
	</div>
</section>
<!-- /hero_single -->

<div class="bg_color_1">
	<div class="container margin_80_55">
		<div class="main_title_2">
			<span><em></em></span>
			<h2><?php echo get_phrase('popular_categories'); ?></h2>
			<p><?php echo get_phrase('the_popular_categories_are_progressively_below'); ?>.</p>
		</div>
		<div class="row" id="home_category">
			<!-- Single Item of popular category starts -->
			<?php
			$this->db->order_by('name', 'asc');
			$this->db->limit(9);
			$categories = $this->db->get_where('category', array('parent' => 0))->result_array();
			foreach ($categories as $key => $category):?>
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo site_url('home/filter_listings?category='.slugify($category['name']).'&&amenity=&&video=0&&status=all'); ?>" class="grid_item">
					<figure>
						<img src="<?php echo base_url('uploads/category_thumbnails/').$category['thumbnail'];?>" alt="">
						<div class="info">
							<h3><?php echo $category['name']; ?></h3>
						</div>
					</figure>
				</a>
			</div>
			<?php endforeach; ?>
			<div class="col-12 text-center" id="home_category_loader" style="display: none; opacity: .5;">
				<img src="<?php echo base_url('assets/frontend/images/loader.gif'); ?>" width="50">
			</div>
			<!-- Single Item of popular category ends -->
			<?php $category_array_count = count($this->db->get_where('category', array('parent' => 0))->result_array()); ?>
			<?php if($category_array_count > 9): ?>
				<div class="col-12">
					<a href="javascript: void(0)" class="float-right btn_1 rounded" onclick="home_categories()"><?php echo get_phrase('view_all'); ?></a>
				</div>
			<?php endif; ?>
		</div>
	<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /bg_color_1 -->

<div class="container-fluid margin_80_55">
	<div class="main_title_2">
		<span><em></em></span>
		<h2><?php echo get_phrase('popular_listings'); ?></h2>
	</div>

	<div id="reccomended" class="owl-carousel owl-theme">
		<?php // $listing_number = 0; ?>
		<?php $listings = $this->frontend_model->get_top_ten_listings();

		

		// foreach ($listings as $key => $listing):
		// 	$package_id = has_package($listing['user_id']);
		// 	$total_listing = $this->db->get_where('package_purchased_history', array('id', $package_id))->row('number_of_listings');

		// 	$listings_2 = $this->db->get_where('listing', array('user_id' => $listing['user_id']));
		// 	foreach($listings_2 as $listing_2){
		// 		$listing_number++;
		// 		if($listing_number < $total_listing || $listing_number == $total_listing){
		// 			echo 'show, ';
		// 		}
		// 	}
		// endforeach;


		foreach ($listings as $key => $listing): ?>
		<div class="item">
			<div class="strip grid">
				<figure>

					<!--redirect to routs file-->
					<a href="<?php echo get_listing_url($listing['id']); ?>"><img src="<?php echo base_url('uploads/listing_thumbnails/'.$listing['listing_thumbnail']); ?>" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Read more</span></div></a>
					<small><?php echo $listing['listing_type'] == "" ? ucfirst(get_phrase('general')) : ucfirst(get_phrase($listing['listing_type'])) ; ?></small>
				</figure>
				<div class="wrapper">
					<h3>
						<a href="<?php echo get_listing_url($listing['id']); ?>" class="float-left"><?php echo $listing['name']; ?></a>
						<?php $claiming_status = $this->db->get_where('claimed_listing', array('listing_id' => $listing['id']))->row('status'); ?>
		                <?php if($claiming_status == 1): ?>
						        <img class="float-left ml-1" data-toggle="tooltip" title="<?php echo get_phrase('this_listing_is_verified'); ?>" src="<?php echo base_url('assets/frontend/images/verified.png'); ?>" style="width: 25px;">
						<?php endif; ?>
					</h3>
					<br>
					<p class="mt-1"><?php echo substr($listing['description'], 0, 100) . '...'; ?>.</p>
					<a class="address" href="http://maps.google.com/maps?q=<?php echo $listing['latitude']; ?>,<?php echo $listing['longitude']; ?>" target="_blank"><?php echo get_phrase('get_directions'); ?></a>
				</div>
				<ul>
					<!-- <li><span class="loc_open"><?php echo now_open($listing['id']); ?></span></li> -->
					<li><span class="<?php echo strtolower(now_open($listing['id'])) == 'closed' ? 'loc_closed' : 'loc_open'; ?>"><?php echo now_open($listing['id']); ?></span></li>
					<li><div class="score"><span>
						<?php
						if ($this->frontend_model->get_listing_wise_rating($listing['id']) > 0) {
							$quality = $this->frontend_model->get_rating_wise_quality($listing['id']);
							echo $quality['quality'];
						}else {
							echo get_phrase('unreviewed');
						}
						?>
						<em><?php echo count($this->frontend_model->get_listing_wise_review($listing['id'])).' '.get_phrase('reviews'); ?></em></span><strong><?php echo $this->frontend_model->get_listing_wise_rating($listing['id']); ?></strong></div></li>
					</ul>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<!-- /carousel -->
	<div class="container">
		<div class="btn_home_align"><a href="<?php echo site_url('home/listings'); ?>" class="btn_1 rounded"><?php echo get_phrase('view_all'); ?></a></div>
	</div>
	<!-- /container -->
</div>
<!-- /container -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.icon-bar {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  z-index: inherit;
}

.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

.icon-bar:before {
    content: '' !important;
}

.icon-bar a:hover {
  background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}

.insta {
  background:  #AA336A;
  color: white;
}

.pintraets{

 background: #90EE90;
  color: white;
}

.content {
  margin-left: 75px;
  font-size: 30px;
}
</style>
<div class="icon-bar d-none d-md-block">
  <a href="https://www.facebook.com/Sindhudurg-Mapodiary-103411165829582" class="facebook"  target="_blank"><i class="fa fa-facebook"></i></a> 
  <a href="https://twitter.com/SMapodiary" class="twitter"  target="_blank"><i class="fa fa-twitter"></i></a> 
  <a href="#" class="google"><i class="fa fa-google"></i></a> 
  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
  <a href="https://www.pinterest.com/SindhudurgMapodiary/" class="pintraets"  target="_blank"><i class="fa fa-pinterest"></i></a> 
  <a href="https://www.instagram.com/sindhudurgmapodiary17/" class="insta"  target="_blank"><i class="fa fa-instagram"></i></a> 
</div>



<!-- /container -->

<script>
	function home_categories(limitation){
		$('#home_category_loader').show();
		$.ajax({
			url: "<?php echo site_url('home/home_categories/'); ?>",
			success: function(response){
				$('#home_category_loader').hide();
				$('#home_category').html(response);

			}
		});
	}
</script>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



<script type='text/javascript'>


// var selectValues = {
//   "1": "test 1",
//   "2": "test 2"
// };
// var $mySelect = $('#mySelect');
// //
// $.each(selectValues, function(key, value) {
//   var $option = $("<option/>", {
//     value: key,
//     text: value
//   });
//   $mySelect.append($option);
// });






  var baseURL= "<?php echo base_url();?>";

  $(document).ready(function(){

	$('#selected_subcategory_id')
          .append($('<option>', { 'jemamt' : 'hmemme' })
          .text('ddd'));


 
		$('#selected_category_id').change(function(){
		var selected_category_id = $(this).val();

					// AJAX request
					$.ajax({
						url:'<?=base_url()?>admin/getSubcategoryDependant',
						method: 'post',
						data: {selected_category_id: selected_category_id},
						dataType: 'json',
						success: function(response){

						// Remove options 
						$('#selected_subcategory_id').find('option').not(':first').remove();
						//$('#sel_depart').find('option').not(':first').remove();

						// Add options
						$.each(response,function(index,data){		
							$('#selected_subcategory_id').append('<option value="'+data['id']+'">'+data['name']+'</option>');
						});
						}
					});
			});

  });


</script>




