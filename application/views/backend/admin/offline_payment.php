<div class="row">
  <div class="col-lg-10">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('offline_payment'); ?>
        </div>
      </div>
      <div class="panel-body">
        <form action="<?php echo site_url('admin/offline_payment/pay'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

          <div class="form-group">
            <label for="user" class="col-sm-3 control-label"><?php echo get_phrase('user'); ?></label>
            <div class="col-sm-7">
              <select name="user" id = "user" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('select_user'); ?>" required>
                <option value=""><?php echo get_phrase('select_user'); ?></option>
                <?php
                $users = $this->db->get('user')->result_array();
                foreach($users as $user):
                  if($user['role_id'] == 2):?>
                  <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="package" class="col-sm-3 control-label"><?php echo get_phrase('choose_package'); ?></label>

          <div class="col-sm-7">
            <select name="package" id = "package" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('select_package'); ?>" required>
              <option value=""><?php echo get_phrase('select_package'); ?></option>
              <?php
              $packages = $this->db->get('package')->result_array();
              foreach($packages as $package):
                if($package['package_type'] == 1):?>
                <option value="<?php echo $package['id']; ?>"><?php echo $package['name'].' '.'('.' ₹ '.$package['price'].') '; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="amount" class="col-sm-3 control-label"><?php echo get_phrase('payment_amount').' ('.currency_code_and_symbol().')'; ?></label>

        <div class="col-sm-7">
          <input type="number" class="form-control" name="amount" id="amount" value="0" placeholder="<?php echo get_phrase('amount'); ?>" required>
        </div>
      </div>

      <!-- <div class="form-group">
        <label for="payment_method" class="col-sm-3 control-label"><?php echo get_phrase('payment_method'); ?></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" name="payment_method" id="payment_method" placeholder="<?php echo get_phrase('payment_method'); ?>" required>
        </div>
      </div> -->

      <div class="form-group">
           <label for="payment_method" class="col-sm-3 control-label"><?php echo get_phrase('payment_method'); ?></label>
            <div class="col-sm-7">
               <select name="payment_method" id= "payment_method" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('payment_method'); ?>" required>
                  <option value=""><?php echo get_phrase('select_payment_method'); ?></option>
              
                    <option value="Cash">Cash</option>
                    <option value="Debit">Debit</option>
                    <option value="Credit">Credit</option>
                    <option value="Net Banking">Net Banking</option>
                    <option value="Net Banking">UPI</option>
                    <option value="Phone Pay">Phone Pay</option>
                    <option value="Google pay">Google pay</option>
                    <option value="Paytm">Paytm</option>
                    <option value="Swipe">Swipe</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="DD">DD</option>
                    <option value="cheque">Cheque</option>

               </select>
            </div>
      </div>

      <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
        <button type="submit" class="btn btn-info"><?php echo get_phrase('add_user_to_package'); ?></button>
      </div>
    </form>
  </div>
</div>
</div><!-- end col-->
</div>
