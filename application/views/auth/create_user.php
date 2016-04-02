<!-- <h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>

      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>

      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?> -->

<div class="page-title">
  <div class="title_left">
    <h3>Create Admin</h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <br />
        <?php echo form_open('auth/create_user', array('data-parsley-validate' => NULL, 'class' => 'form-horizontal form-label-left')); ?>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
              <?php echo form_input($first_name, ($this->input->post('first_name') ? $this->input->post('first_name') : ''), array('id' => 'first_name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12', 'name' => 'first_name'));?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo form_input($last_name, ($this->input->post('last_name') ? $this->input->post('last_name') : ''), array('id' => 'last_name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12', 'name' => 'last_name'));?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo form_input($email, ($this->input->post('email') ? $this->input->post('email') : ''), array('id' => 'email', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12', 'name' => 'email'));?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo form_input($phone, ($this->input->post('phone') ? $this->input->post('phone') : ''), array('id' => 'phone', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12', 'name' => 'phone', 'data-inputmask' => "'mask' : '(999) 999-9999'"));?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo form_input($password, ($this->input->post('password') ? $this->input->post('password') : ''), array('id' => 'password', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12', 'name' => 'password'));?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password Confirm <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo form_input($password_confirm, ($this->input->post('password_confirm') ? $this->input->post('password_confirm') : ''), array('id' => 'password_confirm', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12', 'name' => 'password_confirm'));?>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-primary">Cancel</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
