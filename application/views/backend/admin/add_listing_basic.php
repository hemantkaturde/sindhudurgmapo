<div class="form-group">
  <label for="title" class="col-sm-3 control-label"><?php echo get_phrase('listing_owner'); ?></label>
  <div class="col-sm-7">
    <select class="form-control select2" name="user_id" id = "user_id" required>
      <option value=""><?php echo get_phrase('select_a_user'); ?></option>
      <?php echo $logged_in_user_id = $this->session->userdata('user_id'); ?>
      <?php foreach ($all_users as $all_user): ?>
        <option value="<?php echo $all_user['id']; ?>" <?php if($all_user['id'] == $logged_in_user_id)echo 'selected'; ?>><?php echo $all_user['name']; ?> <span style="font-size: 12px;">(<?php echo $all_user['email']; ?>)</span></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>

<div class="form-group">
  <label for="title" class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="title" id="title" placeholder="<?php echo get_phrase('title'); ?>" required>
  </div>
</div>

<div class="form-group">
  <label for="description" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>
  <div class="col-sm-7">
    <textarea name="description" class="form-control" id="description" rows="8" cols="80"></textarea>
  </div>
</div>
<div class="form-group">
  <label for="featured_type" class="col-sm-3 control-label"><?php echo get_phrase('featured_type'); ?></label>
  <div class="col-sm-7">
    <select name="is_featured" id = "featured_type" class="selectboxit" required>
      <option value=""><?php echo get_phrase('select_featured_type'); ?></option>
      <option value="1"><?php echo get_phrase('featured'); ?></option>
      <option value="0"><?php echo get_phrase('none_featured'); ?></option>
		</select>
  </div>
</div>
<div class="form-group">
  <label for="google_analytics_id" class="col-sm-3 control-label"><?php echo get_phrase('google_analytics_id'); ?></label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="google_analytics_id" id="google_analytics_id" placeholder="GA_MEASUREMENT_ID" placeholder="GA_MEASUREMENT_ID">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-3 control-label" for="category"> <?php echo get_phrase('category'); ?></label>
  <div class="col-sm-7">
    <div id="category_area">
      <div class="row">
        <div class="col-sm-7">
          <select class="form-control select2" name="categories[]" id = "category_default" required>
            <option value=""><?php echo get_phrase('select_category'); ?></option>
            <?php foreach ($categories as $category): ?>
              <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendCategory()"> <i class="fa fa-plus"></i> </button>
        </div>
      </div>
    </div>

    <div id="blank_category_field">
      <div class="row appendedCategoryFields" style="margin-top: 10px;">
        <div class="col-sm-7 pr-0">
          <select class="form-control" name="categories[]">
            <option value=""><?php echo get_phrase('select_category'); ?></option>
            <?php foreach ($categories as $category): ?>
              <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removeCategory(this)"> <i class="fa fa-minus"></i> </button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="form-group">
  <label for="country_id" class="col-sm-3 control-label"><?php echo get_phrase('country'); ?></label>
  <div class="col-sm-7">
    <select name="country_id" id = "country_id" class="form-control select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('select_country'); ?>">
      <option value="0"><?php echo get_phrase('none'); ?></option>
      <?php foreach ($countries as $country): ?>
        <option value="<?php echo $country['id']; ?>" <?php if($country['name']=='India'){ echo 'selected'; } ?>><?php echo $country['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>



<div class="form-group">
  <label for="taluka_id" class="col-sm-3 control-label"><?php echo get_phrase('Taluka/Block'); ?></label>
  <div class="col-sm-7">
    <select name="taluka_id" id = "taluka_id" class="form-control" data-allow-clear="true" data-placeholder="<?php echo get_phrase('select_taluka'); ?>">
      <option value="0"><?php echo get_phrase('none'); ?></option>
      <?php foreach ($city_taluka as $taluka): ?>
        <option value="<?php echo $taluka['id']; ?>"><?php echo $taluka['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>

<div class="form-group">
  <label for="village_id" class="col-sm-3 control-label"><?php echo get_phrase('Village/Area'); ?></label>
  <div class="col-sm-7">
    <select name="village_id" id = "village_id" class="form-control" data-allow-clear="true" data-placeholder="<?php echo get_phrase('select_area'); ?>">
      <option value="0"><?php echo get_phrase('none'); ?></option>
      <?php foreach ($village_listing as $village): ?>
        <option value="<?php echo $village['id']; ?>"><?php echo $village['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>

<!-- <div class="form-group">
  <label class="col-sm-3 control-label" for="city_id"> <?php echo get_phrase('city'); ?></label>
  <div class="col-sm-7">
    <select class="form-control select2" name="city_id" id="city_id">
      <option value=""><?php echo get_phrase('select_city'); ?></option>
    </select>
  </div>
</div> -->

<div class="form-group">
  <label class="col-sm-3 control-label" for="address"><?php echo get_phrase('address'); ?></label>
  <div class="col-sm-7">
    <textarea name="address" rows="5" class="form-control" id = "address"></textarea>
  </div>
</div>

<div class="form-group">
 <label for="latitude" class="col-sm-3 control-label"><?php echo get_phrase('latitude'); ?></label>
 <div class="col-sm-7">
     <input type="text" class="form-control" id="latitude" name="latitude" placeholder="<?php echo get_phrase('you_can_provide_latitude_for_getting_the_exact_result'); ?>">
</div>
</div>

<div class="form-group">
    <label for="longitude" class="col-sm-3 control-label"><?php echo get_phrase('longitude'); ?></label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="longitude" name="longitude" placeholder="<?php echo get_phrase('you_can_provide_longitude_for_getting_the_exact_result'); ?>">
 </div>
</div>

<div class="form-group">
  <input type="hidden" class="form-control" id="latitude" name="latitude">
  <input type="hidden" class="form-control" id="longitude" name="longitude">

  <label class="col-sm-3 control-label" for="select_location"> <?php echo get_phrase('select_location'); ?></label>
  <div class="col-sm-7">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
       integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
       crossorigin=""></script>
     <div id="map" style="height: 200px; cursor: pointer;"></div>

     <script type="text/javascript">
       <?php if(get_settings("active_map") == 'openstreetmap'): ?>
          //free map
          var map = L.map('map').setView([<?= get_settings('default_location'); ?>], 13);
          L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '<a href="<?= site_url(); ?>" target="_blank"><?= get_settings("system_title"); ?></a>',
            gestureHandling: true
          }).addTo(map);
        <?php else: ?>
          //paid maps
          var map = L.map('map').setView([<?= get_settings('default_location'); ?>], 13);
          L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: '<a href="<?= site_url(); ?>" target="_blank"><?= get_settings("system_title"); ?></a>',
            id: 'mapbox/streets-v11',
            accessToken: '<?= get_settings("map_access_token"); ?>',
            gestureHandling: true
          }).addTo(map);
        <?php endif; ?>




        var popup = L.popup();
        map.on('click', onMapClick);
        function onMapClick(e) {
          popup.setLatLng(e.latlng).setContent("<?php echo get_phrase('your_selected'); ?> " + e.latlng.toString()).openOn(map);

          var lat_lan_string =  e.latlng.toString();
          var lat_lan_string_arr = lat_lan_string.split(", ");
          var lat_string_arr = lat_lan_string_arr[0].split('LatLng(');
          var lan_string_arr = lat_lan_string_arr[1].split(')');
          var lat = lat_string_arr[1];
          var lan = lan_string_arr[0];
          $('#latitude').val(lat);
          $('#longitude').val(lan);
          //L.marker([lat, lan]).addTo(map).openPopup();
        }
        
     </script>
   </div>
 </div>




