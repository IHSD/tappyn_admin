<!-- <?php echo json_encode($contests); ?> -->

    <div class="page-title">
      <div class="title_left">
        <h3>
             Contests

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
            <span class='pull-right'><?php echo $pagination; ?></span>
          </div>
          <div class="x_content" style='overflow:auto'>
            <?php if(empty($contests)): ?>
                <div class='text-center alert alert-warning col-sm-12'><strong>Sorry, there are no emails to show! </strong><a href="<?php echo base_url(); ?>emails/index" ?>Try clearing your filters?</a></div>
            <?php else: ?>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                        <td></td>
                        <td>ID</td>
                        <td>Queued At</td>
                        <td>Sent At</td>
                        <td>Status</td>
                        <td>Recipient</td>
                        <td>Recipient ID</td>
                        <td>Type</td>
                        <td>Object Type</td>
                        <td>Object ID</td>
                        <td>Opens</td>
                        <td>Clicks</td>
                    </tr>
                  </thead>

                  <tbody>
                        <?php foreach($emails as $email): ?>
                            <tr class="even pointer">
                                <td><?php echo $email->id; ?></td>
                                <td><?php echo $email->queued_at; ?></td>
                                <td><?php echo $email->sent_at; ?></td>
                                <td></td>
                                <td><?php echo $email->recipient; ?></td>
                                <td><?php echo $email->recipient_id; ?></td>
                                <td><?php echo $email->email_type; ?></td>
                                <td><?php echo $email->object_type; ?></td>
                                <td><?php echo $email->object_id; ?></td>
                                <td><?php echo $email->opened; ?></td>
                                <td><?php echo $email->clicks; ?></td>
                            </tr>
                        <?php endforeach; ?>
                  </tbody>

                </table>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

  </div>
