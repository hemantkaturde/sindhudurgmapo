<?php
    $amenity_details = $this->crud_model->get_amenities($amenity_id)->row_array();
?>
<div class="row">
	<div class="col-lg-10">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('update_amenity'); ?>
				</div>
			</div>
			<div class="panel-body">

				<form action="<?php echo site_url('admin/amenities/edit/'.$amenity_id); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

					<div class="form-group">
						<label for="name" class="col-sm-3 control-label"><?php echo get_phrase('amenity_title'); ?></label>

						<div class="col-sm-7">
							<input type="text" class="form-control" name="name" id="name" placeholder="<?php echo get_phrase('provide_amenity_name'); ?>" value="<?php echo $amenity_details['name']; ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="parent" class="col-sm-3 control-label"><?php echo get_phrase('parent_category'); ?></label>

						<div class="col-sm-7">
							<select name="category" id = "category" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('select_parent_category'); ?>" onchange="checkCategoryType(this.value)">
								<option value="0"><?php echo get_phrase('none'); ?></option>
								<?php foreach ($categories as $category): ?>
									<?php if ($category['parent'] == 0): ?>
										<option value="<?php echo $category['id']; ?>" <?php if($amenity_details['category_id']==$category['id']){ echo 'selected'; } ?>><?php echo $category['name']; ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					
					<div class="form-group" id = "icon-picker-area">
						<label for="font_awesome_class" class="col-sm-3 control-label"><?php echo get_phrase('icon_picker'); ?></label>

						<div class="col-sm-7">
							<input type="text" name="icon" class="form-control icon-picker" autocomplete="off" value="<?php echo $amenity_details['icon']; ?>" required>
						</div>
					</div>

					<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('update_amenity'); ?></button>
					</div>

				</form>
			</div>
		</div>
	</div><!-- end col-->
</div>
