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
              <div class='submission_container col-sm-8 col-sm-offset-2'>
                  <div class='col-sm-4'>
                      <blockquote class="message" style='font-size:0.9em'>
                          <?php if(!is_null($submission->headline)): ?>
                              <p class='title'><strong>Headline</strong></p>
                              <p><?php echo $submission->headline; ?></p>
                          <?php endif; ?>
                          <?php if(!is_null($submission->text)): ?>
                              <p class='title'><strong>Text</strong></p>
                              <p><?php echo $submission->text; ?></p>
                          <?php endif; ?>
                          <?php if(!is_null($submission->description)): ?>
                              <p class='title'><strong>Description</strong></p>
                              <p><?php echo $submission->description; ?></p>
                          <?php endif; ?>
                          <?php if(!is_null($submission->link_explanation)): ?>
                              <p class='title'><strong>Link Explanation</strong></p>
                              <p><?php echo $submission->link_explanation; ?></p>
                          <?php endif; ?>
                      </blockquote>
                  </div>
                  <div class='col-sm-4'>
                      <?php if(!is_null($submission->thumbnail_url)): ?>
                          <img src="<?php echo $submission->thumbnail_url; ?>">
                      <?php endif; ?>
                  </div>
              </div>
              <?php echo form_open('contests/'.$submission->contest_id.'/submissions/'.$submission->id); ?>
                  <button type='submit' class='btn btn-danger'>Confirm</button>
                  <a href="<?php echo base_url('contests/show/'.$submission->contest_id); ?>" class='btn btn-default'>Cancel</a>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>

  </div>
