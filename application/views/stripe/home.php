<?php echo json_encode($balance); ?>
<?php echo json_encode($disputes); ?>
<?php echo json_encode($balance_transactions); ?>
<div class="page-title">
  <div class="title_left">
    <h3>
        Stripe Account
    </h3>
  </div>
</div>
<div class="clearfix"></div>

<div class="row">
  <div class="clearfix"></div>
          <div class="row tile_count">
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-user"></i> Balance</span>
                <div class="count">$<?php echo round(($balance->available[0]->amount / 100), 2); ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-clock-o"></i> Pending</span>
                <div class="count">$<?php echo round(($balance->pending[0]->amount / 100), 2); ?></div>
              </div>
            </div>
        </div>


    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Recent Transactions</h2>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->

          <table class="table table-striped responsive-utilities jambo_table">
            <thead>
              <tr class="headings">
                <th class='column-title'>Transaction ID</th>
                <th class="column-title">Amount </th>
                <th class="column-title">Created </th>
                <th class="column-title">Available </th>
                <th class="column-title">Net </th>
                <th class="column-title">Status </th>
              </tr>
            </thead>

            <tbody>
                <?php foreach($balance_transactions->data as $transaction): ?>
                    <tr>
                        <td><?php echo $transaction->id; ?></td>
                        <td><?php echo round(($transaction->amount / 100) 2); ?></td>
                        <td><?php echo date('D M', $transaction->created); ?></td>
                        <td><?php echo date('D M', $transaction->available_on); ?></td>
                        <td><?php echo $transaction->net; ?></td>
                        <td><?php echo $transaction->status; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
