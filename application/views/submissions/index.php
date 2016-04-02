<!-- <?php echo json_encode($submissions); ?> -->

    <div class="page-title">
      <div class="title_left">
        <h3>
             Submissions

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
            <?php if(empty($submissions)): ?>
                <div class='text-center alert alert-warning col-sm-12'><strong>Sorry, there are no submissions to show! </strong><a href="<?php echo base_url(); ?>submissions/index" ?>Try clearing your filters?</a></div>
            <?php else: ?>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                        <td></td>
                        <?php foreach(get_object_vars($submissions[0]) as $key => $val): ?>
                        <th><?php echo $key; ?>
                        <?php endforeach; ?>
                    </tr>
                  </thead>

                  <tbody>
                        <?php foreach($submissions as $submission): ?>
                            <tr class="even pointer">
                                <td>
                                    <a href="<?php echo base_url().'submissions/show/'.$submission->id; ?>"><span class='fa fa-edit'></span></a>
                                    <a href="https://tappyn.com/#/submission/<?php echo $submission->id; ?>" target="_blank"><span class='fa fa-eye'></span></a>
                                </td>
                                <?php foreach(get_object_vars($submission) as $key => $value): ?>
                                    <td style='white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:200px;'>
                                    <?php
                                    if($key == 'owner') {
                                        echo $value->first_name.' '.$value->last_name;
                                    } else if($key == 'contest_id') {
                                        echo "<a href=".base_url('contests/show/'.$value).">".$value."</a>";
                                    } else if($key == 'contest') {
                                        echo is_null($value->title) ? 'No Title' : $value->title;
                                    } else {
                                        echo $value;
                                    }
                                    ?>
                                    </td>
                                <?php endforeach; ?>
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
