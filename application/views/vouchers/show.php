<!-- <?php echo json_encode($voucher); ?>
 -->

<div class="page-title">
  <div class="title_left">
    <h3 class='header-inline'>
        <span class='toggle-container-centering'>
            <?php echo "Voucher " .strtoupper($voucher->code); ?>
            <!--<?php if($voucher->status == 1): ?>
                <div class='toggle-container toggle-on' data-id="<?php echo $voucher->id; ?>">
                    <div class='toggle-ball'></div>
                </div>
            <?php else: ?>
                <div class='toggle-container toggle-off' data-id="<?php echo $voucher->id; ?>">
                    <div class='toggle-ball'></div>
                </div>
            <?php endif; ?>-->
        </span>
    </h3>
  </div>
</div>
<div class="clearfix"></div>

<div class="row">

  <div class="clearfix"></div>

          <div class="row tile_count">
            <div class="animated flipInY col-md-2 col-md-offset-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-clock-o"></i> Starts</span>
                <div class="count"><?php echo date('M d', strtotime($voucher->starts_at)); ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-clock-o"></i> Ends</span>
                <div class="count green"><?php echo date('M d', strtotime($voucher->ends_at)); ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-user"></i> Uses</span>
                <div class="count"><?php echo $voucher->times_used.' / '.$voucher->usage_limit; ?></div>
              </div>
            </div>

            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-user"></i> Discount</span>
                <div class="count">
                    <?php if($voucher->discount_type == 'amount'): ?>
                        <?php echo '$'.number_format($voucher->value, 2); ?>
                    <?php else: ?>
                        <?php echo $voucher->value.'%'; ?>
                    <?php endif; ?>
                </div>
              </div>
            </div>

        </div>
        <div class='clearfix'></div>

                      <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Uses </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                              <?php if(empty($voucher->uses)): ?>
                                  <div class='alert alert-info'>
                                      This voucher hasn't benn used yet!
                                  </div>
                              <?php else: ?>
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Contest ID</th>
                                  <th>Used At</th>
                                  <th>Platform</th>
                                  <th>Objective</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php foreach($voucher->uses as $use): ?>
                                      <tr>
                                          <td><?php echo $use->contest_id; ?></td>
                                          <td><?php echo date('M d', $use->created_at); ?></td>
                                          <td><?php echo $use->contest->platform; ?></td>
                                          <td><?php echo $use->contest->objective; ?></td>
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
.header-inline {
    display:inline-block;
}
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
