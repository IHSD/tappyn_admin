<!--

 -->
 <div class="row">
   <div class="clearfix"></div>
   <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
       <div class="x_panel">
    <div class="">
      <a class="hiddenanchor" id="toregister"></a>
      <a class="hiddenanchor" id="tologin"></a>

          <section class="login_content">
              <h1><?php echo lang('deactivate_heading');?></h1>
              <p><?php echo sprintf(lang('deactivate_subheading'), ($user->username == '' ? $user->email : $user->username));?></p>
              <?php echo form_open("auth/deactivate/".$user->id);?>

                <p>
                	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
                  <input type="radio" name="confirm" value="yes" checked="checked" />
                  <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
                  <input type="radio" name="confirm" value="no" />
                </p>

                <?php echo form_hidden($csrf); ?>
                <?php echo form_hidden(array('id'=>$user->id)); ?>

                <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

              <?php echo form_close();?>
            <!-- form -->
          </section>
          <!-- content -->
        </div>
      </div>
    </div>
