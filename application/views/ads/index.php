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
                        <td>contest ID</td>
                        <td>submission ID</td>
                        <td>info</td>
                        <td>done?</td>
                    </tr>
                  </thead>

                  <tbody>
                        <?php foreach ($ads as $ad) {

    $ad->content = unserialize($ad->content);
    echo '<tr class="even pointer">
              <td>
                  <a href="' . base_url() . 'submissions/show/' . $ad->submission_id . '"><span class="fa fa-edit"></span></a>
                  <a href="https://tappyn.com/#/contest/' . $ad->contest_id . '" target="_blank"><span class="fa fa-eye"></span></a>
              </td>
              <td>' . $ad->id . '</td>
              <td>' . $ad->contest_id . '</td>
              <td><a href="' . base_url() . 'contests/show/' . $ad->contest_id . '#' . $ad->submission_id . '">' . $ad->submission_id . '</td>
              <td>' . $ad->content['info'] . '</td>
              <td>' . (($ad->done == 1) ? 'done' : '') . '</td>
          </tr>';
}
?>
                  </tbody>
                </table>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>

  </div>
