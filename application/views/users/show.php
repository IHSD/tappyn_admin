<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>User Profile</h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>User Report <small>Activity report</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a href="#"><i class="fa fa-chevron-up"></i></a>
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
            <li><a href="#"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

            <h3><?php echo $user->first_name.' '.$user->last_name; ?></h3>
            <?php if($user->active == 1): ?>
                    <i class='fa fa-warning'></i> This user's email has not been verified yet!
            <?php endif; ?>
            <div class='clearfix'></div>
            <ul class="list-unstyled user_data">
              <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
              </li>

              <li>
                <i class="fa fa-briefcase user-profile-icon"></i>
                 <?php echo is_null($user->age) ? 'Undisclosed' : $user->age. ' year old'; ?>
                 <?php echo is_null($user->gender) ? '' : ($user->gender == 1 ? 'Male' : 'Female'); ?>

              </li>

              <li class="m-top-xs">
                <i class="fa fa-external-link user-profile-icon"></i>
                Last Seen: <?php echo date('D M d', $user->last_login); ?>
              </li>
            </ul>

            <!-- <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a> -->
            <br />
            <div class="project_detail">

              <p class='title'>Stripe Customer ID</p>
              <p><?php echo is_null($user->stripe_customer_id) ? 'Not Setup' : $user->stripe_customer_id; ?></p>
              <p class='title'>Stripe Account ID</p>
              <p><?php echo is_null($user->account) ? 'Not Setup' : '<a href="#" data-toggle="modal" data-target=".bs-example-modal-lg" data-transfer_id="'.$user->account.'">'.$user->account->account_id."</a>"; ?></p>


            </div>
            <!-- start skills -->
            <!-- <h4>Skills</h4>
            <ul class="list-unstyled user_data">
              <li>
                <p>Web Applications</p>
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                </div>
              </li>
              <li>
                <p>Website Design</p>
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                </div>
              </li>
              <li>
                <p>Automation & Testing</p>
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                </div>
              </li>
              <li>
                <p>UI / UX</p>
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                </div>
              </li>
            </ul> -->
            <!-- end of skills -->

          </div>
          <div class="col-md-9 col-sm-9 col-xs-12">

            <div class="profile_title">
              <div class="col-md-6">
                <h2>User Activity Report</h2>
              </div>
              <div class="col-md-6">
                <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                  <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                  <span><?php echo date('D M d, Y', strtotime('-1 month')); ?> - <?php echo date('D M d, Y'); ?></span> <b class="caret"></b>
                </div>
              </div>
            </div>
            <!-- start of user-activity-graph -->
            <div id="mainb" style="height:350px;"></div>

            <div>
            <!-- end of user-activity-graph -->

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Submissions</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Payouts</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                  <!-- start recent activity -->
                  <h5><a href="<?php echo base_url('submissions/index?owner='.$user->id); ?>">View All Submissions</a></h5>
                  <ul class="messages" style='list-style-type:none;'>
                      <?php foreach($user->submissions as $sub): ?>
                          <li>
                            <div class="message_date">
                              <h3 class="date text-info"><?php echo date('d', strtotime($sub->created_at)); ?></h3>
                              <p class="month"><?php echo date('M', strtotime($sub->created_at)); ?></p>
                            </div>
                            <div class="message_wrapper">
                                <blockquote class="message" style='font-size:0.9em'>
                                    <?php if(!is_null($sub->headline)): ?>
                                        <p class='title'><strong>Headline</strong></p>
                                        <p><?php echo $sub->headline; ?></p>
                                    <?php endif; ?>
                                    <?php if(!is_null($sub->text)): ?>
                                        <p class='title'><strong>Text</strong></p>
                                        <p><?php echo $sub->text; ?></p>
                                    <?php endif; ?>
                                    <?php if(!is_null($sub->description)): ?>
                                        <p class='title'><strong>Description</strong></p>
                                        <p><?php echo $sub->description; ?></p>
                                    <?php endif; ?>
                                    <?php if(!is_null($sub->link_explanation)): ?>
                                        <p class='title'><strong>Link Explanation</strong></p>
                                        <p><?php echo $sub->link_explanation; ?></p>
                                    <?php endif; ?>
                                </blockquote>
                              <br />
                              <p class="url">
                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                <a href="<?php echo base_url('contests/show/'.$sub->contest_id); ?>"><i class='fa fa-paperclip'></i>View Contest</a>
                              </p>
                            </div>
                          </li>
                      <?php endforeach; ?>
                  </ul>
                  <!-- end recent activity -->

                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <?php if(empty($user->payouts)): ?>
                        <div class='alert alert-info'>This user doesnt have any payouts yet!</div>
                    <?php else: ?>
                  <!-- start user projects -->
                  <table class="data table table-striped no-margin">
                    <thead>

                      <tr>
                        <th>#</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Contest</th>
                        <th>Account ID</th>
                        <th>Transfer ID</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($user->payouts as $payout): ?>
                            <tr>
                                <td><?php echo $payout->id; ?></td>
                                <td><?php echo date('M-d-Y', $payout->created_at); ?></td>
                                <td><?php echo $payout->claimed == 0 ? 'Pending' : 'Claimed ('.date('M d', $payout->claimed_at).')'; ?></td>
                                <td><a href="<?php echo base_url('contests/show/'.$payout->contest_id); ?>"><?php echo $payout->contest_id; ?></a></td>
                                <td><?php echo $payout->claimed == 1 ? $payout->account_id : '--------'; ?></td>
                                <td><?php echo $payout->claimed == 1 ? $payout->transfer_id : '--------'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                  <!-- end user projects -->
                 <?php endif; ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                  <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                    photo booth letterpress, commodo enim craft beer mlkshk </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  var myChart9 = echarts.init(document.getElementById('mainb'), theme);
  var chart_data = {
      dates : [],
      amounts : []
  };
  $.ajax({
      url : "<?php echo base_url('users/submissions_by_date/'.$user->id)?>",
      dataType: 'json',
      success: function(response)
      {
          if(response.success)
          {
              for(var i = 0; i < response.data.length; i++)
              {
                 chart_data.dates.push(response.data[i].date);
                 chart_data.amounts.push(response.data[i].count);
              }
              myChart9.setOption({
                title: {
                  x: 'center',
                  y: 'top',
                  padding: [0, 0, 20, 0],
                  text: 'Submissions Over Time',
                  textStyle: {
                    fontSize: 15,
                    fontWeight: 'normal'
                  }
                },
                tooltip: {
                  trigger: 'axis'
                },
                calculable: true,
                xAxis: [{
                  type: 'category',
                  data: chart_data.dates
                }],
                yAxis: [{
                  type: 'value',
                  name: 'Amount',
                  axisLabel: {
                    formatter: '{value}'
                  }
                }],
                series: [{
                  name: 'Submissions',
                  type: 'line',
                  data: chart_data.amounts
                }]
              });
          } else {
              alert('error fetching data from contest url');
          }
      }
  })

</script>
