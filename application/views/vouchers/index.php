    <div class="page-title">
      <div class="title_left">
        <h3>
             Vouchers

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
            <?php if(empty($vouchers)): ?>
                <div class='text-center alert alert-warning col-sm-12'><strong>Sorry, there are no vouchers to show! </strong><a href="<?php echo base_url(); ?>vouchers/index" ?>Try clearing your filters?</a></div>
            <?php else: ?>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                        <td></td>
                        <td>ID</td>
                        <td>Status</td>
                        <td>Code</td>
                        <td>Expiration</td>
                        <td>Start</td>
                        <td>End</td>
                        <td>Uses</td>

                    </tr>
                  </thead>

                  <tbody>
                        <?php foreach($vouchers as $voucher): ?>
                            <tr class="even pointer">
                                <td>
                                    <a href="<?php echo base_url().'vouchers/show/'.$voucher->id; ?>"><span class='fa fa-edit'></span></a>
                                </td>
                                <td><?php echo $voucher->id; ?></td>
                                <td>
                                    <div class='toggle-container-centering'>
                                        <?php if($voucher->status == 1): ?>
                                            <div class='toggle-container toggle-on' data-id="<?php echo $voucher->id; ?>">
                                                <div class='toggle-ball'></div>
                                            </div>
                                        <?php else: ?>
                                            <div class='toggle-container toggle-off' data-id="<?php echo $voucher->id; ?>">
                                                <div class='toggle-ball'></div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td><?php echo strtoupper($voucher->code); ?></td>
                                <td><?php echo $voucher->expiration; ?></td>
                                <td><?php echo date('D, M d', $voucher->starts_at); ?></td>
                                <td><?php echo date('D, M d', $voucher->ends_at); ?></td>
                                <td><?php echo $voucher->times_used.' / '.$voucher->usage_limit; ?></td>
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
  <style>
  .toggle-container-centering {
      text-align:center;
      vertical-align:center;
  }

  .toggle-container {
      border-radius: 15px;
      height: 20px;
      width: 35px;
      padding: 1px;
  }

  .toggle-on {
      background-color: #ff5c00;
  }
  .toggle-off {
      background-color: #ffcfb3;
      padding-left: 16px;
  }

  .toggle-ball {
      height:18px;
      border-radius: 9px;
      background-color: white;
      width: 18px;
  }
  </style>
