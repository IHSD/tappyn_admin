
    <div class="page-title">
      <div class="title_left">
        <h3>
             Users

          </h3>
      </div>
    </div>
    <div class="clearfix"></div>


    <div class="row">

      <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                    <?php echo form_open('users/search'); ?>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for email or UID." name='search'>
                      <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">Go!</button>
                      </span>
                    </div>
                    <?php echo form_close(); ?>
              </div>
            </div>
            <div class='title-right'><?php echo $pagination; ?></div>
          </div>
          <div class="x_content">
            <?php if(empty($users)): ?>
                <div class='text-center alert alert-warning col-sm-12'><strong>Sorry, there are no users to show! </strong><a href="<?php echo base_url('users/index'); ?>" ?>Try clearing your filters?</a></div>
            <?php else: ?>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                        <td></td>
                        <?php foreach(get_object_vars($users[0]) as $key => $val): ?>
                        <th><?php echo $key; ?>
                        <?php endforeach; ?>
                    </tr>
                  </thead>

                  <tbody>
                        <?php foreach($users as $user): ?>
                            <tr class="even pointer">
                                <td>
                                    <a href="<?php echo base_url().'users/show/'.$user->id; ?>"><span class='fa fa-edit'></span></a>
                                    <a href="https://tappyn.com/#/user/<?php echo $user->id; ?>" target="_blank"><span class='fa fa-eye'></span></a>
                                </td>
                                <?php foreach(get_object_vars($user) as $key => $value): ?>
                                    <td>
                                    <?php
                                    if($key == 'company')
                                    {
                                        echo $value->name;
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
