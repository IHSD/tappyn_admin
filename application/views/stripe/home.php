<?php var_dump($balance); ?>
<?php var_dump($disputes); ?>
<?php var_dump($balance_transactions); ?>
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
                <div class="count">$<?php echo round(($balance->available->amount / 100), 2); ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-clock-o"></i> Pending</span>
                <div class="count">$<?php echo round(($balance->pending->amount / 100), 2); ?></div>
              </div>
            </div>
            <!-- <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-clock-o"></i> Ends</span>
                <div class="count green"><?php echo date('M d', strtotime($contest->stop_time)); ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-user"></i> Gender</span>
                <div class="count"><?php echo $contest->gender == 0 ? 'All' : ($contest->gender == 1 ? 'Male' : 'Female'); ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-user"></i> Min Age</span>
                <div class="count"><?php echo $contest->min_age; ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-user"></i> Max Age</span>
                <div class="count"><?php echo $contest->max_age; ?></div>
              </div>
            </div> -->
        </div>
