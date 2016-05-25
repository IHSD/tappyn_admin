<!-- <?php echo json_encode($submissions); ?> -->

    <div class="page-title">
      <div class="title_left">
        <h3>
             Confirm Delete

          </h3>
      </div>
    </div>
    <div class="clearfix"></div>


    <div class="row">

      <div class="clearfix"></div>

      <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4 col-sm-offset-4">
        <div class="x_panel">
          <div class="x_title">
            <div class="clearfix"></div>

          </div>
          <div class="x_content" style='overflow:auto'>
              <h4>Are you sure you would like to delete this submission?</h4>
              <?php echo form_open('submissions/'.$submission->id.'/delete'); ?>
                  <button type='submit' class='btn btn-danger'>Confirm</button>
                  <a href="<?php echo base_url('contests/'.$submission->contest_id; ); ?>" class='btn btn-default'>Cancel</a>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>

  </div>
