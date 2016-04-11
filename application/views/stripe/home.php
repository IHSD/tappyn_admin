<div class="page-title">
  <div class="title_left">
    <h3>
        Stripe Account <small><a data-toggle="modal" data-target=".bs-example-modal-lg">Make Payment</a></small>
    </h3>
  </div>
</div>
<div class="clearfix"></div>

<div class="row">
    <?php if(isset($error)): ?>
        <div class='alert alert-warning'><?php echo $error; ?></div>
    <?php elseif(isset($messge)): ?>
        <div class='alert alert-success'><?php echo $message; ?></div>
    <?php endif; ?>
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

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <?php $attributes = array('id' => 'payment-form', 'method' => 'post'); ?>
          <?php echo form_open('stripe/balance', $attributes); ?>
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Pay into Tappyn Account</h4>
          </div>
          <div class="modal-body">
                <div class="alert alert-danger payment-errors" style='display:none'></div>

                <div class="form-row">
                  <label>
                    <span>Amount</span>
                    <input type="text" class='form-control' size="20" name='amount'/>
                  </label>
                </div>

                <div class="form-row">
                  <label>
                    <span>Card Number</span>
                    <input type="text" class='form-control' size="20" data-stripe="number"/>
                  </label>
                </div>

                <div class="form-row">
                  <label>
                    <span>CVC</span>
                    <input type="text" class='form-control' size="4" data-stripe="cvc"/>
                  </label>
                </div>

                <div class="form-row">
                  <label>
                    <span>Expiration (MM/YYYY)</span>
                    <input type="text" class='form-control' size="2" data-stripe="exp-month"/>
                  </label>
                  <span> / </span>
                  <input type="text" size="4" class='form-control' data-stripe="exp-year"/>
                </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class='btn btn-primary'>Submit Payment</button>
            <button type="button" class="btn btn-danger">Cancel</button>
            <?php echo form_close(); ?>
          </div>

        </div>
      </div>
    </div>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
  // This identifies your website in the createToken call below
  Stripe.setPublishableKey('pk_test_6pRNASCoBOKtIshFeQd4XMUh');
  // ...
  jQuery(function($) {
  $('#payment-form').submit(function(event) {
    var $form = $(this);

    // Disable the submit button to prevent repeated clicks
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken($form, stripeResponseHandler);

    // Prevent the form from submitting with the default action
    return false;
  });

  function stripeResponseHandler(status, response) {
    var $form = $('#payment-form');

    if (response.error) {
      // Show the errors on the form
      $form.find('.payment-errors').text(response.error.message);
      $form.find('.payment-errors').show();
      $form.find('button').prop('disabled', false);
    } else {
      // response contains id and card, which contains additional card details
      var token = response.id;
      // Insert the token into the form so it gets submitted to the server
      $form.append($('<input type="hidden" name="stripeToken" />').val(token));
      // and submit
      $form.get(0).submit();
    }
  };
});


</script>
