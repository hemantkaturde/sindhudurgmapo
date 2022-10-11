<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
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
                    <div class="row no-gutters custom-search-input-2 inner">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input class="form-control" name="search_string" type="text"
                                    value="<?php echo $search_string; ?>"
                                    placeholder="<?php echo get_phrase('what_are_you_looking_for'); ?>...">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                        <div class="col">
                            <select class="wide" name="selected_category_id">
                                <option value=""><?php echo get_phrase('all_categories'); ?></option>
                                <?php
								$categories = $this->crud_model->get_categories()->result_array();
								foreach ($categories as $category):?>
                                <option value="<?php echo $category['id']; ?>"
                                    <?php if($selected_category_id == $category['id']) echo 'selected'; ?>>
                                    <?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">

                            <select class="wide" name="selected_subcategory_id">
                                <option value=""><?php echo get_phrase('All_subcategories'); ?></option>
                                <?php
							$categories = $this->crud_model->get_sub_categories()->result_array();
							foreach ($categories as $category):?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">

                            <select class="wide" name="selected_taluka_id">
                                <option value=""><?php echo get_phrase('Taluka'); ?></option>
                                <?php
							$taluka = $this->crud_model->get_taluka()->result_array();
							foreach ($taluka as $taluka):?>
                                <option value="<?php echo $taluka['id']; ?>"><?php echo $taluka['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">

                            <select class="wide" name="selected_city_id">
                                <option value=""><?php echo get_phrase('Location'); ?></option>
                                <?php
							$cities = $this->crud_model->get_cities()->result_array();
							foreach ($cities as $city):?>
                                <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col">
                            <input type="submit" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /row -->
        <div class="search_mob_wp">
            <div class="custom-search-input-2">
                <form action="<?php echo site_url('home/search'); ?>" method="GET">
                    <div class="form-group">
                        <input class="form-control" name="search_string" type="text"
                            placeholder="<?php echo get_phrase('what_are_you_looking_for') ?>...">
                        <i class="icon_search"></i>
                    </div>
                    <select class="wide" name="selected_category_id">
                        <option><?php echo get_phrase('all_categories'); ?></option>
                        <?php $categories = $this->db->get('category')->result_array();
					foreach ($categories as $key => $category):?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
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

<div class="filters_listing version_2  sticky_horizontal">
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

                    <a href="javascript::" id="grid_view" onclick="toggleListingView('grid_view')"
                        class="<?php echo $color_grid; ?>"><i
                            class="icon-th mr-1"></i><?php echo get_phrase('grid_view'); ?></a>
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

                    <a href="javascript::" id="list_view" onclick="toggleListingView('list_view')"
                        class="<?php echo $color_list; ?>"><i
                            class="icon-map mr-1"></i><?php echo get_phrase('map_view'); ?></a>
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
                <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters"
                    id="filters_col_bt"><?php echo get_phrase('filters'); ?> </a>
                <!-- Filter form starts-->
                <form class="filter-form" action="" method="get" enctype="multipart/form-data">
                    <div class="collapse show" id="collapseFilters">
                        <div class="filter_type">
                            <h6><?php echo get_phrase(''); ?></h6>
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample" id="">Category<b></b></a>
                            <ul class="collapse" id="collapseExample">

                                <div class="container" id="dots">
                                    <div class="accordion" id="accordionExample">
                                        <?php
  $i=1;
								 //$counter = 0;
								 $limit = 5;
								 $this->db->limit($limit);
								 $categories = $this->db->get_where('category', array('parent' => 0))->result_array();
								// $categories = $this->db->get('category')->result_array();
								foreach ($categories as $key => $category):
								//	if($category['parent'] > 0)
										//continue;
										//$counter++;

										$active='';
                        
										if($i=='0') {
											$active='active';
										}

										
									?>
                                        <div class="card">
                                            <div class="card-head" id="headingOne">
                                                <h2 class="mb-0 " data-toggle="collapse"
                                                    data-target="#collapseOne<?php echo $i;?>" aria-expanded="true"
                                                    aria-controls="collapseOne<?php echo $i;?>">

                                                    <li class="" style="list-style: none;">
                                                        <label class="container_check"> <i
                                                                class="<?php echo $category['icon_class']; ?>"></i>
                                                            <?php echo $category['name']; ?> <small></small>
                                                            <input type="checkbox" name="category[]" class="categories"
                                                                value="<?php echo $category['slug']; ?>"
                                                                onclick="filter(this, '<?php echo 'parent_id'.$category['id'] ?>')"
                                                                <?php if(in_array($category['id'], $category_ids)) echo 'checked'; ?>>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </li>

                                                </h2>
                                            </div>

                                            <div id="collapseOne<?php echo $i;?>"
                                                class="<?php if($i == 0){ echo 'collapsed show'; }else{ echo 'collapse'; } ?>"
                                                aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <?php foreach ($this->crud_model->get_sub_categories($category['id'])->result_array() as $sub_category):
											$counter++;
										?>
                                                    <li class="ml-3" style="list-style: none;">
                                                        <label class="container_check">
                                                            <?php echo $sub_category['name']; ?> <small></small>
                                                            <input type="checkbox" name="category[]"
                                                                class="categories <?php echo 'parent_id'.$category['id'] ?>"
                                                                value="<?php echo $sub_category['slug']; ?>"
                                                                onclick="filter(this)"
                                                                <?php if(in_array($sub_category['id'], $category_ids)) echo 'checked'; ?>>
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
                                <a href="javascript: void(0)" onclick="myFunction()"
                                    id="myBtn"><?php echo get_phrase('Show More'); ?></a>

                                <div class="container" id="more">
                                    <div class="accordion" id="accordionExample">
                                        <?php
  $i=1;
								 //$counter = 0;
								 //$limit = 5;
								 //$this->db->limit($limit);
								 //$categories = $this->db->get_where('category', array('parent' => 0))->result_array();
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
                                                <h2 class="mb-0 " data-toggle="collapse"
                                                    data-target="#collapseOne<?php echo $i;?>" aria-expanded="true"
                                                    aria-controls="collapseOne<?php echo $i;?>">

                                                    <li class="" style="list-style: none;">
                                                        <label class="container_check"> <i
                                                                class="<?php echo $category['icon_class']; ?>"></i>
                                                            <?php echo $category['name']; ?> <small></small>
                                                            <input type="checkbox" name="category[]" class="categories"
                                                                value="<?php echo $category['slug']; ?>"
                                                                onclick="filter(this, '<?php echo 'parent_id'.$category['id'] ?>')"
                                                                <?php if(in_array($category['id'], $category_ids)) echo 'checked'; ?>>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </li>

                                                </h2>
                                            </div>

                                            <div id="collapseOne<?php echo $i;?>"
                                                class="<?php if($i == 0){ echo 'collapsed show'; }else{ echo 'collapse'; } ?>"
                                                aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <?php foreach ($this->crud_model->get_sub_categories($category['id'])->result_array() as $sub_category):
											$counter++;
										?>
                                                    <li class="ml-3" style="list-style: none;">
                                                        <label class="container_check">
                                                            <?php echo $sub_category['name']; ?> <small></small>
                                                            <input type="checkbox" name="category[]"
                                                                class="categories <?php echo 'parent_id'.$category['id'] ?>"
                                                                value="<?php echo $sub_category['slug']; ?>"
                                                                onclick="filter(this)"
                                                                <?php if(in_array($sub_category['id'], $category_ids)) echo 'checked'; ?>>
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




                                <!-- <ul class="">
								<?php
								// $counter = 0;
								// $categories = $this->db->get('category')->result_array();
								//foreach ($categories as $key => $category):
									//if($category['parent'] > 0)
										//continue;
										//$counter++;
									?>
									
									<li class="<?php //if($counter > $number_of_visible_categories) echo 'hidden-categories hidden'; ?>">
										<label class="container_check"> <i class="<?php //echo $category['icon_class']; ?>"></i> <?php //echo $category['name']; ?> <small></small>
											<input type="checkbox" name="category[]" class="categories" value="<?php //echo $category['slug']; ?>" onclick="filter(this, '<?php echo 'parent_id'.$category['id'] ?>')" <?php if(in_array($category['id'], $category_ids)) echo 'checked'; ?>>
											<span class="checkmark"></span>
										</label>
									</li>
									<?php //foreach ($this->crud_model->get_sub_categories($category['id'])->result_array() as $sub_category):
										//	$counter++;
										?>
										<li class="ml-3 <?php //if($counter > $number_of_visible_categories) echo 'hidden-categories hidden'; ?>">
											<label class="container_check"> <?php //echo $sub_category['name']; ?> <small></small>
												<input type="checkbox" name="category[]" class="categories <?php //echo 'parent_id'.$category['id'] ?>" value="<?php echo $sub_category['slug']; ?>" onclick="filter(this)" <?php if(in_array($sub_category['id'], $category_ids)) echo 'checked'; ?>>
												<span class="checkmark"></span>
											</label>
										</li>
									<?php //endforeach; ?>
								<?php //endforeach; ?>
							</ul> -->
                            </ul><br>
                        </div>

                        <!--  -->
                        <!--demo utyu  -->




                        <!--  -->

                        <!-- Price range filter -->
                        <!-- <div class="filter_type">
                            <h6><?php echo get_phrase('price_limit'); ?></h6>
                            <div class="distance"> <?php echo get_phrase('price_within'); ?> <span></span>
                                <?php echo get_settings('system_currency'); ?></div>
                            <input type="range" class="price-range" min="0"
                                max="<?php echo $this->frontend_model->get_the_maximum_price_limit_of_all_listings(); ?>"
                                step="10" value="<?php echo $price_range; ?>" data-orientation="horizontal"
                                onchange="filter(this)">
                        </div> -->
                        <!-- 
						<div class="filter_type">
							<h6><?php echo get_phrase('amenities'); ?></h6>
							<ul>
							<?php
								$counter = 0;
								$amenities = $this->crud_model->get_amenities()->result_array();
								foreach ($amenities as $amenity):
									$counter++;
								?>
								<?php if ($counter <= $number_of_visible_amenities): ?>
									<div class="">
										<li>
											<label class="container_check"> <i class="<?php echo $amenity['icon']; ?>"></i> <?php echo $amenity['name']; ?>
												<input type="checkbox" class="amenities" name="amenity[]" value="<?php echo $amenity['slug']; ?>" onclick="filter(this)" <?php if(in_array($amenity['id'], $amenity_ids)) echo 'checked'; ?>>
												<span class="checkmark"></span>
											</label>
										</li>
									</div>
								<?php else: ?>
									<div class="hidden-amenities hidden">
										<li>
											<label class="container_check"> <i class="<?php echo $amenity['icon']; ?>"></i> <?php echo $amenity['name']; ?>
												<input type="checkbox" class="amenities" name="amenity[]" value="<?php echo $amenity['slug']; ?>" onclick="filter(this)" <?php if(in_array($amenity['id'], $amenity_ids)) echo 'checked'; ?>>
												<span class="checkmark"></span>
											</label>
										</li>
									</div>
								<?php endif; ?>
								<?php endforeach; ?>
							</ul>
							<a href="javascript::" id = "amenity-toggle-btn" onclick="showToggle(this, 'hidden-amenities')"><?php echo count($amenities) > $number_of_visible_amenities ? get_phrase('show_more') : ""; ?></a>
						</div> -->

                        <!-- <div class="filter_type">
							<h6><?php echo get_phrase('cities'); ?></h6>
							<ul>
								<li>
									<div class="">
										<input type="radio" id="city_all" name="city" class="city" value="all" onclick="filter(this)" <?php if($city_id == 'all') echo 'checked'; ?>>
										<label for="city_all"><?php echo get_phrase('all'); ?></label>
									</div>
								</li>
								<?php
								$counter = 1;
								$cities = $this->crud_model->get_cities()->result_array();
								foreach ($cities as $city):
									$counter++;
								?>
								<?php if ($counter <= $number_of_visible_cities): ?>
									<div class="">
										<li>
											<div class="">
												<input type="radio" id="city_<?php echo $city['id'];?>" name="city" class="city" value="<?php echo $city['slug']; ?>" onclick="filter(this)" <?php if($city['id'] == $city_id) echo 'checked'; ?>>
										    <label for="city_<?php echo $city['id'];?>"><?php echo $city['name']; ?></label>
											</div>
										</li>
									</div>
								<?php else: ?>
									<div class="hidden-cities hidden">
										<li>
											<div class="">
												<input type="radio" id="city_<?php echo $city['id'];?>" name="city" class="city" value="<?php echo $city['slug']; ?>" onclick="filter(this)" <?php if($city['id'] == $city_id) echo 'checked'; ?>>
												<label for="city_<?php echo $city['id'];?>"><?php echo $city['name']; ?></label>
											</div>
										</li>
									</div>
								<?php endif; ?>
								<?php endforeach; ?>
							</ul>
							<a href="javascript::" id = "city-toggle-btn" onclick="showToggle(this, 'hidden-cities')"><?php echo count($cities) > $number_of_visible_cities ? get_phrase('show_more') : ""; ?></a>
						</div> -->

                        <!-- <div class="filter_type">
							<h6><?php echo get_phrase('Location'); ?></h6>
							<ul>
								<li>
									<div class="">
										<input type="radio" id="city_all" name="city" class="city" value="all" onclick="filter(this)" <?php if($city_id == 'all') echo 'checked'; ?>>
										<label for="city_all"><?php echo get_phrase('all'); ?></label>
									</div>
								</li>
								<?php
								$counter = 1;
								$cities = $this->crud_model->get_cities()->result_array();
								foreach ($cities as $city):
									$counter++;
								?>
								<?php if ($counter <= $number_of_visible_cities): ?>
									<div class="">
										<li>
											<div class="">
												<input type="radio" id="city_<?php echo $city['id'];?>" name="city" class="city" value="<?php echo $city['slug']; ?>" onclick="filter(this)" <?php if($city['id'] == $city_id) echo 'checked'; ?>>
										    <label for="city_<?php echo $city['id'];?>"><?php echo $city['name']; ?></label>
											</div>
										</li>
									</div>
								<?php else: ?>
									<div class="hidden-cities hidden">
										<li>
											<div class="">
												<input type="radio" id="city_<?php echo $city['id'];?>" name="city" class="city" value="<?php echo $city['slug']; ?>" onclick="filter(this)" <?php if($city['id'] == $city_id) echo 'checked'; ?>>
												<label for="city_<?php echo $city['id'];?>"><?php echo $city['name']; ?></label>
											</div>
										</li>
									</div>
								<?php endif; ?>
								<?php endforeach; ?>
							</ul>
							<a href="javascript::" id = "city-toggle-btn" onclick="showToggle(this, 'hidden-cities')"><?php echo count($cities) > $number_of_visible_cities ? get_phrase('show_more') : ""; ?></a>
						</div> -->

                        <!-- <div class="filter_type">
							<h6><?php echo get_phrase('opening_status'); ?></h6>
							<ul>
								<li>
									<label class="container_check"> <i class=""></i> <?php echo get_phrase('open_now'); ?>
										<input type="checkbox" class="openingStatus" name="with_open" value="open" onclick="filter(this)" <?php if($with_open == 'open') echo 'checked'; ?>>
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<ul>
								<li>
									<label class="container_check"> <i class=""></i> <?php echo get_phrase('close_now'); ?>
										<input type="checkbox" class="closingStatus" name="with_close" value="close" onclick="filter(this)" <?php if($with_close == 'closed') echo 'checked'; ?>>
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div> -->

                        <!-- <div class="filter_type">
							<h6><?php echo get_phrase('video'); ?></h6>
							<ul>
								<li>
									<label class="container_check"> <i class=""></i> <?php echo get_phrase('with_video'); ?>
										<input type="checkbox" class="video_availability" name="with_video" value="1" onclick="filter(this)" <?php if($with_video == 1) echo 'checked'; ?>>
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<ul>
								<li>
									<label class="container_check"> <i class=""></i> <?php echo get_phrase('with_photos'); ?>
										<input type="checkbox" class="image_availability" name="with_photos" value="1" onclick="filter(this)" <?php if($with_photos == 1) echo 'checked'; ?>>
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<ul>
								<li>
									<label class="container_check"> <i class=""></i> <?php echo get_phrase('contact_number'); ?>
										<input type="checkbox" class="contact_availability" name="contact_numbers" value="1" onclick="filter(this)" <?php if($contact_number == 1) echo 'checked'; ?>>
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<ul>
								<li>
									<label class="container_check"> <i class=""></i> <?php echo get_phrase('Address'); ?>
										<input type="checkbox" class="Address_availability" name="Address" value="1" onclick="filter(this)" <?php if($Address == 1) echo 'checked'; ?>>
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<ul>
								<li>
									<label class="container_check"> <i class=""></i> <?php echo get_phrase('Website'); ?>
										<input type="checkbox" class="Website_availability" name="Website" value="1" onclick="filter(this)" <?php if($Website == 1) echo 'checked'; ?>>
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div> -->



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

                <?php
				foreach($listings as $listing):
					if(!has_package($listing['user_id']) > 0)
						continue; ?>

                <?php
						// $active_package = has_package($listing['user_id']);
						// $listing_allowed_number = $this->db->get_where('package_purchased_history', array('id', $active_package))->row('number_of_listings');
						// $listings_2 = $this->db->get_where('listing', array('user_id' => $listing['user_id']));

					?>



                <!-- A Single Listing Starts-->
                <div class="col-lg-6 col-md-6 listing-div " data-marker-id="<?php echo $listing['code']; ?>"
                    id="<?php echo $listing['code']; ?>">

                    <div class="strip grid <?php if($listing['is_featured'] == 1) echo 'featured-tag-border'; ?>">
                        <figure>

                            <a href="javascript::" class="wishlist-icon"
                                onclick="addToWishList(this, '<?php echo $listing['id']; ?>')">
                                <i
                                    class=" <?php echo is_wishlisted($listing['id']) ? 'fas fa-heart' : 'far fa-heart'; ?> "></i>
                            </a>
                            <?php if($listing['is_featured'] == 1){ ?>
                            <a href="javascript::" class="featured-tag-grid"><?php echo get_phrase('featured'); ?></a>
                            <?php } ?>
                            <a href="<?php echo get_listing_url($listing['id']); ?>"
                                id="listing-banner-image-for-<?php echo $listing['code']; ?>" class="d-block h-100 img"
                                style="background-image:url('<?php echo base_url('uploads/listing_thumbnails/'.$listing['listing_thumbnail']); ?>')">
                                <!-- <img src="<?php echo base_url('uploads/listing_thumbnails/'.$listing['listing_thumbnail']); ?>" class="img-fluid" alt=""> -->
                                <div class="read_more"><span><?php echo get_phrase('watch_details'); ?></span></div>
                            </a>
                            <small><?php echo $listing['listing_type'] == "" ? ucfirst(get_phrase('general')) : ucfirst(get_phrase($listing['listing_type'])) ; ?></small>
                        </figure>
                        <div class="wrapper <?php if($listing['is_featured'] == 1) echo 'featured-body'; ?>">
                            <h3 class="ellipsis">
                                <a
                                    href="<?php echo get_listing_url($listing['id']); ?>"><?php echo $listing['name']; ?></a>
                                <?php $claiming_status = $this->db->get_where('claimed_listing', array('listing_id' => $listing['id']))->row('status'); ?>
                                <?php if($claiming_status == 1): ?>
                                <span class="claimed_icon" data-toggle="tooltip"
                                    title="<?php echo get_phrase('this_listing_is_verified'); ?>">
                                    <img src="<?php echo base_url('assets/frontend/images/verified.png'); ?>"
                                        width="23" />
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
                            <a class="address" href="javascript:" button-direction-id="<?php echo $listing['code']; ?>"
                                target=""><?php echo get_phrase('show_on_map'); ?></a>
                            <?php endif; ?>

                        </div>
                        <ul class="<?php if($listing['is_featured'] == 1) echo 'featured-footer'; ?> mb-0">

                            <?php $opening_status = get_now_open($listing['id']); ?>
                            <li><span
                                    class="<?php echo $opening_status == 'closed' ? 'loc_closed' : 'loc_open'; ?>"><?php echo get_phrase($opening_status); ?></span>
                            </li>
                            <li>
                                <div class="score">
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
                                    <strong><?php echo $this->frontend_model->get_listing_wise_rating($listing['id']); ?></strong>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- A Single Listing Ends-->
                <?php endforeach; ?>
            </div>

            <!-- custom pagination -->
            <?php if(isset($pagination) && isset($total_page_number) && $pagination == 'search_page'): ?>
            <nav class="text-center" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class=""><a class="page-link"
                            href="<?php echo site_url('home/search/1?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo strtolower(get_phrase('first')); ?></a>
                    </li>
                    <?php
				  		
			  			if($total_page_number <= 6){
			  				for($i=1; $i <= $total_page_number;  $i++){
			  					?>
                    <li class=""><a class="page-link <?php if($active_page_number == $i) { echo 'active'; } ?>"
                            href="<?php echo site_url('home/search/'.$i.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo $i; ?></a>
                    </li>
                    <?php }
			  			}else{
			  				if($active_page_number-3 >= 1 && $active_page_number+3 <= $total_page_number){
			  					$start_i = $active_page_number - 3;
			  					$end_i = $active_page_number + 3;
			  					for($start_i; $start_i <= $end_i;  $start_i++){
			  					?>
                    <li class=""><a class="page-link <?php if($active_page_number == $start_i) { echo 'active'; } ?>"
                            href="<?php echo site_url('home/search/'.$start_i.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo $start_i; ?></a>
                    </li>
                    <?php }
			  				}elseif($active_page_number <= 3 && $total_page_number >=6){
			  				    $start_i = 1;
			  					$end_i = 6;
			  					for($start_i; $start_i <= $end_i;  $start_i++){
			  					?>
                    <li class=""><a class="page-link <?php if($active_page_number == $start_i) { echo 'active'; } ?>"
                            href="<?php echo site_url('home/search/'.$start_i.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo $start_i; ?></a>
                    </li>
                    <?php }
			  				}else{
			  				    
			  					$it= $total_page_number-6;
			  					for($it; $it <= $total_page_number;  $it++){
			  					?>
                    <li class=""><a class="page-link <?php if($active_page_number == $it) { echo 'active'; } ?>"
                            href="<?php echo site_url('home/search/'.$it.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo $it; ?></a>
                    </li>
                    <?php }
			  				}
			  			}
				  	?>
                    <?php if($total_page_number > 6): ?>
                    <li class=""><a class="page-link"
                            href="<?php echo site_url('home/search/'.$total_page_number.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo strtolower(get_phrase('last')); ?></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <?php elseif(isset($pagination) && isset($total_page_number) && $pagination == 'filter_page'): ?>
            <nav class="text-center" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class=""><a class="page-link"
                            href="<?php echo site_url('home/filter_listings/1?category='.$_GET['category'].'&amenity='.$_GET['amenity'].'&city='.$_GET['city'].'&price-range='.$_GET['price-range'].'&video='.$_GET['video'].'&status='.$_GET['status']); ?>"><?php echo strtolower(get_phrase('first')); ?></a>
                    </li>
                    <?php
				  		
			  			if($total_page_number <= 6){
			  				for($i=1; $i <= $total_page_number;  $i++){
			  					?>
                    <li class=""><a class="page-link <?php if($active_page_number == $i) { echo 'active'; } ?>"
                            href="<?php echo site_url('home/filter_listings/'.$i.'?'.$_SERVER['QUERY_STRING']); ?>"><?php echo $i; ?></a>
                    </li>
                    <?php }
			  			}else{
			  				if($active_page_number-3 >= 1 && $active_page_number+3 <= $total_page_number){
			  					$start_i = $active_page_number - 3;
			  					$end_i = $active_page_number + 3;
			  					for($start_i; $start_i <= $end_i;  $start_i++){
			  					?>
                    <li class=""><a class="page-link <?php if($active_page_number == $start_i) { echo 'active'; } ?>"
                            href="<?php echo site_url('home/filter_listings/'.$start_i.'?'.$_SERVER['QUERY_STRING']); ?>"><?php echo $start_i; ?></a>
                    </li>
                    <?php }
			  				}elseif($active_page_number <= 3 && $total_page_number >=6){
			  				    $start_i = 1;
			  					$end_i = 6;
			  					for($start_i; $start_i <= $end_i;  $start_i++){
			  					?>
                    <li class=""><a class="page-link <?php if($active_page_number == $start_i) { echo 'active'; } ?>"
                            href="<?php echo site_url('home/filter_listings/'.$start_i.'?'.$_SERVER['QUERY_STRING']); ?>"><?php echo $start_i; ?></a>
                    </li>
                    <?php }
			  				}else{
			  				    
			  					$it= $total_page_number-6;
			  					for($it; $it <= $total_page_number;  $it++){
			  					?>
                    <li class=""><a class="page-link <?php if($active_page_number == $it) { echo 'active'; } ?>"
                            href="<?php echo site_url('home/filter_listings/'.$it.'?'.$_SERVER['QUERY_STRING']); ?>"><?php echo $it; ?></a>
                    </li>
                    <?php }
			  				}
			  			}
				  	?>

                    <?php if($total_page_number > 6): ?>
                    <li class=""><a class="page-link"
                            href="<?php echo site_url('home/search/'.$total_page_number.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo strtolower(get_phrase('last')); ?></a>
                    </li>
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
        <div class="col-lg-3 order-lg-2 order-1 hideinMob">
            <div class="stiky-map mb-5 mb-lg-0">
                <div id="map" class="map-full map-layout"></div>
            </div>
        </div>
    </div>
</div>
<!-- /container -->
<script type="text/javascript">
function filter(elem, sub_class) {

    if (sub_class && $(elem).prop('checked') == true) {
        $('.' + sub_class).prop('checked', true);
    } else {
        $('.' + sub_class).prop('checked', false);
    }


    var urlPrefix = '<?php echo site_url('home/filter_listings?'); ?>'
    var urlSuffix = "";
    var slectedCategories = "";
    var selectedAmenities = "";
    var selectedCity = "";
    var selectedVideoAvailability = 0;
    var selectedPriceRange = 0;
    var selectedOpeningStatus = "all";

    $('.categories:checked').each(function() {
        (slectedCategories === "") ? slectedCategories = $(this).attr('value'): slectedCategories =
            slectedCategories + "--" + $(this).attr('value');
    });

    $('.amenities:checked').each(function() {
        (selectedAmenities === "") ? selectedAmenities = $(this).attr('value'): selectedAmenities =
            selectedAmenities + "--" + $(this).attr('value');
    });

    $('.city:checked').each(function() {
        (selectedCity === "") ? selectedCity = $(this).attr('value'): selectedCity = selectedCity + "--" + $(
            this).attr('value');
    });

    $('.video_availability:checked').each(function() {
        (selectedVideoAvailability === 0) ? selectedVideoAvailability = $(this).attr('value'):
            selectedVideoAvailability = selectedVideoAvailability + "--" + $(this).attr('value');
    });
    $('.openingStatus:checked').each(function() {
        (selectedOpeningStatus === 'all') ? selectedOpeningStatus = $(this).attr('value'):
            selectedOpeningStatus = $(this).attr('value');
    });


    selectedPriceRange = $('.price-range').val();
    urlSuffix = "category=" + slectedCategories + "&&amenity=" + selectedAmenities + "&&city=" + selectedCity +
        "&&price-range=" + selectedPriceRange + "&&video=" + selectedVideoAvailability + "&&status=" +
        selectedOpeningStatus;
    window.location.replace(urlPrefix + urlSuffix);
}

function addToWishList(elem, listing_id) {
    var isLoggedIn = '<?php echo $this->session->userdata('is_logged_in'); ?>';
    if (isLoggedIn === '1') {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/add_to_wishlist'); ?>',
            data: {
                listing_id: listing_id
            },
            success: function(response) {
                if (response == 'added') {
                    $(elem).html('<i class="fas fa-heart"></i>');
                    toastr.success('<?php echo get_phrase('added_to_wishlist'); ?>');
                } else {
                    $(elem).html('<i class="far fa-heart"></i>');
                    toastr.success('<?php echo get_phrase('removed_from_the_wishlist'); ?>');
                }
            }
        });
    } else {
        loginAlert();
    }
}


function showToggle(elem, selector) {
    $('.' + selector).slideToggle();
    console.log($(elem).text());
    if ($(elem).text() === "<?php echo get_phrase('show_more'); ?>") {
        $(elem).text('<?php echo get_phrase('show_less'); ?>');
    } else {
        $(elem).text('<?php echo get_phrase('show_more'); ?>');
    }
}
</script>

<!-- This map-category.php file has all the fucntions for showing the map, marker, map info and all the popup markups -->
<?php include 'assets/frontend/js/map/map-category.php'; ?>

<!-- This script is needed for providing the json file which has all the listing points and required information -->
<script>
function toggleListingView(type) {
    $.ajax({
        url: '<?php echo site_url('home/listings_view/'); ?>' + type,
        success: function(response) {
            location.reload();
        }
    });
}
</script>
<style>
@media (min-width: 287px) and (max-width: 900px) {
    .hideinMob {
        display: none;
    }
}

.wrapper {
    width: 70%;
}

@media(max-width:992px) {
    .wrapper {
        width: 100%;
    }
}

/* .panel-heading {
  padding: 0;
	border:0;
}  */
/* .panel-title>a, .panel-title>a:active{
	display:block;
	padding:15px;
    color:#555;
    font-size:16px;
    font-weight:bold;
	text-transform:uppercase;
	letter-spacing:1px;
    word-spacing:3px;
	text-decoration:none;
}  */
/* input[type='checkbox'] { display: none; }
 .wrap-collabsible { margin: 1.2rem 0; }
 .lbl-toggle { display: block; font-weight: bold; font-family: monospace; font-size: 1.2rem; text-transform: uppercase; text-align: center; padding: 1rem; color: #DDD; background: #0069ff; cursor: pointer; border-radius: 7px; transition: all 0.25s ease-out; } 
 .lbl-toggle:hover { color: #FFF; } 
  .lbl-toggle::before { content: ' '; display: inline-block; border-top: 5px solid transparent; border-bottom: 5px solid transparent; border-left: 5px solid currentColor; vertical-align: middle; margin-right: .7rem; transform: translateY(-2px); transition: transform .2s ease-out; } 
  .toggle:checked+.lbl-toggle::before { transform: rotate(90deg) translateX(-3px); }
   .collapsible-content { max-height: 0px; overflow: hidden; transition: max-height .25s ease-in-out; } 
   .toggle:checked + .lbl-toggle + .collapsible-content { max-height: 350px; }
    .toggle:checked+.lbl-toggle { border-bottom-right-radius: 0; border-bottom-left-radius: 0; } 
	.collapsible-content .content-inner { background: rgba(0, 105, 255, .2); border-bottom: 1px solid rgba(0, 105, 255, .45); border-bottom-left-radius: 7px; border-bottom-right-radius: 7px; padding: .5rem 1rem; }
	 .collapsible-content p { margin-bottom: 0; } */

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


#more {
    display: none;
}
</style>
<script>
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
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- <script>
	 $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
	</script> -->