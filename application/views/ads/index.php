<!-- <?php echo json_encode($ads); ?> -->

    <div class="page-title">
      <div class="title_left">
        <h3>
             Ads

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
            <?php if (empty($ads)): ?>
                <div class='text-center alert alert-warning col-sm-12'><strong>Sorry, there are no ads to show! </strong><a href="<?php echo base_url(); ?>contests/index" ?>Try clearing your filters?</a></div>
            <?php else: ?>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                        <td></td>
                        <td>ID</td>
                        <td>Company</td>
                        <td>Start</td>
                        <td>End</td>
                        <td>Submissons</td>
                        <td>Platform</td>
                        <td>Objective</td>
                    </tr>
                  </thead>

                  <tbody>
                        <?php foreach ($ads as $ad): ?>
                            <tr class="even pointer">
                                <td>
                                    <a href="<?php echo base_url() . 'contests/show/' . $contest->id; ?>"><span class='fa fa-edit'></span></a>
                                    <a href="https://tappyn.com/#/contest/<?php echo $contest->id; ?>" target="_blank"><span class='fa fa-eye'></span></a>
                                </td>
                                <td><?php echo $contest->id; ?></td>
                                <td><?php echo $contest->company->name; ?></td>
                                <td><?php echo date('M d', strtotime($contest->start_time)); ?></td>
                                <td><?php echo date('M d', strtotime($contest->stop_time)); ?></td>
                                <td><?php echo $contest->submission_count; ?></td>
                                <td><?php echo $contest->platform; ?></td>
                                <td><?php echo snake_to_string($contest->objective); ?></td>
                            </tr>
                        <?php endforeach;?>
                  </tbody>

                </table>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>

  </div>
