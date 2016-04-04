

<div class="page-title">
  <div class="title_left">
    <h3>Settings</h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_panel">
      <div class="x_content">

        <br />
        <?php echo form_open(uri_string(), array('data-parsley-validate' => NULL, 'class' => 'form-horizontal form-label-left')); ?>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
              <?php echo form_input($first_name);?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo form_input($last_name);?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo form_input($phone);?>
            </div>
          </div>
           <div class="ln_solid"></div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo form_input($password);?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password Confirm <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo form_input($password_confirm);?>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a class="btn btn-default" href="#" onclick="history.go(-1);">Cancel</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
          <?php echo form_hidden('id', $user->id);?>
          <?php echo form_hidden($csrf); ?>

        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
