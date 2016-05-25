<div class="page-title">
  <div class="title_left">
    <h3>
        <?php echo "Contest " . $contest->id; ?>
    </h3>

    <?php if($this->session->flashdata('error')): ?>
        <div class='alert alert-error'><?php echo $this->session->flashdata('error'); ?></div>
    <?php elseif($this->session->flashdata('message')): ?>
        <div class='alert alert-info'><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
  </div>
</div>
<div class="clearfix"></div>

<!-- <?php var_dump($contest); ?> -->
<div class="row">

  <div class="clearfix"></div>

          <div class="row tile_count">
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-user"></i> Submissions</span>
                <div class="count"><?php echo count($contest->submissions); ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-clock-o"></i> Starts</span>
                <div class="count"><?php echo date('M d', strtotime($contest->start_time)); ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
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
            </div>
        </div>
        <div class='clearfix'></div>
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Contest Details</h3>
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
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Results</h2>
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

                  <div class="col-md-9 col-sm-9 col-xs-12">

                    <ul class="stats-overview">
                      <li>
                        <span class="name"> Views </span>
                        <span class="value text-success"> <?php echo $contest->views; ?> </span>
                      </li>
                      <li>
                        <span class="name"> Shares </span>
                        <span class="value text-success"> <?php echo $contest->shares; ?></span>
                      </li>
                      <li class="hidden-phone">
                        <span class="name"> Share Clicks </span>
                        <span class="value text-success"> <?php echo $contest->share_clicks; ?> </span>
                      </li>
                    </ul>
                    <br />

                    <div id="mainb" style="height:350px;"></div>

                    <div>

                      <h4>Submissions</h4>
                      <?php if(is_null($contest->payout)): ?>
                          <div class='alert alert-info'>This contest does not have a winner yet!</div>
                      <?php endif; ?>
                      <!-- end of user messages -->
                      <ul class="messages" style='list-style-type:none'>
                         <?php foreach($contest->submissions as $submission): ?>
                             <?php if(isset($submission->winner) && $submission->winner == TRUE): ?>
                                 <li style="border:8px solid #ff5c00;border-radius:10px;padding-right:10px;">
                            <?php else: ?>
                                 <li>
                            <?php endif; ?>
                               <div class="message_date">
                                 <h3 class="date text-info"><?php echo date('d', strtotime($submission->created_at)); ?></h3>
                                 <p class="month"><?php echo date('M', strtotime($submission->created_at)); ?></p>
                               </div>
                               <div class="message_wrapper">
                                 <h4 class="heading"><?php echo $submission->owner->first_name.' '.$submission->owner->last_name; ?>
                                     <small>
                                         <a href="<?php echo base_url('users/show/'.$submission->owner->id); ?>">
                                             <?php echo $submission->owner->email; ?>
                                         </a>
                                     </small>
                                 </h4>
                                 <div class='row'>
                                     <div class='col-sm-2'>
                                         <div class="btn-group">
                                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu">
                                            <li><a href="#">View</a></li>
                                            <li><a href="#">Edit</a></li>
                                            <li><a href="#">Select as Winner</a></li>
                                            <li>
                                                    <a href="<?php echo base_url('submissions/'.$submission->id.'/confirm_delete'); ?>" class='dropdown-danger' type='submit'>Delete</a>
                                            </li>
                                          </ul>
                                        </div>
                                     </div>
                                     <div class='col-sm-4'>
                                         <blockquote class="message" style='font-size:0.9em'>
                                             <?php if(!is_null($submission->headline)): ?>
                                                 <p class='title'><strong>Headline</strong></p>
                                                 <p><?php echo $submission->headline; ?></p>
                                             <?php endif; ?>
                                             <?php if(!is_null($submission->text)): ?>
                                                 <p class='title'><strong>Text</strong></p>
                                                 <p><?php echo $submission->text; ?></p>
                                             <?php endif; ?>
                                             <?php if(!is_null($submission->description)): ?>
                                                 <p class='title'><strong>Description</strong></p>
                                                 <p><?php echo $submission->description; ?></p>
                                             <?php endif; ?>
                                             <?php if(!is_null($submission->link_explanation)): ?>
                                                 <p class='title'><strong>Link Explanation</strong></p>
                                                 <p><?php echo $submission->link_explanation; ?></p>
                                             <?php endif; ?>
                                         </blockquote>
                                     </div>
                                     <div class='col-sm-4'>
                                         <?php if($contest->platform == 'instagram'): ?>
                                             <img src="<?php echo $submission->attachment; ?>">
                                         <?php else: ?>
                                             <img src="<?php echo $submission->thumbnail_url; ?>">
                                         <?php endif; ?>
                                     </div>
                                 </div>
                                 <br />

                               </div>
                             </li>
                         <?php endforeach; ?>
                      </ul>
                      <!-- end of user messages -->


                    </div>


                  </div>

                  <!-- start project-detail sidebar -->
                  <div class="col-md-3 col-sm-3 col-xs-12">

                    <section class="panel">

                      <div class="x_title">
                        <h2>Contest Metadata <small><a href="https://tappyn.com/#/contest/<?php echo $contest->id; ?>" target="_blank">View Brief</a></small></h2>

                        <div class="clearfix"></div>
                      </div>
                      <div class="panel-body">

                        <div class="project_detail">

                          <p class='title'>Audience</p>
                          <p><?php echo $contest->audience; ?></p>
                          <p class='title'>Summary</p>
                          <p><?php echo $contest->summary; ?></p>
                          <p class='title'>What Makes Us Different</p>
                          <p><?php echo $contest->different; ?></p>
                          <p class='title'>Platform</p>
                          <p><?php echo $contest->platform; ?></p>
                          <p class='title'>Objective</p>
                          <p><?php echo snake_to_string($contest->objective); ?></p>
                          <p class='title'>Emotion</p>
                          <p><?php echo is_null($contest->emotion) ? 'None Provided' : $contest->emotion; ?></p>
                        </div>

                        <br />
                        <h5>Additional Images</h5>
                        <ul class="list-unstyled project_files">
                            <?php if(empty($contest->additional_images)): ?>
                                <div class='alert alert-info'>No Images Provided</div>
                            <?php else: ?>
                                <?php foreach($contest->additional_images as $image): ?>

                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        <br />
                      </div>

                    </section>

                  </div>
                  <!-- end project-detail sidebar -->

                </div>
              </div>
            </div>
          </div>
      </div>


</div>

<script>
    $('.delete_submission').click(function() {
        console.log("Form submission found");
        var res = confirm("Are you sure you want to delete this submission?");
        if(!res)
        {
            return FALSE;
        }
    })
</script>
<script>
  var myChart9 = echarts.init(document.getElementById('mainb'), theme);
  var chart_data = {
      dates : [],
      amounts : []
  };
  $.ajax({
      url : "<?php echo base_url('contests/submissions_by_time_range/'.$contest->id)?>",
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
