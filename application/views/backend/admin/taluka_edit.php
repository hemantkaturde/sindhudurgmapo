<?php
    $taluka_details = $this->crud_model->get_taluka($taluka_id)->row_array();
?>

<div class="row">
	<div class="col-lg-10">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('update_taluka'); ?>
				</div>
			</div>
			<div class="panel-body">

				<form action="<?php echo site_url('admin/taluka/edit/'.$taluka_id); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

					<div class="form-group">
						<label for="name" class="col-sm-3 control-label"><?php echo get_phrase('taluka_name'); ?></label>

						<div class="col-sm-7">
							<input type="text" class="form-control" name="name" id="name" placeholder="<?php echo get_phrase('taluka_name'); ?>" value="<?php echo $taluka_details['name']; ?>">
						</div>
					</div>



					<div class="form-group">
						<label for="country_id" class="col-sm-3 control-label"><?php echo get_phrase('country'); ?></label>

						<div class="col-sm-7">
							<select name="country_id" id = "country_id" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('select_country'); ?>">
								<option value="0"><?php echo get_phrase('none'); ?></option>
								<?php foreach ($countries as $country): ?>
									 <option value="<?php echo $country['id']; ?>" <?php if($taluka_details['country_id'] == $country['id']) echo 'selected'; ?>><?php echo $country['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
						<button type="submit" class="btn btn-info"><?php echo get_phrase('update_taluka'); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div><!-- end col-->
</div>
