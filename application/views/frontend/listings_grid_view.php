<style>
@media screen and (min-width: 999px) {
    .addon_search_bar{ background-color: #fff;
	
	} 
}

@media screen and (max-width: 999px) {
    .addon_search_bar{ background-color: transparent; display: none;} 
}
.addon_search_bar{
	/*background-color: #fff;*/
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
    /*border-right: 1px solid #d2d8dd;*/
    font-weight: 500;
}

.addon_search_bar select{
width:100%;
border: 0;
height: 50px;
/*padding-left: 15px;*/
/*border-right: 1px solid #d2d8dd;*/
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
.form-group
{
    margin-bottom:0;
}
/*.select2-container*/
/*{*/
/*    top:12px;*/
/*}*/
/*.select2-dropdown{ border:none; }*/
/*.select2-container--default .select2-selection--single*/
/*{*/
/*    border:none;*/
/*}*/
/*.select2-container--default .select2-selection--single .select2-selection__placeholder*/
/*{*/
/*    color:#000;*/
/*}*/
</style>
<?php
	$number_of_visible_categories = 10;
	$number_of_visible_amenities 	= 10;
	$number_of_visible_cities 		= 10;

	isset($category_ids) ? "" : $category_ids = array();
	isset($amenity_ids) ? "" 	: $amenity_ids = array();
	isset($city_id) ? "" 			: $city_id = 'all';
	isset($price_range) ? "" 			: $price_range = 0;
	isset($with_video) ? "" 	: $with_video = "";
	isset($with_open) ? "" 	: $with_open = "";
	isset($search_string) ? "": $search_string = "";
	isset($selected_category_id) ? "": $selected_category_id = "";
?>
<div id="results">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-10">
				<h4><strong><?php echo count($listings); ?></strong> <?php echo get_phrase('result_for_all'); ?></h4>
			</div>
			<div class="col-lg-9 col-md-8 col-2">
				<a href="#0" class="search_mob btn_search_mobile"></a> <!-- /open search panel -->
				<form action="<?php echo site_url('home/search'); ?>" method="GET">
		          <div class="row no-gutters addon_search_bar">
					 <div class="col-lg-3 col-sm-12 mb-1" style="border-right: 1px solid #d2d8dd;width:100%;background:#fff">
						<div class="form-group">
							<input class="" type="text" name="search_string" placeholder="<?php echo get_phrase('what_are_you_looking_for'); ?>..." style="border: none;margin-top: 7px;">
							<!--<i class="icon_search"></i>-->
						</div>
					</div>

					<div class="col-lg-2 col-sm-12 mb-1" style="border-right: 1px solid #d2d8dd;width:100%;background:#fff ">
						<div class="input-group select-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
							</span>
						    <select class="wide select-box" name="selected_category_id" id="selected_category_id" style="border: none;margin-top: 8px; font-size: 13px;">
							    <option value=""><?php echo get_phrase('All_categories'); ?></option>
								<?php
								   $categories = $this->crud_model->get_categories()->result_array();
								     foreach ($categories as $category):?>
									   <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
								<?php endforeach; ?>
						    </select>
						</div>
					</div>

					<div class="col-lg-2 col-sm-12 mb-1" style="border-right: 1px solid #d2d8dd;width:100%;background:#fff">
						<select class="wide" name="selected_subcategory_id" id="selected_subcategory_id" style="border: none;margin-top: 8px; font-size: 13px;">
							<option value=""><?php echo get_phrase('All_subcategories'); ?></option>
						</select>
				    </div>


					<div class="col-lg-2 col-sm-12 mb-1" style="border-right: 1px solid #d2d8dd;width:100%;background:#fff">
						<select class="wide" name="selected_taluka_id" id="selected_taluka_id" style="border: none;margin-top: 8px; font-size: 13px;" >
						    <option value="0"><?php echo get_phrase('all_taluka'); ?> / <?php echo get_phrase('cites'); ?></option>
							<?php
							  $taluka = $this->crud_model->get_cities()->result_array();
							  foreach ($taluka as $taluka_value):?>
								<option value="<?php echo $taluka_value['id']; ?>"><?php echo $taluka_value['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

			        <select class="col-lg-2 col-sm-12 mb-1"  name="selected_city_id" id="selected_city_id" style="border: none;font-size: 13px;margin-top: 7px;">
					     <option value="0"><?php echo get_phrase('all_village'); ?> / <?php echo get_phrase('area'); ?></option>
				    </select>

					<div class="col-lg-1 col-sm-12">
						<input type="submit" value="" style="padding: 13px;padding: 16px 48px 13px 20px;    border: none; background: #FFC107 url(<?php echo base_url()?>assets/frontend/images/search.svg) no-repeat center center;">
					</div>
				</div>
			   </div>
			 </form>
		   </div>
	    </div>
		<!-- /row -->
		<div class="search_mob_wp">
			<div class="custom-search-input-2" style="margin-left: 15px;margin-right: 15px;">
				<form action="<?php echo site_url('home/search'); ?>" method="GET">
				<div class="form-group">
					<input class="form-control" name = "search_string" type="text" placeholder="<?php echo get_phrase('what_are_you_looking_for') ?>...">
					<i class="icon_search"></i>
				</div>
				<select class="wide" name="selected_category_id">
					<option><?php echo get_phrase('all_categories'); ?></option>
					<?php $categories = $this->db->get('category')->result_array();
					foreach ($categories as $key => $category):?>
					<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
					<?php endforeach; ?>
				</select>

				
						<select class="wide" name="selected_subcategory_id" id="selected_subcategory_id" style="border: none;margin-top: 8px; font-size: 13px;">
							<option value=""><?php echo get_phrase('All_subcategories'); ?></option>
						</select>
				 


					
						<select class="wide" name="selected_taluka_id" id="selected_taluka_id" style="border: none;margin-top: 8px; font-size: 13px;" >
						    <option value="0"><?php echo get_phrase('all_taluka'); ?> / <?php echo get_phrase('cites'); ?></option>
							<?php
							  $taluka = $this->crud_model->get_cities()->result_array();
							  foreach ($taluka as $taluka_value):?>
								<option value="<?php echo $taluka_value['id']; ?>"><?php echo $taluka_value['name']; ?></option>
							<?php endforeach; ?>
						</select>
					

			        <select  class="wide"  name="selected_city_id" id="selected_city_id" style="border: none;font-size: 13px;margin-top: 7px;">
					     <option value="0"><?php echo get_phrase('all_village'); ?> / <?php echo get_phrase('area'); ?></option>
				    </select>
				<input type="submit" value="Search">
			</form>
			</div>
		</div>
		<!-- /search_mobile -->
	</div>
	<!-- /container -->
</div>
<!-- /results -->
<!-- /filters -->

<div class="filters_listing version_2  sticky_horizontal" style="display: contents;">
	<div class="container">
		<ul class="clearfix">
			<li class=" float-right">
				<div class="layout_view">
					<?php
						$active_listing_view = $this->session->userdata('listings_view');

						if($active_listing_view == 'list_view'){
							$color_list = 'text-success';
							$color_grid = null;
						}else{
							$color_grid = 'text-success';
							$color_list = null;
						}

					?>
					
					<a href="javascript::" id="grid_view" onclick="toggleListingView('grid_view')" class="<?php echo $color_grid; ?>"><i class="icon-th mr-1"></i><?php echo get_phrase('grid_view'); ?></a>
				</div>
			</li>
			<li class=" float-right mr-1">
				<div class="layout_view">
					<?php
						$active_listing_view = $this->session->userdata('listings_view');

						if($active_listing_view == 'list_view'){
							$color_list = 'text-success';
							$color_grid = null;
						}else{
							$color_grid = 'text-success';
							$color_list = null;
						}

					?>
					
					<a href="javascript::" id="list_view" onclick="toggleListingView('list_view')" class="<?php echo $color_list; ?>"><i class="icon-map mr-1"></i><?php echo get_phrase('map_view'); ?></a>
				</div>
			</li>
		</ul>
	</div>
	<!-- /container -->
</div>

<div class="collapse" id="collapseMap">

</div>
<!-- /Map -->

<div class="container-fluid margin_60_35">
	<div class="row justify-content-md-center">
		<aside class="col-lg-3 order-0" id="sidebar">
			<div id="filters_col">
				<a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><?php echo get_phrase('filters'); ?> </a>
				<!-- Filter form starts-->
				<form class="filter-form" action="" method="get" enctype="multipart/form-data">
					<div class="collapse show" id="collapseFilters">
						<div class="filter_type" style="display: grid">
							<h6><?php echo get_phrase(''); ?></h6>
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="">Category<b></b></a>
							 <a data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1" id="">Location<b></b></a>
							 <a data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2" id="">Opening Status<b></b></a>
							 <a data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3" id="">Media<b></b></a> 

							 <ul class="collapse" id="collapseExample">
							  <div class="container" id="dots">
                               <div class="accordion" id="accordionExample">
                                <?php
                                $i=1;
								 //$counter = 0;
								 $limit = 5;
								 $this->db->limit($limit);
								 $categories = $this->db->get_where('category', array('parent' => 0))->result_array();
					
								foreach ($categories as $key => $category):
										$active='';
										if($i=='0') {
											$active='active';
										}
									?>
							<div class="card">
							   <div class="card-head" id="headingOne">
								   <h2 class="mb-0 " data-toggle="collapse" data-target="#collapseOne<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne<?php echo $i;?>">
										<li class="" style="list-style: none;">
											<label class="container_check"> <i class="<?php echo $category['icon_class']; ?>"></i> <?php echo $category['name']; ?> <small></small>
												<input type="checkbox" name="category[]" class="categories" value="<?php echo $category['slug']; ?>" onclick="filter(this, '<?php echo 'parent_id'.$category['id'] ?>')" <?php if(in_array($category['id'], $category_ids)) echo 'checked'; ?>>
												<span class="checkmark"></span>
											</label>
										</li>
								   </h2>
							    </div>

							    <div id="collapseOne<?php echo $i;?>" class="<?php if($i == 0){ echo 'collapsed show'; }else{ echo 'collapse'; } ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
								 <div class="card-body">
								        <?php foreach ($this->crud_model->get_sub_categories($category['id'])->result_array() as $sub_category):
										$counter++;?>
																	
										<li class="ml-3" style="list-style: none;">
											<label class="container_check"> <?php echo $sub_category['name']; ?> <small></small>
												<input type="checkbox" name="category[]" class="categories <?php echo 'parent_id'.$category['id'] ?>" value="<?php echo $sub_category['slug']; ?>" onclick="filter(this)" <?php if(in_array($sub_category['id'], $category_ids)) echo 'checked'; ?>>
												<span class="checkmark"></span>
											</label>
										</li>
								       <?php endforeach; ?>
								  </div>
							    </div>
						    </div>
						   <?php 
						    $i++;
                           endforeach; ?>
                         </div>
                      </div>

                     <a href="javascript: void(0)" onclick="myFunction()" id="myBtn"><?php echo get_phrase('Show More'); ?></a>

						<div class="container" id="more">
						  <div class="accordion" id="accordionExample">
							<?php
							     $i=1;
								 $categories = $this->db->get('category')->result_array();
								foreach ($categories as $key => $category):
									if($category['parent'] > 0)
										continue;
										$counter++;
										$active='';
                        
										if($i=='0') {
											$active='active';
										}
										
									?>
									<div class="card">
										<div class="card-head" id="headingOne">
										<h2 class="mb-0 " data-toggle="collapse" data-target="#collapseOne<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne<?php echo $i;?>">
											<li class="" style="list-style: none;">
												<label class="container_check"> <i class="<?php echo $category['icon_class']; ?>"></i> <?php echo $category['name']; ?> <small></small>
													<input type="checkbox" name="category[]" class="categories" value="<?php echo $category['slug']; ?>" onclick="filter(this, '<?php echo 'parent_id'.$category['id'] ?>')" <?php if(in_array($category['id'], $category_ids)) echo 'checked'; ?>>
													<span class="checkmark"></span>
												</label>
											</li>
											
										</h2>
									</div>

									<div id="collapseOne<?php echo $i;?>" class="<?php if($i == 0){ echo 'collapsed show'; }else{ echo 'collapse'; } ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body">
										<?php foreach ($this->crud_model->get_sub_categories($category['id'])->result_array() as $sub_category):
											   $counter++; ?>					
											<li class="ml-3" style="list-style: none;">
												<label class="container_check"> <?php echo $sub_category['name']; ?> <small></small>
													<input type="checkbox" name="category[]" class="categories <?php echo 'parent_id'.$category['id'] ?>" value="<?php echo $sub_category['slug']; ?>" onclick="filter(this)" <?php if(in_array($sub_category['id'], $category_ids)) echo 'checked'; ?>>
													<span class="checkmark"></span>
												</label>
											</li>
										<?php endforeach; ?>
									   </div>
								    </div>
								   </div>
								    <?php 
									$i++;
									 endforeach; ?>
								 </div>
								</div>
							 </ul><br>
              <!-------------------- second tab start ============================ -->
			  <ul class="collapse" id="collapseExample1">

                         <div class="container" id="dotss">
                               <div class="accordion" id="accordionExample">
                                <?php
                                $i=1;
							
							      $cities = $this->crud_model->get_cities()->result_array();
					
							      foreach ($cities as $city):
										$active='';
										if($i=='0') {
											$active='active';
										}
									?>
							<div class="card">
							   <div class="card-head" id="headingOne">
								   <h2 class="mb-0 " data-toggle="collapse" data-target="#collapseOne<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne<?php echo $i;?>">
										<li class="" style="list-style: none;">
											<label class="container_check"> <i class="<?php echo $city['icon_class']; ?>"></i> <?php echo $city['name']; ?> <small></small>
												<input type="checkbox" name="city[]" class="categories" value="<?php echo $city['slug']; ?>" onclick="filter(this, '<?php echo 'parent_id'.$city['id'] ?>')" <?php if(in_array($city['id'], $city_id)) echo 'checked'; ?>>
												<span class="checkmark"></span>
											</label>
										</li>
								   </h2>
							    </div>

							    <div id="collapseOne<?php echo $i;?>" class="<?php if($i == 0){ echo 'collapsed show'; }else{ echo 'collapse'; } ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
								 <div class="card-body">
								        <?php foreach ($this->crud_model->get_village_by_city_id($city['id'])->result_array() as $sub_village):
										$counter++;?>
																	
										<li class="ml-3" style="list-style: none;">
											<label class="container_check"> <?php echo $sub_village['name']; ?> <small></small>
												<input type="checkbox" name="city[]" class="categories <?php echo 'parent_id'.$city['id'] ?>" value="<?php echo $sub_village['slug']; ?>" onclick="filter(this)" <?php if(in_array($sub_village['id'], $city_id)) echo 'checked'; ?>>
												<span class="checkmark"></span>
											</label>
										</li>
								       <?php endforeach; ?>
								  </div>
							    </div>
						    </div>
						   <?php 
						    $i++;
                           endforeach; ?>
                         </div>
                      </div>
					  </ul><br>


     <!------------------- second tab end ============================ -->


	<!-------------------- third tab start ============================ -->

			<ul class="collapse" id="collapseExample2">

				<li class="ml-3" style="list-style: none;">
					<label class="container_check">Open Now<small></small>
						<input type="checkbox" name="category" class="categories" value=""  >
						<span class="checkmark"></span>
					</label>
				</li>
				<li class="ml-3" style="list-style: none;">
					<label class="container_check">Closed Now<small></small>
						<input type="checkbox" name="category" class="categories" value=""  >
						<span class="checkmark"></span>
					</label>
				</li>
			</ul><br>

	<!-------------------- third tab end ============================ -->

	<!-------------------- forth tab start ============================ -->

		<ul class="collapse" id="collapseExample3">

		  <li class="ml-3" style="list-style: none;">
			<label class="container_check">Video <small></small>
				<input type="checkbox" name="category" class="categories" value=""  >
				<span class="checkmark"></span>
			</label>
		  </li>
		  <li class="ml-3" style="list-style: none;">
			<label class="container_check">Photo <small></small>
				<input type="checkbox" name="category" class="categories" value=""  >
				<span class="checkmark"></span>
			</label>
		  </li>
		  <li class="ml-3" style="list-style: none;">
			<label class="container_check">Contact No. <small></small>
				<input type="checkbox" name="category" class="categories" value=""  >
				<span class="checkmark"></span>
			</label>
		  </li>
		  <li class="ml-3" style="list-style: none;">
			<label class="container_check">Address <small></small>
				<input type="checkbox" name="category" class="categories" value=""  >
				<span class="checkmark"></span>
			</label>
		  </li>
		  <li class="ml-3" style="list-style: none;">
			<label class="container_check">Website <small></small>
				<input type="checkbox" name="category" class="categories" value=""  >
				<span class="checkmark"></span>
			</label>
		  </li>
		  </ul><br>
	  <!-------------------- forth tab end ============================ -->

						</div>

					
					</div>
					<!--/collapse -->
				</form>
				<!-- filter form ends -->
			</div>
			<!--/filters col-->
		</aside>
		<!-- /aside -->

		<div class="col-lg-6 col-md-12 order-lg-1 order-2" id="listings">

			<div class="row">
               <?php if(!empty($listings )) {?>
				<?php
				foreach($listings as $listing){
					if(!has_package($listing['user_id']) > 0)
						continue; ?>

					<?php
						// $active_package = has_package($listing['user_id']);
						// $listing_allowed_number = $this->db->get_where('package_purchased_history', array('id', $active_package))->row('number_of_listings');
						// $listings_2 = $this->db->get_where('listing', array('user_id' => $listing['user_id']));

					?>



				<!-- A Single Listing Starts-->
				<div class="col-lg-6 col-md-6 listing-div " data-marker-id="<?php echo $listing['code']; ?>" id = "<?php echo $listing['code']; ?>">

					<div class="strip grid <?php if($listing['is_featured'] == 1) echo 'featured-tag-border'; ?>">
						<figure>
							
							<a href="javascript::" class="wishlist-icon" onclick="addToWishList(this, '<?php echo $listing['id']; ?>')">
								<i class=" <?php echo is_wishlisted($listing['id']) ? 'fas fa-heart' : 'far fa-heart'; ?> "></i>
							</a>
							<?php if($listing['is_featured'] == 1){ ?>
								<a href="javascript::" class="featured-tag-grid"><?php echo get_phrase('featured'); ?></a>
							<?php } ?>
							<a href="<?php echo get_listing_url($listing['id']); ?>"  id = "listing-banner-image-for-<?php echo $listing['code']; ?>"  class="d-block h-100 img" style="background-image:url('<?php echo base_url('uploads/listing_thumbnails/'.$listing['listing_thumbnail']); ?>')">
								<!-- <img src="<?php echo base_url('uploads/listing_thumbnails/'.$listing['listing_thumbnail']); ?>" class="img-fluid" alt=""> -->
								<div class="read_more"><span><?php echo get_phrase('watch_details'); ?></span></div>
							</a>
							<!-- <small><?php //echo $listing['listing_type'] == "" ? ucfirst(get_phrase('general')) : ucfirst(get_phrase($listing['listing_type'])) ; ?></small> -->
						</figure>
						<div class="wrapper <?php if($listing['is_featured'] == 1) echo 'featured-body'; ?>">
							<h3 class="ellipsis">
								<a href="<?php echo get_listing_url($listing['id']); ?>"><?php echo $listing['name']; ?></a>
								<?php $claiming_status = $this->db->get_where('claimed_listing', array('listing_id' => $listing['id']))->row('status'); ?>
				                <?php if($claiming_status == 1): ?>
									<span class="claimed_icon" data-toggle="tooltip" title="<?php echo get_phrase('this_listing_is_verified'); ?>">
					                	<img src="<?php echo base_url('assets/frontend/images/verified.png'); ?>" width="23" />
					                </span>
								<?php endif; ?>
							</h3>
							<small>
								<?php
									$city 	 = $this->db->get_where('city', array('id' =>  $listing['city_id']))->row_array();
									$country = $this->db->get_where('country', array('id' =>  $listing['country_id']))->row_array();
									echo $city['name'].', '.$country['name'];
								?>
							</small>
							<p class="ellipsis">
								<?php echo $listing['description']; ?>
							</p>
							<?php if ($listing['latitude'] != "" && $listing['longitude'] != ""): ?>
								<a class="address" href="http://maps.google.com/maps?q=<?php echo $listing['latitude']; ?>,<?php echo $listing['longitude']; ?>" target="_blank"><?php echo get_phrase('show_on_map'); ?></a>
									<!-- <a class="address" href="javascript:" button-direction-id = "<?php //echo $listing['code']; ?>" target=""><?php //echo get_phrase('show_on_map'); ?></a> -->
							<?php endif; ?>

						</div>
						<ul class="<?php if($listing['is_featured'] == 1) echo 'featured-footer'; ?> mb-0">

							<?php $opening_status = get_now_open($listing['id']); ?>
							<li><span class="<?php echo $opening_status == 'closed' ? 'loc_closed' : 'loc_open'; ?>"><?php echo get_phrase($opening_status); ?></span></li>
							<li>
								<!-- <div class="score">
									<span>
										<?php
				            if ($this->frontend_model->get_listing_wise_rating($listing['id']) > 0) {
				              $quality = $this->frontend_model->get_rating_wise_quality($listing['id']);
				              echo $quality['quality'];
				            }else {
											echo get_phrase('unreviewed');
										}
				            ?>
										<em>
											<?php echo count($this->frontend_model->get_listing_wise_review($listing['id'])).' '.get_phrase('reviews'); ?>
										</em>
									</span>
									<strong><?php echo $this->frontend_model->get_listing_wise_rating($listing['id']); ?></strong></div> -->
							</li>
						</ul>
					</div>
				</div>
				<!-- A Single Listing Ends-->
				<?php } ?>
			<?php } else { ?>
                <div> <h3 style="margin-left: 51px; color: #ee0b46;">  No Record Found..   </h3></div>
			<?php  }	?>

			</div>

			<!-- custom pagination -->
			<?php if(isset($pagination) && isset($total_page_number) && $pagination == 'search_page'): ?>
				<nav class="text-center" aria-label="Page navigation example">
				  <ul class="pagination justify-content-center">
				  	<li class=""><a class="page-link" href="<?php echo site_url('home/search/1?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo strtolower(get_phrase('first')); ?></a></li>
				  	<?php
				  		
			  			if($total_page_number <= 6){
			  				for($i=1; $i <= $total_page_number;  $i++){
			  					?>
			  					<li class=""><a class="page-link <?php if($active_page_number == $i) { echo 'active'; } ?>" href="<?php echo site_url('home/search/'.$i.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo $i; ?></a></li>
			  				<?php }
			  			}else{
			  				if($active_page_number-3 >= 1 && $active_page_number+3 <= $total_page_number){
			  					$start_i = $active_page_number - 3;
			  					$end_i = $active_page_number + 3;
			  					for($start_i; $start_i <= $end_i;  $start_i++){
			  					?>
			  						<li class=""><a class="page-link <?php if($active_page_number == $start_i) { echo 'active'; } ?>" href="<?php echo site_url('home/search/'.$start_i.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo $start_i; ?></a></li>
			  					<?php }
			  				}elseif($active_page_number <= 3 && $total_page_number >=6){
			  				    $start_i = 1;
			  					$end_i = 6;
			  					for($start_i; $start_i <= $end_i;  $start_i++){
			  					?>
			  						<li class=""><a class="page-link <?php if($active_page_number == $start_i) { echo 'active'; } ?>" href="<?php echo site_url('home/search/'.$start_i.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo $start_i; ?></a></li>
			  					<?php }
			  				}else{
			  				    
			  					$it= $total_page_number-6;
			  					for($it; $it <= $total_page_number;  $it++){
			  					?>
			  						<li class=""><a class="page-link <?php if($active_page_number == $it) { echo 'active'; } ?>" href="<?php echo site_url('home/search/'.$it.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo $it; ?></a></li>
			  					<?php }
			  				}
			  			}
				  	?>
				  	<?php if($total_page_number > 6): ?>
				    	<li class=""><a class="page-link" href="<?php echo site_url('home/search/'.$total_page_number.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo strtolower(get_phrase('last')); ?></a></li>
				    <?php endif; ?>
				  </ul>
				</nav>
			<?php elseif(isset($pagination) && isset($total_page_number) && $pagination == 'filter_page'): ?>
				<nav class="text-center" aria-label="Page navigation example">
				  <ul class="pagination justify-content-center">
				  	<li class=""><a class="page-link" href="<?php echo site_url('home/filter_listings/1?category='.$_GET['category'].'&amenity='.$_GET['amenity'].'&city='.$_GET['city'].'&price-range='.$_GET['price-range'].'&video='.$_GET['video'].'&status='.$_GET['status']); ?>"><?php echo strtolower(get_phrase('first')); ?></a></li>
				  	<?php
				  		
			  			if($total_page_number <= 6){
			  				for($i=1; $i <= $total_page_number;  $i++){
			  					?>
			  					<li class=""><a class="page-link <?php if($active_page_number == $i) { echo 'active'; } ?>" href="<?php echo site_url('home/filter_listings/'.$i.'?'.$_SERVER['QUERY_STRING']); ?>"><?php echo $i; ?></a></li>
			  				<?php }
			  			}else{
			  				if($active_page_number-3 >= 1 && $active_page_number+3 <= $total_page_number){
			  					$start_i = $active_page_number - 3;
			  					$end_i = $active_page_number + 3;
			  					for($start_i; $start_i <= $end_i;  $start_i++){
			  					?>
			  						<li class=""><a class="page-link <?php if($active_page_number == $start_i) { echo 'active'; } ?>" href="<?php echo site_url('home/filter_listings/'.$start_i.'?'.$_SERVER['QUERY_STRING']); ?>"><?php echo $start_i; ?></a></li>
			  					<?php }
			  				}elseif($active_page_number <= 3 && $total_page_number >=6){
			  				    $start_i = 1;
			  					$end_i = 6;
			  					for($start_i; $start_i <= $end_i;  $start_i++){
			  					?>
			  						<li class=""><a class="page-link <?php if($active_page_number == $start_i) { echo 'active'; } ?>" href="<?php echo site_url('home/filter_listings/'.$start_i.'?'.$_SERVER['QUERY_STRING']); ?>"><?php echo $start_i; ?></a></li>
			  					<?php }
			  				}else{
			  				    
			  					$it= $total_page_number-6;
			  					for($it; $it <= $total_page_number;  $it++){
			  					?>
			  						<li class=""><a class="page-link <?php if($active_page_number == $it) { echo 'active'; } ?>" href="<?php echo site_url('home/filter_listings/'.$it.'?'.$_SERVER['QUERY_STRING']); ?>"><?php echo $it; ?></a></li>
			  					<?php }
			  				}
			  			}
				  	?>

				  	<?php if($total_page_number > 6): ?>
				    	<li class=""><a class="page-link" href="<?php echo site_url('home/search/'.$total_page_number.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo strtolower(get_phrase('last')); ?></a></li>
				    <?php endif; ?>
				  </ul>
				</nav>
			<?php endif; ?>
			<!-- custom pagination end-->

			<nav class="text-center">
				<?php echo $this->pagination->create_links(); ?>
			</nav>
		</div>



		<!-- /col -->
		<div class="col-lg-3 order-lg-2 order-1 hideinMob" >
			<div class="stiky-map mb-5 mb-lg-0">
				<div id="map" class="map-full map-layout"></div>
			</div>
		</div>
	</div>
</div>
<!-- /container -->
<script type="text/javascript">
	function filter(elem, sub_class) {

		if(sub_class && $(elem).prop('checked') == true){
			$('.'+sub_class).prop('checked', true);
		}else{
			$('.'+sub_class).prop('checked', false);
		}


		var urlPrefix 	= '<?php echo site_url('home/filter_listings?'); ?>'
		var urlSuffix = "";
		var slectedCategories = "";
		var selectedAmenities = "";
		var selectedCity = "";
		var selectedVideoAvailability = 0;
		var selectedPriceRange = 0;
		var selectedOpeningStatus = "all";

		$('.categories:checked').each(function() {
			(slectedCategories === "") ? slectedCategories = $(this).attr('value') : slectedCategories = slectedCategories + "--" + $(this).attr('value');
		});

		$('.amenities:checked').each(function() {
			(selectedAmenities === "") ? selectedAmenities = $(this).attr('value') : selectedAmenities = selectedAmenities + "--" + $(this).attr('value');
		});

		$('.city:checked').each(function() {
			(selectedCity === "") ? selectedCity = $(this).attr('value') : selectedCity = selectedCity + "--" + $(this).attr('value');
		});

		$('.video_availability:checked').each(function() {
			(selectedVideoAvailability === 0) ? selectedVideoAvailability = $(this).attr('value') : selectedVideoAvailability = selectedVideoAvailability + "--" + $(this).attr('value');
		});
		$('.openingStatus:checked').each(function() {
			(selectedOpeningStatus === 'all') ? selectedOpeningStatus = $(this).attr('value') : selectedOpeningStatus = $(this).attr('value');
		});


		selectedPriceRange = $('.price-range').val();
		urlSuffix = "category="+slectedCategories+"&&amenity="+selectedAmenities+"&&city="+selectedCity+"&&price-range="+selectedPriceRange+"&&video="+selectedVideoAvailability+"&&status="+selectedOpeningStatus;
		window.location.replace(urlPrefix+urlSuffix);
	}

	function addToWishList(elem, listing_id) {
		var isLoggedIn = '<?php echo $this->session->userdata('is_logged_in'); ?>';
		if (isLoggedIn === '1') {
			$.ajax({
				type : 'POST',
				url : '<?php echo site_url('home/add_to_wishlist'); ?>',
				data : {listing_id : listing_id},
				success : function(response) {
					if (response == 'added') {
						$(elem).html('<i class="fas fa-heart"></i>');
						toastr.success('<?php echo get_phrase('added_to_wishlist'); ?>');
					}else {
						$(elem).html('<i class="far fa-heart"></i>');
						toastr.success('<?php echo get_phrase('removed_from_the_wishlist'); ?>');
					}
				}
			});
		}else {
			loginAlert();
		}
	}


	function showToggle(elem, selector) {
		$('.'+selector).slideToggle();
		console.log($(elem).text());
		if($(elem).text() === "<?php echo get_phrase('show_more'); ?>")
    {
        $(elem).text('<?php echo get_phrase('show_less'); ?>');
    }
    else
    {
        $(elem).text('<?php echo get_phrase('show_more'); ?>');
    }
	}
</script>

<!-- This map-category.php file has all the fucntions for showing the map, marker, map info and all the popup markups -->
<?php include 'assets/frontend/js/map/map-category.php'; ?>

<!-- This script is needed for providing the json file which has all the listing points and required information -->
<style>
.accordion {
  margin-top: 40px;
}
.accordion .card {
  border: none;
  margin-bottom: 20px;
}
.accordion .card h2 {
  background: url(https://cdn0.iconfinder.com/data/icons/entypo/91/arrow56-512.png) no-repeat calc(100% - 10px) center;
  background-size: 20px;
  cursor: pointer;
  font-size: 18px;
}
.accordion .card h2.collapsed {
  background-image: url(https://cdn0.iconfinder.com/data/icons/arrows-android-l-lollipop-icon-pack/24/expand2-256.png);
}
.accordion .card-body {
  padding-left: 0;
  padding-right: 0;
}


#more {display: none;}


	</style>
<script>
	function toggleListingView(type) {
		$.ajax({
			url:'<?php echo site_url('home/listings_view/'); ?>'+type,
			success: function(response){
				location.reload();
			}
		});
	}

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Show More"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Show Less"; 
    moreText.style.display = "inline";
  }
}

	var baseURL= "<?php echo base_url();?>";

$(document).ready(function(){

  // $('#selected_subcategory_id').append($('<option>', { 'jemamt' : 'hmemme' }).text('ddd'));

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

	$('#selected_taluka_id').change(function(){
		      var selected_taluka_id = $(this).val();

					// AJAX request
					$.ajax({
						url:'<?=base_url()?>admin/getVillageareaDependant',
						method: 'post',
						data: {selected_taluka_id: selected_taluka_id},
						dataType: 'json',
						success: function(response){

						// Remove options 
						$('#selected_city_id').find('option').not(':first').remove();
						//$('#sel_depart').find('option').not(':first').remove();

						// Add options
						$.each(response,function(index,data){		
							$('#selected_city_id').append('<option value="'+data['id']+'">'+data['name']+'</option>');
						});
						}
					});
			});
</script>
<style>
     @media (min-width: 287px) and (max-width: 900px){
      .hideinMob{display:none;}  
    }
</style>