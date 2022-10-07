<!-- start page title -->
<div class="row ">
  <div class="col-lg-12">
    <a href="<?php echo site_url('admin/taluka_form/add'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i><?php echo get_phrase('add_new_taluka'); ?></a>
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('taluka'); ?>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div><?php echo get_phrase('name');?></div></th>
              <th><div><?php echo get_phrase('country');?></div></th>
              <th><div><?php echo get_phrase('options');?></div></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $counter = 0;
            foreach ($taluka as $all_taluka): ?>
            <tr>
              <td><?php echo ++$counter; ?></td>

              <td><?php echo $all_taluka['name']; ?></td>
              <td>
                <?php
                $country_details = $this->crud_model->get_countries($all_taluka['country_id'])->row_array();
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
                        <a href="<?php echo site_url('admin/taluka_form/edit/'.$all_taluka['id']); ?>" class="">
                          <i class="entypo-pencil"></i>
                          <?php echo get_phrase('edit'); ?>
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#" class="" onclick="confirm_modal('<?php echo site_url('admin/taluka/delete/'.$all_taluka['id']); ?>');">
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
