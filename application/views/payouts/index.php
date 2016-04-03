
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
          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id='myModal'>
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                  <h4>API Response</h4>
                  <pre id='api_response'>

                  </pre>
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

  <script>
$('#myModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var transfer_id = button.data('transfer_id');
    $('#myModalLabel').text(transfer_id);

    $.ajax({
        method: 'GET',
        url : "<?php echo base_url('payouts/review'); ?>/"+transfer_id,
        dataType: 'json',
        success : function(response) {
            $('#api_response').text(JSON.stringify(response, null, 4));
        }
    })
})
  </script>
