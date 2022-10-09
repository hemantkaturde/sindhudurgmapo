<!-- start page title -->
<div class="row ">
  <div class="col-lg-12">
    <a href="<?php echo site_url('admin/village_form/add'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i><?php echo get_phrase('add_new_village'); ?></a>
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('village'); ?>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div><?php echo get_phrase('name');?></div></th>
              <th><div><?php echo get_phrase('city');?></div></th>
              <th><div><?php echo get_phrase('country');?></div></th>
              <th><div><?php echo get_phrase('options');?></div></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $counter = 0;
            foreach ($village as $all_village): ?>
            <tr>
              <td><?php echo ++$counter; ?></td>

              <td><?php echo $all_village['name']; ?></td>
              <td>
                <?php
                if($all_village['city_id']){
                  $city_details = $this->crud_model->get_cities($all_village['city_id'])->row_array();
                  echo $city_details['name'];
                }else{
                  $city_details = $this->crud_model->get_cities($all_village['city_id'])->row_array();
                  echo '';
                }
              
                ?>
              </td>
              <td>
                <?php
                $country_details = $this->crud_model->get_countries($all_village['country_id'])->row_array();
                echo $country_details['name'];
                ?>
              </td>

              <td>
                <div class="bs-example">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <?php echo get_phrase('action'); ?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-blue" role="menu">
                      <li>
                        <a href="<?php echo site_url('admin/village_form/edit/'.$all_village['id']); ?>" class="">
                          <i class="entypo-pencil"></i>
                          <?php echo get_phrase('edit'); ?>
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#" class="" onclick="confirm_modal('<?php echo site_url('admin/village/delete/'.$all_village['id']); ?>');">
                          <i class="entypo-trash"></i>
                          <?php echo get_phrase('delete'); ?>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
