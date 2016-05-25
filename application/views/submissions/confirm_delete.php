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

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="clearfix"></div>

          </div>
          <div class="x_content" style='overflow:auto'>
              <h4>Are you sure you would like to delete this submission?</h4>
              <div class='submission_container col-sm-6 col-sm-offset-3'>
                  <div class='col-sm-6'>
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
                  <div class='col-sm-6'>
                      <?php if(!is_null($submission->thumbnail_url)): ?>
                          <img src="<?php echo $submission->thumbnail_url; ?>">
                      <?php endif; ?>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>

  </div>
