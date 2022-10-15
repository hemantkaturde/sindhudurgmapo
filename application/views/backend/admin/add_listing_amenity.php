<!-- <div class="col-lg-offset-2 col-lg-8">
  <div class="row">
    <?php $amenities = $this->crud_model->get_amenities();
    foreach ($amenities->result_array() as $amenity):?>
    <div class="col-lg-4" style="margin-bottom: 10px;">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="amenities[]" id="<?php echo $amenity['id']; ?>" value="<?php echo $amenity['id']; ?>">
        <label class="custom-control-label" for="<?php echo $amenity['id']; ?>"><i class="<?php echo $amenity['icon']; ?>" style="color: #636363;"></i> <?php echo $amenity['name']; ?></label>
      </div>
    </div>
  <?php endforeach; ?>
</div>
</div> -->




<style>
.container div {
color: white;
transition: all 0.5s ease;
}

.container.amits{
  width: 868px;
  margin-top:53px;
  transition: all 0.5s ease;


}

.hidden {
display: none;
}
</style>

<form>
<select class="event-type-select" style="padding:9px">
<option value=""><?php echo get_phrase('select_category'); ?></option>
<option value="all">All Event Types</option>
          <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
          <?php endforeach; ?>
</select>
</form>

<div class="container amits">
<?php $amenities = $this->crud_model->get_amenities();
         foreach ($amenities->result_array() as $amenity):?>
<div class="col col-md-3 col-xs-6" data-eventtype="<?php echo $amenity['category_id']; ?>">

<input type="checkbox" class="custom-control-input" name="amenities[]" id="<?php echo $amenity['id']; ?>" value="<?php echo $amenity['id']; ?>">
<label class="custom-control-label" for="<?php echo $amenity['id']; ?>"><i class="<?php echo $amenity['icon']; ?>" style="color: #636363;"></i> <?php echo $amenity['name']; ?></label>
<?php echo $amenity['name']; ?>
</div>
<?php endforeach; ?>

</div>


<script>
$( ".event-type-select" ).change(function() {
var selectedEventType = this.options[this.selectedIndex].value;
if (selectedEventType == "all") {
  $('.container div').removeClass('hidden');
} else {
  $('.container div').addClass('hidden');
  $('.container div[data-eventtype="' + selectedEventType + '"]').removeClass('hidden');
}
});
</script>