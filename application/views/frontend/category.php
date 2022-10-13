<div class="" style="background-color: #f5f8fa;">
	<div class="container margin_80_55">
		<div class="main_title_2">
			<span><em></em></span>
			<h2><?php echo get_phrase('categories'); ?></h2>
		</div>
		<div class ="row">
		<div class="col-lg-6">
      </div>
		<div class="col-lg-6 mb-4">
		<div class="widget search_blog">
				<!-- <label><?php echo get_phrase('title'); ?>, <?php echo get_phrase('description'); ?>, <?php echo get_phrase('category'); ?></label> -->
				<div class="form-group">
					<input type="text" name="search" value="<?php if($searching_value != ''){ echo $searching_value; } ?>" id="searching_key" class="form-control" placeholder="<?php echo get_phrase('search'); ?>..">
					<span><input type="submit" id="blog_searching_btn" onclick="blog_search()" value="<?php echo get_phrase('search'); ?>" style="cursor: pointer;"></span>
				</div>
		</div>
        </div>
		<div class="row justify-content-center">
			<?php
			foreach ($categories as $key => $category): ?>
			<div class="col-md-4 mb-3">
				<div class="category-title">
					<a href="<?php echo site_url('home/search?search_string=&selected_category_id='.$category['id']); ?>" style="color: unset;"><?php echo $category['name']; ?></a>
				</div>
				<?php
				    $sub_categories = $this->crud_model->get_sub_categories($category['id']);
				    foreach ($sub_categories->result_array() as $key => $sub_category): ?>
					<a href="<?php echo site_url('home/search?search_string=&selected_category_id='.$sub_category['id']); ?>" class="sub-category-link">
						<div class="sub-category">
							<span class="sub-category-number"> <i class="<?php echo $sub_category['icon_class']; ?>"></i> </span>
							<span class="sub-category-title"> <?php echo $sub_category['name']; ?></span>
							<span class="sub-category-arrow"><i class="fa fa-arrow-right"></i></span>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</div>


<script>
	function blog_search(){
		var searching_value = $('#searching_key').val();
		if(searching_value != ''){
			location.replace("<?php echo site_url('home/category?search='); ?>"+searching_value);
		}else{
			location.replace("<?php echo site_url('home/category'); ?>");
		}
	}

	// Get the input field
var input = document.getElementById("searching_key");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("blog_searching_btn").click();

}
});

	</script>
