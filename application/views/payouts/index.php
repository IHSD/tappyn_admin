
    <div class="page-title">
      <div class="title_left">
        <h3>
             Payouts

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
            <?php if(empty($payouts)): ?>
                <div class='text-center alert alert-warning col-sm-12'><strong>Sorry, there are no payouts to show! </strong><a href="<?php echo base_url(); ?>payouts/index" ?>Try clearing your filters?</a></div>
            <?php else: ?>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                        <td>ID</td>
                        <td>Status</td>
                        <td>Created</td>
                        <td>Claimed</td>
                        <td>Contest ID</td>
                        <td>User ID</td>
                    </tr>
                  </thead>

                  <tbody>
                        <?php foreach($payouts as $payout): ?>
                            <tr class="even pointer">
                                <td><?php echo $payout->id; ?></td>
                                <td><?php echo $payout->claimed == 1 ? 'Claimed' : 'Pending'; ?></td>
                                <td><?php echo date('M d', $payout->created_at); ?></td>
                                <td><?php echo $payout->claimed == 1 ? '<a href="#" data-toggle="modal" data-target=".bs-example-modal-lg" data-transfer_id="'.$payout->transfer_id.'">'.$payout->transfer_id.'</a>' : '---------'; ?></td>
                                <td><?php echo $payout->contest_id; ?>
                                <td><?php echo $payout->user_id; ?></td>
                            </tr>
                        <?php endforeach; ?>
                  </tbody>

                </table>
            <?php endif; ?>
          </div>
          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                  <h4>Text in a modal</h4>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                  <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
