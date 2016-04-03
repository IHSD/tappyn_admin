<?php var_dump($payouts); ?>

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
                        <td></td>
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
                                <td>
                                    <a href="<?php echo base_url().'payouts/show/'.$payout->id; ?>"><span class='fa fa-edit'></span></a>
                                </td>
                                <td><?php echo $payout->id; ?></td>
                                <td><?php echo $payout->claimed == 1 ? 'Claimed' : 'Pending'; ?></td>
                                <td><?php echo date('M d', $payout->created_at); ?></td>
                                <td><?php echo $payout->claimed == 1 ? date('M d', $payout->claimed_at) : '------'; ?></td>
                                <td><a href="<?php echo base_url('payouts/show/'.$payout->id); ?>"><?php echo $payout->id; ?></a></td>
                                <td><?php echo $payout->user_id; ?></td>
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
