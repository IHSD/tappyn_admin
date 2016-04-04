

<div class="page-title">
  <div class="title_left">
    <h3>Craete Voucher</h3>
  </div>
</div>
<div class='clearfix'></div>
<?php if(isset($error) || $this->session->flashdata('error')): ?>
    <div class='alert alert-danger'><?php echo isset($error) ? $error : $this->session->flashdata('error'); ?></div>
<?php elseif(isset($message) || $this->session->flashdata('message')): ?>
    <div class='alert alert-info'><?php echo isset($message) ? $message : $this->session->flashdata('message'); ?></div>
<?php endif; ?>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <br />
        <?php echo form_open(uri_string(), array('data-parsley-validate' => NULL, 'class' => 'form-horizontal form-label-left')); ?>
        <div class='col-sm-6'>
            <div class='form-group'>
                <label>Code</label>
                <input class='form-control' type='text' name='code' placeholder='Unique Discount Code'>
            </div>
            <div class='form-group'>
                <label>Discount</label>
                <select class='form-control' name='discount_type'>
                    <option value='amount'>Flat Amount</option>
                    <option value='percentage'>Percentage</option>
                </select>
            </div>
            <div class='form-group'>
                <label>Discount Value</label>
                <input type='text' class='form-control' name='value'>
            </div>
            <div class='form-group'>
                <label>Expiration Type</label>
                <select class='form-control' name='expiration' id='expiration_type'>
                    <option value='time_length'>Time Range</option>
                    <option value='uses'>Usage Limit</option>
                </select>
            <div class='form-group' id='datepicker-container'>
                <label>Date Range</label>
                <div class="input-daterange input-group" id="datepicker">
                    <input type="text" class="input-sm form-control" name="start_time" />
                    <span class="input-group-addon">to</span>
                    <input type="text" class="input-sm form-control" name="stop_time" />
                </div>
            </div>
            <div class='form-group' id='usage_limit_container' style='display:none'>
                <label>Usage Limit</label>
                <input type='number' class='form-control' name='usage_limit' value='10'>
            </div>
        </div>
        <button class='btn btn-primary' type='submit'>Create</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
<script>
    var date_config = {
        format: 'yyyy-mm-dd'
    };
    $('#datepicker-container .input-daterange').datepicker(date_config);
    $('#expiration_type').change(function(e) {
        if($('#expiration_type option:selected').val() == 'time_length')
        {
            $('#datepicker-container').show();
            $("#usage_limit_container").hide();
        } else {
            $('#datepicker-container').hide();
            $("#usage_limit_container").show();
        }
    })
</script>
