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
          <p>History of all transactions that affect our account balance</p>

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
                        <td><?php echo round(($transaction->amount / 100), 2); ?></td>
                        <td><?php echo date('D M d', $transaction->created); ?></td>
                        <td><?php echo date('D M d', $transaction->available_on); ?></td>
                        <td><?php echo round(($transaction->net / 100), 2); ?></td>
                        <td><?php echo $transaction->status; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>

    <div class='clearfix'></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Recent Disputes</h2>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <p>Recent Disputes, as well as evidence and due dates</p>
          <?php if(empty($disputes->data)): ?>
              <div class='alert alert-info'>There are currently no disputes to show</div>
          <?php else: ?>
          <table class="table table-striped responsive-utilities jambo_table">
            <thead>
              <tr class="headings">
                <th class='column-title'>Dispute ID</th>
                <th class="column-title">Amount </th>
                <th class="column-title">Created </th>
                <th class="column-title">Due By </th>
                <th class="column-title">Reason</th>
                <th class="column-title">Status </th>
              </tr>
            </thead>

            <tbody>
                <?php foreach($disputes->data as $dispute): ?>
                    <tr>
                        <td><?php echo $dispute->id; ?></td>
                        <td><?php echo round(($dispute->amount / 100), 2); ?></td>
                        <td><?php echo date('D M d', $dispute->created); ?></td>
                        <td><?php echo date('D M d', $dispute->evidence_details->due_by); ?></td>
                        <td><?php echo $dispute->reason; ?></td>
                        <td><?php echo $dispute->status; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
          </table>
        </div>
      </div>
    </div>
    <div class='clearfix'></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Recent Tranfsers</h2>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
           <p>These are transfers from our Stripe Account to other accounts</p>
          <?php if(empty($transfers->data)): ?>
              <div class='alert alert-info'>There are currently no transfers to show</div>
          <?php else: ?>
          <table class="table table-striped responsive-utilities jambo_table">
            <thead>
              <tr class="headings">
                <th class='column-title'>Transfer ID</th>
                <th class="column-title">Amount </th>
                <th class="column-title">Created </th>
                <th class="column-title">Destination</th>
                <th class="column-title">Status </th>
              </tr>
            </thead>

            <tbody>
                <?php foreach($transfers->data as $transfer): ?>
                    <tr>
                        <td><?php echo $transfer->id; ?></td>
                        <td><?php echo round(($transfer->amount / 100), 2); ?></td>
                        <td><?php echo date('D M d', $transfer->created); ?></td>
                        <td><?php echo $transfer->destination; ?></td>
                        <td><?php echo $transfer->status; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
          </table>
        </div>
      </div>
    </div>
